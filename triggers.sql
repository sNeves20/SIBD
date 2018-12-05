--TRIGGER 1

delimiter $$
create trigger update_age before insert on consult for each row
begin
update animal
set animal.age=year(new.date_timestamp)-birth_year
where animal.name=new.name and animal.VAT=new.VAT_owner;
end$$

delimiter ;


---------------------------------------------------------------------------------------
--TRIGGER 2

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


---------------------------------------------------------------------------------------
--TRIGGER 3

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
