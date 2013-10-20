drop database if exists recipes;
create database recipes;
use recipes;

drop table if exists sr_food_description;
create table sr_food_description (
    nutrient_data_id varchar(5) not null,
    food_group_id varchar(4) not null,
    long_description varchar(200),
    short_description varchar(60),
    common_name varchar(100) default '',
    manufacturer_name varchar(65),
    survey tinyint default 0,
    refuse_description varchar(135),
    refuse_percent tinyint,
    scientific_name varchar(65),
    n_factor decimal(4,2),
    pro_factor decimal(4,2),
    fat_factor decimal(4,2),
    cho_factor decimal(4,2),
    primary key (nutrient_data_id)
);

drop table if exists sr_food_group;
create table sr_food_group (
  id varchar(4) not null,
  description varchar(60) not null,
  primary key (id)
);

drop table if exists sr_langual_factor;
create table sr_langual_factor (
  nutrient_data_id varchar(5) not null,
  code varchar(5),
  primary key (nutrient_data_id, code)
);

drop table if exists sr_langual_description;
create table sr_langual_description (
  code varchar(5) not null,
  description varchar(140) not null,
  primary key (code)
);

drop table if exists sr_nutrient_data;
create table sr_nutrient_data (
  id varchar(5) not null,
  code varchar(3) not null,
  edible_portion decimal(10, 3) not null,
  num_data_points int not null default 0,
  std_error decimal(8, 3),
  source_code varchar(2),
  deriv_code varchar(4),
  ref_nutrient_data_id varchar(5),
  add_nutr_mark tinyint,
  num_studies int,
  min decimal(10, 3),
  max decimal(10, 3),
  df int,
  low_error_bound decimal(10, 3),
  up_error_bound decimal(10, 3),
  stat_comment varchar(10),
  date_modified datetime,
  primary key (id, code)
);

drop table if exists sr_nutrient_definition;
create table sr_nutrient_definition (
  nutrient_code varchar(3) not null,
  units varchar(7) not null,
  tag_name varchar(20),
  description varchar(60),
  num_decimal tinyint not null,
  sort_order int not null,
  primary key (nutrient_code)
);

drop table if exists sr_source_code;
create table sr_source_code (
  id varchar(2) not null,
  description varchar(60) not null,
  primary key (id)
);

drop table if exists sr_data_derivation_code;
create table sr_data_derivation_code (
  id varchar(4) not null,
  description varchar(120) not null,
  primary key (id)
);

drop table if exists sr_weight;
create table sr_weight (
  nutrient_data_id varchar(5) not null,
  sequence varchar(2) not null,
  amount decimal(5, 3),
  measurement_description varchar(84),
  gram_weight decimal(7, 1) not null,
  num_data_points int not null,
  std_dev decimal(7, 3) not null,
  primary key (nutrient_data_id, sequence)
);

drop table if exists sr_footnote;
create table sr_footnote (
  nutrient_data_id varchar(5) not null,
  sequence_num varchar(4) not null,
  type char(1) not null,
  nutrient_data_code varchar(3),
  description varchar(200)
);

drop table if exists sr_source_link;
create table sr_source_link (
  nutrient_data_id varchar(5),
  nutrient_data_code varchar(3),
  data_source_id varchar(6),
  primary key (nutrient_data_id, nutrient_data_code, data_source_id)
);

drop table if exists sr_source;
create table sr_source (
  id varchar(6) not null,
  authors varchar(255),
  title varchar(255),
  year varchar(4),
  journal varchar(135),
  volume_city_num varchar(16),
  issue_state varchar(5),
  start_page varchar(5),
  end_page varchar(5),
  primary key (id)
);


