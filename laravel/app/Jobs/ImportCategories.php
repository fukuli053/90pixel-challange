<?php

namespace App\Jobs;

use App\Imports\CategoriesImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportCategories implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Import categories file to DB.
     *
     * @return void
     */
    private function importCategories(){
        Excel::import(new CategoriesImport,  'categories.xlsx', 'local');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $this->importCategories();
    }
}
