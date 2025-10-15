DROP PROCEDURE IF EXISTS sp_GetAllLeveranciers;

CALL laravel.sp_GetAllLeveranciers;
DELIMITER $$

CREATE PROCEDURE sp_GetAllLeveranciers ()
BEGIN

    SELECT LVRAC.Id
          ,LVRAC.Naam
          ,LVRAC.Contactpersoon
          ,LVRAC.LeverancierNummer
          ,LVRAC.Mobiel
    FROM Leverancier AS LVRAC;
    
    
END$$

DELIMITER ;
