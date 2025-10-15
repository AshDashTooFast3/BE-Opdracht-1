<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllergeenModel extends Model
{
     public function sp_getAllAllergenen()
    {
        $result = DB::select('CALL Sp_GetAllAllergenen');
        return $result;

    }

    public function sp_createAllergeen($naam, $description)
    {
        $row = DB::selectOne('CALL sp_CreateAllergeen(?, ?)', [$naam, $description]);
        return $row->newId;
    }

    public function sp_DeleteAllergeen($Id)
    {
        $row = DB::selectOne(
            'CALL sp_DeleteAllergeen(?)',
            [$Id]
        );
        return $row->affected ?? 0;
    }

    public function sp_GetAllergeenById($id)
    {
        $row = DB::selectOne(
            'CALL sp_GetAllergeenById(?)',
            [$id]
        );
        return $row;
    }

    public function sp_UpdateAllergeen($id, $name, $description)
    {
        $row = DB::selectOne(
            'CALL sp_UpdateAllergeen(?, ?, ?)',
            [$id, $name, $description]
        );
        return $row->affected ?? 0;
    }
}
