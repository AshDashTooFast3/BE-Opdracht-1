use laravel;

DROP PROCEDURE IF EXISTS sp_GetAllLeveranciers;

DELIMITER $$

CREATE PROCEDURE sp_GetAllLeveranciers()
BEGIN
	
    SELECT LVRC.Id
          ,LVRC.Naam
          ,LVRC.ContactPersoon
          ,LVRC.LeverancierNummer
          ,LVRC.Mobiel
          
	FROM Leverancier AS LVRC

END$$

DELIMITER ;

