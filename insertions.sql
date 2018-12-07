/*Start PErson and phone number insertion*/
insert into person values(222679022, "John Smith", "Canal Street", "New Orleans", 53140);
insert into person values(663911102,	"Hannah McDonald",	"Delaware Avenue", "Buffalo",	79930);
insert into person values(219012033, "David Hamilton",	"Columbus Avenue", "San Francisco",	29456);
insert into person values(184777249,	"Kate West",	"Columbus Avenue",	"San Francisco",	29456);
insert into person values (243379726,	"Callum Marshall","Colorado Avenue",	"Washington DC",	64650);
insert into person values(307700243,	"Evan Francis",	"Hawaii Avenue",	"Washington DC",	64673);
insert into person values(693543473,	"Petra Louis",	"Main Street",	"Alabama",	59100);
insert into person values(695743999,	"Ruslaud Yoi",	"Dawnside River",	"San Francisco",	71950);
insert into person values (184530918,	"Beatrice Raymond",	"Calgary Tulip","Buffalo",	63250);
insert into person values (236743073, "Lucas Hamman",	"Francis Leopold", "Texas",	45000);
insert into person values (257457374,	"Rafael Nadal",	"Roses Green",	"Los Angels",	75000);
insert into person values (245793574,	"Penelope Garcia",	"Roses Blue",	"Riverdale",	69100);
insert into person values (745794188,	"Carmen Mendez",	"Street River",	"New York",	74957);
insert into person values (111233528,	"Angelina Johnson",	"Street 5",	"Riverdale",	77755); /*inserted for testing*/

insert into phone_number values (222679022, 2025550130);
insert into phone_number values (222679022, 2025550156);
insert into phone_number values (663911102, 2227998210);
insert into phone_number values (219012033, 2438928993);
insert into phone_number values (184777249, 2011378918);
insert into phone_number values (184777249, 2025550143);
insert into phone_number values(243379726, 2014796635);
insert into phone_number values(243379726, 2025550143);
insert into phone_number values(307700243, 2330960003);
insert into phone_number values(693543473, 2024596699);
insert into phone_number values(695743999, 2017587788);
insert into phone_number values(184530918, 2034569999);
insert into phone_number values(236743073, 2057990000);
insert into phone_number values(257457374, 2669990000);
insert into phone_number values (245793574, 3334445566);
insert into phone_number values(745794188, 4447497788);
insert into phone_number values(111233528, 222666999); /*inserted for testing*/

/*START Insertion into client*/
insert into client values(184530918);
insert into client values(236743073);
insert into client values(257457374);
insert into client values(245793574);
insert into client values(745794188);
insert into client values(243379726);/*assistant*/
insert into client values(222679022);/*veterinary*/
/*END client insertion*/

/*START VET_Assistant insertion*/
insert into assistant values(243379726);
insert into assistant values(307700243);
insert into assistant values(693543473);
insert into assistant values(695743999);
insert into assistant values(111233528); /*inserted for testing*/
/*END VET_Assistant insertion*/

/*START veterinary Insertion*/
insert into veterinary values(222679022,"Toxicology", "Prepared to work with  animals");
insert into veterinary values(663911102,"Clinical Patology",	"30 years of experience");
insert into veterinary values(219012033,"Hematology Intern", "Loves animals");
insert into veterinary values(184777249,"Veterinary Patology", "12 years of experience");
insert into veterinary values(111233528,"Veterinary", "1 year of experience"); /*inserted for testing*/
/*END*/

/*START species insertion*/
/*Dogs*/
insert into species values("Dog", "Likes bones");
insert into species values("German Shepard", "Likes bones");
insert into species values("Pug", "Likes bones");
insert into species values("Labrador","Likes bones");
insert into species values ("Rotweiller", "Likes bones");
/*Cats*/
insert into species values("Cat", "Likes mice");
insert into species values("Siamese", "Likes mice");
insert into species values("Persian", "Likes mice");
/*Birds*/
insert into species values("Bird", "Flies");
insert into species values("Parrot","Flies");
insert into species values("Parakeet", "Flies");
insert into species values("Chicken", "Flies");

