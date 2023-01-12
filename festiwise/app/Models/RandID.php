<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class RandId extends Model{
      public static function generateID()
    {
        $stringID = (string)time();
        for ($i = 0; $i < 5; $i++) {
            $stringID .= mt_rand(1, 9);
        }
        return $stringID;
    }
    }
