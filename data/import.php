#!/usr/bin/php
<?php

$file = $argv[1];

$transform = function (&$val) {
    // Remove default chars + ~
    $val = trim($val, "\t\n\r\0\x0B~");

    if ($val === '~~') {
        $val = null;
    } else if ($val === '~Y~' || $val === 'Y') {
        $val = 1;
    } else if(preg_match('/\d{2}\/\d{4}/', $val)) {
        $vals = explode("/", $val);
        $val = $vals[1]."-".$vals[0]."-01 00:00:00";
        unset($vals);
    } else if (is_numeric($val)) {
        $val = (float) $val;
    }
};

$config['FOOD_DES.txt'] = array('table' => 'sr_food_description');
$config['FD_GROUP.txt'] = array('table' => 'sr_food_group');
$config['LANGUAL.txt'] = array('table' => 'sr_langual_factor');
$config['LANGDESC.txt'] = array('table' => 'sr_langual_description');
$config['NUT_DATA.txt'] = array('table' => 'sr_nutrient_data');
$config['NUTR_DEF.txt'] = array('table' => 'sr_nutrient_definition');
$config['SRC_CD.txt'] = array('table' => 'sr_source_code');
$config['DERIV_CD.txt'] = array('table' => 'sr_data_derivation_code');
$config['WEIGHT.txt'] = array('table' => 'sr_weight');
$config['FOOTNOTE.txt'] = array('table' => 'sr_footnote');
$config['DATSRCLN.txt'] = array('table' => 'sr_source_link');
$config['DATA_SRC.txt'] = array('table' => 'sr_source');

$db = new PDO('mysql:dbname=recipes;host=127.0.0.1', 'recipes', 'whocares');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$batch_size = 2000;

if ($config[$file]) {
    echo "Processing $file \n";
    $handle = fopen($file, 'r');

    $sth = $db->prepare("select count(*) from information_schema.columns where table_name=?");
    $sth->execute(array($config[$file]['table']));
    $column_count = $sth->fetchColumn();

    if ($handle) {
        $i = 0;
        $batch_count = 0;

        $q = "insert into {$config[$file]['table']} values ";
        $p = array();
        $val_str = "";

        while (($buffer = stream_get_line($handle, 4096, "\n")) !== false) {
            $values = explode("^", $buffer);

            array_walk($values, $transform);
            echo var_export($values,true);
            exit();

            $val_str .= "(";
            for ($j=0; $j<$column_count; $j++) {
                $p[$i."_".$j] = $values[$j];
                $val_str .= ":$i"."_".$j.", ";
            }
            $val_str = substr($val_str, 0, -2);
            $val_str .= "), ";

            $i++;

            if ($i > 0 && $i % $batch_size == 0) {
                $batch_count++;
                $val_str = substr($val_str, 0, -2);
                try {
                    $sth = $db->prepare($q . $val_str);
                    $sth->execute($p);
                    $p = array();
                    $val_str = "";
                    if ($batch_count % 10 == 0) echo ".";
                } catch (PDOException $e) {
                    echo "q = $q $val_str\n";
                    echo "p = ".var_export($p, true)."\n";
                    echo "file = $file\n";
                    echo $e->getMessage()."\n";
                    exit();
                }
            }
        }

        // Get last leftover
        if (is_array($p) && $val_str) {
            $val_str = substr($val_str, 0, -2);
            try {
                $sth = $db->prepare($q . $val_str);
                $sth->execute($p);
                $p = array();
                $val_str = "";
                if ($batch_count % 10 == 0) echo ".";
            } catch (PDOException $e) {
                echo "q = $q $val_str\n";
                echo "p = ".var_export($p, true)."\n";
                echo "file = $file\n";
                echo $e->getMessage()."\n";
                exit();
            }
        }
    }

    fclose($handle);
}

