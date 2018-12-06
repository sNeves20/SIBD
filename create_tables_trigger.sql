SET foreign_key_checks = 0;
drop table if exists person;
drop table if exists phone_number;
drop table if exists client;
drop table if exists veterinary;
drop table if exists assistant;
drop table if exists species;
drop table if exists generalization_species;
drop table if exists animal;
drop table if exists consult;
drop table if exists participation;
drop table if exists diagnosis_code;
drop table if exists consult_diagnosis;
drop table if exists medication;
drop table if exists prescription;
drop table if exists indicator;
drop table if exists procedure_;
drop table if exists performed;
drop table if exists radiography;
drop table if exists test_procedure;
drop table if exists produced_indicator;
SET foreign_key_checks = 1;

create table person(
    VAT integer(30),
    name varchar(30),
    address_street varchar(30),
    address_city varchar(30),
    address_zip integer(30),
    primary key (VAT)
);

create table phone_number(
    VAT integer(30),
    phone integer(10),
    primary key (VAT, phone),
    foreign key (VAT) references person(VAT)
);

create table client(
    VAT integer (30),
    primary key (VAT),
    foreign key (VAT) references person(VAT)
        ON DELETE CASCADE
);

create table veterinary(
    VAT integer(30),
    specialization varchar (30),
    bio varchar (200),
    primary key (VAT),
    foreign key (VAT) references person(VAT)
        ON DELETE CASCADE
);

create table assistant(
    VAT integer(30),
    primary key (VAT),
    foreign key (VAT) references person(VAT)
        ON DELETE CASCADE
);

create table species(
    name varchar(40),
    description varchar(200),
    primary key (name)
);

create table generalization_species(
    name1 varchar(40),
    name2 varchar(40),
    primary key (name1),
    foreign key (name1) references species(name)
        ON DELETE CASCADE,
    foreign key (name2) references species(name)
        ON DELETE CASCADE
);

create table animal(
    name varchar(30),
    VAT integer(30),
    species_name varchar(40),
    colour varchar(10),
    gender char,
    birth_year integer(4),
    age int,
    primary key (name, VAT),
    foreign key (VAT) references client(VAT)
        ON DELETE CASCADE,
    foreign key (species_name) references species(name)
        ON DELETE CASCADE
);

create table consult(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    s varchar(200),
    o varchar(200),
    a varchar(200),
    p varchar(200),
    VAT_client integer(30),
    VAT_vet integer(30),
    weight float(10) check(weight>0),
    primary key (name, VAT_owner, date_timestamp),
    foreign key (name, VAT_owner) references animal(name, VAT) ON DELETE CASCADE,
    foreign key (VAT_client) references client(VAT) ON DELETE CASCADE,
    foreign key (VAT_vet) references veterinary(VAT) ON DELETE CASCADE
);

create table participation(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    VAT_assistant integer(30),
    primary key (name, VAT_owner, date_timestamp, VAT_assistant),
    foreign key (name, VAT_owner, date_timestamp) references consult(name, VAT_owner, date_timestamp) ON DELETE CASCADE,
    foreign key (VAT_assistant) references assistant(VAT) ON DELETE CASCADE
);

create table diagnosis_code(
  code integer(10),
  name varchar(50),
  primary key (code)
);

create table consult_diagnosis(
    code integer(10),
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    primary key (code, name, VAT_owner,date_timestamp),
    foreign key (name, VAT_owner, date_timestamp) references consult(name, VAT_owner, date_timestamp) ON DELETE CASCADE,
    foreign key (code) references diagnosis_code(code) ON DELETE CASCADE
);

create table medication(
    name varchar(20),
    lab varchar(20),
    dosage varchar(20),
    primary key (name, lab, dosage)
);

create table prescription(
    code integer(10),
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    name_med varchar(20),
    lab varchar(20),
    dosage varchar(20),
    regime varchar(200),
    primary key(code, name, VAT_owner, date_timestamp, name_med, lab, dosage),
    foreign key (code, name, VAT_owner, date_timestamp) references consult_diagnosis(code, name,VAT_owner, date_timestamp) ON DELETE CASCADE,
    foreign key (name_med, lab, dosage) references medication(name, lab, dosage) ON DELETE CASCADE
);

