alter table sr_food_description add key (nutrient_data_id);
alter table sr_food_description add key (food_group_id);
alter table sr_food_description add foreign key (nutrient_data_id) references sr_nutrient_data(id);
alter table sr_food_description add foreign key (food_group_id) references sr_food_group(id);

alter table sr_langual_factor add key (nutrient_data_id);
alter table sr_langual_factor add foreign key (nutrient_data_id) references sr_nutrient_data(id);

update sr_nutrient_data set ref_nutrient_data_id=null where ref_nutrient_data_id='';
update sr_nutrient_data set deriv_code=null where deriv_code='';
alter table sr_nutrient_data add key (ref_nutrient_data_id);
alter table sr_nutrient_data add foreign key (ref_nutrient_data_id) references sr_nutrient_data(id);
alter table sr_nutrient_data add key (source_code);
alter table sr_nutrient_data add foreign key (source_code) references sr_source_code(id);
alter table sr_nutrient_data add key (deriv_code);
alter table sr_nutrient_data add foreign key (deriv_code) references sr_data_derivation_code(id);

alter table sr_weight add foreign key (nutrient_data_id) references sr_nutrient_data(id);

alter table sr_footnote add foreign key (nutrient_data_id) references sr_nutrient_data(id);
alter table sr_footnote add foreign key (nutrient_data_code) references sr_nutrient_data(code);

alter table sr_source_link add foreign key (nutrient_data_id) references sr_nutrient_data(id);
alter table sr_source_link add foreign key (nutrient_data_code) references sr_nutrient_data(code);
alter table sr_source_link add foreign key (data_source_id) references sr_source(id);