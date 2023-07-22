<?php

namespace App\Console\Commands;

use App\Models\Hour;
use App\Models\Schedule;
use Illuminate\Console\Command;

class ResetDataBaseDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para reiniciar os dados do banco diariamente';

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
     * @return int
     */
    public function handle()
    {
        Hour::query()->update(['total' => 0]);
        Schedule::truncate();
    }
}