insert into generalization_species values("German Shepard" , "Dog");
insert into generalization_species values("Pug" , "Dog");
insert into generalization_species values("Labrador" , "Dog");
insert into generalization_species values("Rotweiller" , "Dog");
insert into generalization_species values("Siamese", "Cat");
insert into generalization_species values("Persian", "Cat");
insert into generalization_species values("Parrot", "Bird");
insert into generalization_species values("Parakeet", "Bird");
insert into generalization_species values("Chicken", "Bird");
/*Client Animals*/
insert into animal values("Lacy",222679022,"German Shepard", "Black",'F', 2010, NULL);
insert into animal values("Cookie",184530918,"Pug",	"Brown",	'F',	2009 , NULL);
insert into animal values("Rex",236743073,"Labrador", "Beige", 'M', 2011, NULL);
insert into animal values("Max",257457374,"Pug",	"Black",	'M',	2012, NULL);
insert into animal values("Tweety",184530918,"Siamese",	"White",	'M',	2015, NULL);
insert into animal values("Lucy",243379726,"Chicken",	'Beige',	'F',	2011, NULL);
insert into animal values("Soja",184530918,"Parrot",	"Orange",	'M',	2017, NULL);
insert into animal values("Nina",243379726,"Parakeet", "Green", 'F',	2015, NULL);
insert into animal values("Minnie",257457374,"Chicken",	"Brown",	'F',	2014, NULL);
/*END*/

/*CENAS DA BIA*/
/*Start Medication insertion*/
insert into medication values("Abiligy", "Bayer", 35);
insert into medication values("Oxycontin", "Fgir", 100);
insert into medication values("Percocet", "Balsar", 30);
insert into medication values("Flagyl", "Cool", 75);
insert into medication values("Ambien", "Bayer", 1000);
insert into medication values("Actos", "Blue", 35);
insert into medication values("Dilaudid", "Fly", 45);
insert into medication values("Dexilant", "Blue", 50);
/*END medication insertion*/

/*Start Consult insertion*/
insert into consult values("Lacy",222679022, "2016-08-27 15:30:00", "Sleepy", "Obese", "Diagnostic 1", "Urin analysis", 222679022, 663911102, 70);
insert into consult values("Cookie",184530918, "2018-03-13 11:00:00", "Rash", "Normal weight", "Diagnostic 2", "Blood analysis", 184530918, 222679022, 15);
insert into consult values("Rex",236743073, "2017-11-25 14:00:00", "Broken leg", "Normal weight", "Diagnostic 3", "Radiography", 236743073, 219012033, 40);
insert into consult values("Max",257457374, "2014-12-03 11:30:00", "Rash", "Obesity", "Diagnostic 2", "Blood Analysis", 745794188, 184777249, 58);
insert into consult values("Max",257457374, "2017-12-10 11:30:00", "Rash", "Normal weight", "Diagnostic 2", "Blood Analysis", 745794188, 184777249, 48);
insert into consult values("Tweety",184530918, "2018-01-03 12:00:00", "Vomit", "Obese", "Diagnostic 2", "Gastric Lavage", 245793574, 222679022, 12);
insert into consult values("Lucy",243379726, "2018-02-08 11:00:00", "Sleepy", "Normal weight", "Diagnostic 1", "Urin Analysis", 243379726, 663911102, 3.5);
insert into consult values("Soja",184530918, "2018-03-21 12:00:00", "Broken rib", "Normal weight", "Diagnostic 3", "Radiography", 245793574, 219012033, 1.2);
insert into consult values("Nina",243379726, "2018-07-04 14:30:00", "Vomit", "Normal weight", "Diagnostic 1", "Gastric Lavage", 243379726, 184777249, 0.8);
insert into consult values("Minnie",257457374, "2018-06-25 15:00:00", "Rash", "Normal weight", "Diagnostic 2", "Blood Analysis", 745794188, 222679022, 1.5);

/*END consult insertion*/