create table indicator(
    name varchar(20),
    reference_value float,
    units varchar(4),
    description varchar(200),
    primary key (name)
);

create table procedure_(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    num int,
    description varchar(200),
    primary key (name, VAT_owner, date_timestamp, num),
    foreign key (name, VAT_owner, date_timestamp) references consult(name, VAT_owner, date_timestamp) ON DELETE CASCADE
);

create table performed(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    num int,
    VAT_assistant integer(30),
    primary key(name, VAT_owner, date_timestamp, num, VAT_assistant),
    foreign key (name, VAT_owner, date_timestamp, num) references procedure_(name, VAT_owner, date_timestamp, num) ON DELETE CASCADE,
    foreign key (VAT_assistant) references assistant(VAT) ON DELETE CASCADE
);

create table radiography(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    num int,
    file varchar(200),
    primary key (name, VAT_owner, date_timestamp, num),
    foreign key (name, VAT_owner, date_timestamp, num) references procedure_(name, VAT_owner, date_timestamp, num) ON DELETE CASCADE
);

create table test_procedure(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    num int,
    type char,
    primary key (name, VAT_owner, date_timestamp, num),
    foreign key (name, VAT_owner, date_timestamp, num) references procedure_ (name, VAT_owner, date_timestamp, num) ON DELETE CASCADE
);

create table produced_indicator(
    name varchar(30),
    VAT_owner integer(30),
    date_timestamp datetime,
    num int,
    indicator_name varchar(20),
    value float,
    primary key (name, VAT_owner, date_timestamp, num, indicator_name),
    foreign key (name, VAT_owner, date_timestamp, num) references test_procedure(name, VAT_owner, date_timestamp, num) ON DELETE CASCADE,
    foreign key (indicator_name) references indicator(name) ON DELETE CASCADE
);

ALTER TABLE prescription DROP FOREIGN KEY prescription_ibfk_1;/*Drops constraint so on cascade constraint can be placed*/
ALTER table prescription ADD CONSTRAINT  prescription_ibfk_1  FOREIGN key (code, name,VAT_owner, date_timestamp)
REFERENCES consult_diagnosis(code, name, VAT_owner, date_timestamp) ON DELETE CASCADE ON UPDATE CASCADE;








delimiter $$
create trigger update_age before insert on consult for each row
begin
update animal
set animal.age=year(new.date_timestamp)-birth_year
where animal.name=new.name and animal.VAT=new.VAT_owner;
end$$

delimiter ;








delimiter $$
create trigger ins_vet before insert on veterinary for each row
begin
if exists (select * from assistant
where new.VAT=assistant.VAT)
then
call its_not_possible_to_insert();
end if;
end$$

delimiter ;



delimiter $$
create trigger ins_ass before insert on assistant for each row
begin
if exists (select * from veterinary
where new.VAT=veterinary.VAT)
then
call its_not_possible_to_insert();
end if;
end$$

delimiter ;



delimiter $$
create trigger ins_vet_up before update on veterinary for each row
begin
if exists (select * from assistant
where new.VAT=assistant.VAT)
then
call its_not_possible_to_insert();
end if;
end$$

delimiter ;



delimiter $$
create trigger ins_ass_up before update on assistant for each row
begin
if exists (select * from veterinary
where new.VAT=veterinary.VAT)
then
call its_not_possible_to_insert();
end if;
end$$

delimiter ;














delimiter $$
create trigger phone_nb before insert on phone_number for each row
begin
if exists (select * from phone_number
where new.phone=phone_number.phone)
then
call its_not_possible_to_insert();
end if;
end$$

delimiter ;




delimiter $$
create trigger phone_nb_up before update on phone_number for each row
begin
if exists (select * from phone_number
where new.phone=phone_number.phone)
then
call its_not_possible_to_insert();
end if;
end$$

delimiter ;
