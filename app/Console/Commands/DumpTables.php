<?php

namespace App\Console\Commands;

use App\InformationSchema;
use Illuminate\Console\Command;

class DumpTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump all tables into markdown.';

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
        $tables = InformationSchema::getTables();

        foreach ($tables as $table) {
            $schema = InformationSchema::showCreateTable($table);

            $file = storage_path('../schema/'.$table.'.md');

            file_put_contents($file, "```sql".PHP_EOL.$schema."```".PHP_EOL);

            // write mark down file
            $this->info('Wrote file: '.$file);
        }
    }
}
