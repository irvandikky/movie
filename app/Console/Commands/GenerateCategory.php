<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TMDB;

class GenerateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tmdb:category';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->output->title('Start Grab Category');

        $tmdb = new TMDB();
        $tmdb->generate(1);
    }
}
