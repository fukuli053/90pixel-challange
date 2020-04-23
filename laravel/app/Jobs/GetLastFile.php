<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class GetLastFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mostRecent = array(
        'time' => 0,
        'file' => null
    );

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function getFile(){

    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $files = Storage::disk('categoryFTP')->files('categories');

        foreach ($files as $file) {
            // get the last modified time for the file
            $time = preg_replace('/[^0-9]/', '', $file);
            if (strtotime($time) > strtotime($this->mostRecent['time'])) {
                // this file is the most recent so far
                $this->mostRecent['time'] = $time;
                $this->mostRecent['file'] = $file;
            }
        }
        $file = Storage::disk('categoryFTP')->get($this->mostRecent['file']);
        Storage::disk('local')->put('categories.xlsx', $file);
    }
}
