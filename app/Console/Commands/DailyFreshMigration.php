<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
class DailyFreshMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:dailyfresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to fresh the migration daily';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('migrate:fresh', [
            '--force' => true
         ]);
        Artisan::call('db:seed', [
            '--force' => true
         ]);
        File::copyDirectory(
            base_path('./') . '/' . 'public/images/spare',
            base_path('./') . '/' . 'public/images/productImages'
            );
    }
}