/*Start participation insertion*/
insert into participation values("Lacy", 222679022, "2016-08-27 15:30:00", 243379726);
insert into participation values("Cookie", 184530918, "2018-03-13 11:00:00", 307700243);
insert into participation values("Rex", 236743073, "2017-11-25 14:00:00", 693543473);
insert into participation values("Max", 257457374, "2017-12-10 11:30:00", 243379726);
insert into participation values("Tweety", 184530918, "2018-01-03 12:00:00", 695743999);
insert into participation values("Lucy", 243379726, "2018-02-08 11:00:00", 307700243);
insert into participation values("Soja", 184530918, "2018-03-21 12:00:00", 693543473);
insert into participation values("Nina", 243379726, "2018-07-04 14:30:00", 695743999);
insert into participation values("Minnie", 257457374, "2018-06-25 15:00:00", 307700243);
/*END participation insertion*/

/*Start diagnosis_code insertion*/
insert into diagnosis_code values("7644", "Diabetes");
insert into diagnosis_code values("7899", "Broken Rib");
insert into diagnosis_code values("7897", "Broken Leg");
insert into diagnosis_code values("7455", "Kidney Failure");
insert into diagnosis_code values("7211", "Fleas");
/*END diagnosis_code insertion*/

/*Start consult_diagnosis insertion*/
insert into consult_diagnosis values("7644", "Lacy", 222679022, "2016-08-27 15:30:00");
insert into consult_diagnosis values("7455", "Cookie", 184530918, "2018-03-13 11:00:00");
insert into consult_diagnosis values("7211", "Lacy", 222679022, "2016-08-27 15:30:00");
insert into consult_diagnosis values("7897", "Rex", 236743073, "2017-11-25 14:00:00");
insert into consult_diagnosis values("7211", "Max", 257457374, "2017-12-10 11:30:00");
insert into consult_diagnosis values("7455", "Tweety", 184530918, "2018-01-03 12:00:00");
insert into consult_diagnosis values("7644", "Lucy", 243379726, "2018-02-08 11:00:00");
insert into consult_diagnosis values("7899", "Soja", 184530918, "2018-03-21 12:00:00");
insert into consult_diagnosis values("7455", "Nina", 243379726, "2018-07-04 14:30:00");
insert into consult_diagnosis values("7211", "Minnie", 257457374, "2018-06-25 15:00:00");
/*END consult_diagnosis insertion*/

/*Start prescription insertion*/
insert into prescription values("7644", "Lacy", 222679022, "2016-08-27 15:30:00", "Abiligy", "Bayer", 35, "8h");
insert into prescription values("7211", "Lacy", 222679022, "2016-08-27 15:30:00", "Percocet", "Balsar", 30, "6h");
insert into prescription values("7455", "Cookie", 184530918, "2018-03-13 11:00:00", "Oxycontin", "Fgir", 100, "10h");
insert into prescription values("7897", "Rex", 236743073, "2017-11-25 14:00:00", "Percocet", "Balsar", 30, "6h");
insert into prescription values("7211", "Max", 257457374, "2017-12-10 11:30:00", "Flagyl", "Cool", 75, "12h");
insert into prescription values("7455", "Tweety", 184530918, "2018-01-03 12:00:00", "Ambien", "Bayer", 1000, "12h");
insert into prescription values("7644", "Lucy", 243379726, "2018-02-08 11:00:00", "Actos", "Blue", 35, "8h");
insert into prescription values("7899", "Soja", 184530918, "2018-03-21 12:00:00", "Dilaudid", "Fly", 45, "8h");
insert into prescription values("7455", "Nina", 243379726, "2018-07-04 14:30:00", "Dexilant", "Blue", 50, "6h");
insert into prescription values("7211", "Minnie", 257457374, "2018-06-25 15:00:00", "Oxycontin", "Fgir", 100, "10h");
/*END prescription insertion*/

/*START indicator*/
insert into indicator values("Cholesterol",	160,	"mg",	"To be good should be less than 200");
insert into indicator values("Red Blood Cells",	110,	"mg",	"Can lead to anemia");
insert into indicator values("White Blood Cells",	130,	"mg",	"Can lead to leukemia");
insert into indicator values("Creatinine Level",	1,	"mg/L",	"Creatine level");
/*END*/

