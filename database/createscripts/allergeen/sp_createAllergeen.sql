DROP PROCEDURE IF EXISTS sp_createAllergeen;

DELIMITER $$ 

CREATE PROCEDURE sp_createAllergeen(
    IN p_naam VARCHAR(50),
    IN p_omschrijving VARCHAR(255)
) 

BEGIN


    -- Insert a new record into the allergenen table
INSERT INTO
    allergeen 
    (naam, 
     omschrijving
     )
     
VALUES
    (p_naam, 
     p_omschrijving
     );

SELECT LAST_INSERT_ID() AS newId;

END $$

DELIMITER ;