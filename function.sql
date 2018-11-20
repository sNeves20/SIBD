DELIMITER $$
DROP FUNCTION IF EXISTS  consult_count$$

CREATE FUNCTION consult_count (animal_name varchar(20), owner_VAT integer(30), year integer(4))
  RETURNS integer
BEGIN
  DECLARE c_count integer;
  SELECT COUNT(distinct consult.date_timestamp) INTO c_count
  FROM consult NATURAL JOIN animal
  WHERE animal.name = "Soja" AND animal.VAT =  184530918 AND YEAR(consult.date_timestamp) = 2018
  GROUP BY YEAR(consult.date_timestamp);
RETURN c_count;
END$$

DELIMITER ;