/*START procedure_*/
insert into procedure_ values("Lacy",	222679022, "2016-08-27 15:30:00", 1, "Urin analysis");
insert into procedure_ values("Cookie",	184530918, "2018-03-13 11:00:00", 2, "Blood Analysis");
insert into procedure_ values("Rex",	236743073,	"2017-11-25 14:00:00", 3, "Radiography");
insert into procedure_ values("Max",	257457374,	"2017-12-10 11:30:00", 2	,"Blood Analysis");
insert into procedure_ values("Tweety",	184530918,	"2018-01-03 12:00:00", 4,	"Gastric Lavage");
insert into procedure_ values("Lucy",	243379726,	"2018-02-08 11:00:00", 1, "Urin Analysis");
insert into procedure_ values("Soja",	184530918,	"2018-03-21 12:00:00", 3	,"Radiography");
insert into procedure_ values("Nina",	243379726,	"2018-07-04 14:30:00", 4,	"Gastric Lavage");
insert into procedure_ values("Minnie",	257457374,	"2018-06-25 15:00:00", 1	,"Urin Analysis");
/*END*/
/*START performed*/
insert into performed values("Lacy",	222679022,"2016-08-27 15:30:00", 1,	243379726);
insert into performed values("Cookie",	184530918,"2018-03-13 11:00:00", 2,	307700243);
insert into performed values("Rex",	236743073,"2017-11-25 14:00:00", 3,	693543473);
insert into performed values("Max",	257457374,"2017-12-10 11:30:00", 2,	243379726);
insert into performed values("Tweety",	184530918,"2018-01-03 12:00:00", 4,	695743999);
insert into performed values("Lucy",	243379726,"2018-02-08 11:00:00", 1,	307700243);
insert into performed values("Soja",	184530918,"2018-03-21 12:00:00", 3,	693543473);
insert into performed values("Nina",	243379726,"2018-07-04 14:30:00", 4,	695743999);
insert into performed values("Minnie",	257457374,"2018-06-25 15:00:00", 1,	307700243);
/*END*/

/*CENAS DA BIA*/
/*Start radiography insertion*/
insert into radiography values("Rex", 236743073, "2017-11-25 14:00:00", 3, "File_rad1");
insert into radiography values("Soja", 184530918, "2018-03-21 12:00:00", 3, "File_rad2");
/*END radiography insertion*/

/*Start test_procedure insertion*/
insert into test_procedure values("Lacy", 222679022, "2016-08-27 15:30:00", 1, "U");
insert into test_procedure values("Cookie", 184530918, "2018-03-13 11:00:00", 2, "B");
insert into test_procedure values("Max", 257457374, "2017-12-10 11:30:00", 2, "B");
insert into test_procedure values("Lucy", 243379726, "2018-02-08 11:00:00", 1, "U");
insert into test_procedure values("Minnie", 257457374, "2018-06-25 15:00:00", 1, "U");
/*END test_procedure insertion*/

/*START produced_indicator*/
insert into produced_indicator values("Lacy", 222679022,	"2016-08-27 15:30:00",	1,	"Cholesterol",	180);
insert into produced_indicator values("Cookie",	184530918,	"2018-03-13 11:00:00",	2,	"Creatinine Level",	2);
insert into produced_indicator values("Cookie",	184530918,	"2018-03-13 11:00:00",	2,	"White Blood Cells",	117);
insert into produced_indicator values("Max",	257457374,	"2017-12-10 11:30:00",	2,	"Red Blood Cells",	95);
insert into produced_indicator values("Max",	257457374,	"2017-12-10 11:30:00",	2,	"Cholesterol",	200);
insert into produced_indicator values("Lucy",	243379726,	"2018-02-08 11:00:00",	1, "Creatinine Level",	1.3);
insert into produced_indicator values("Minnie",	257457374,	"2018-06-25 15:00:00",	1,	"Creatinine Level",	0.8);
/*END*/
