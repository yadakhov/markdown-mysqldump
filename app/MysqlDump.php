<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class MysqlDump extends Model
{
    public static function getTables()
    {
        $sql = 'select * from information_schema.tables where table_schema = ?';

        return DB::select($sql, [env('DB_DATABASE')]);
    }
}
