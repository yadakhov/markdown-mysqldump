<?php

namespace App\Console\Commands;

use App\MysqlDump;
use Illuminate\Console\Command;

class DumpListTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:list-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all the tables.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tables = MysqlDump::getTables();

        foreach ($tables as $table) {
            $this->info($table->TABLE_NAME);
        }
    }
}
