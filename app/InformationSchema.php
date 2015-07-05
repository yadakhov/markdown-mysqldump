<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class InformationSchema extends Model
{
    /**
     * Get all the tables in the database
     *
     * @return array
     */
    public static function getTables()
    {
        $sql = 'SELECT * FROM information_schema.tables WHERE table_schema = ?';

        $rows = DB::select($sql, [env('DB_DATABASE')]);

        $out = [];

        foreach ($rows as $row) {
            $out[] = $row->TABLE_NAME;
        }

        return $out;
    }

    /**
     * Show create table
     *
     * @param $table
     * @return string
     */
    public static function showCreateTable($table)
    {
        $sql = 'SHOW CREATE TABLE '.$table;

        $result = DB::select($sql);

        $out = '';

        if (isset($result[0])) {
            $object = $result[0];

            $out .= $object->{'Create Table'};
            $out .= ';'.PHP_EOL;
        }

        return $out;
    }
}
