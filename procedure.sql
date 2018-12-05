--PROCEDURE:
DELIMITER $$

drop procedure if exists ref_values$$
CREATE procedure ref_values()
    begin
        UPDATE indicator, produced_indicator
        SET indicator.units='cg', produced_indicator.value=produced_indicator.value *0.1, indicator.reference_value=indicator.reference_value *0.1
        WHERE produced_indicator.indicator_name=indicator.name AND indicator.units='mg'; 
    end$$

DELIMITER ;
