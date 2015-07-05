<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class InformationSchema extends Model
{
    public static function getTables()
    {
        $sql = 'SELECT * FROM information_schema.tables WHERE table_schema = ?';

        return DB::select($sql, [env('DB_DATABASE')]);
    }
}
