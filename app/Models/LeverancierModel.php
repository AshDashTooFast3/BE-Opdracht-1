<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverancierModel extends Model
{
     public function sp_getAllLeveranciers()
    {
        $result = DB::select('CALL Sp_GetAllLeveranciers');
        return $result;

    }
    
}
