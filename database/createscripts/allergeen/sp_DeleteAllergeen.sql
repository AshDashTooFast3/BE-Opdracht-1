DELIMITER $$

DROP PROCEDURE IF EXISTS sp_DeleteAllergeen$$

CREATE PROCEDURE sp_DeleteAllergeen( IN p_Id INT)

BEGIN

    DELETE FROM Allergeen
    WHERE Id = p_Id;
    
    SELECT ROW_COUNT() as affected;

END $$

DELIMITER ;