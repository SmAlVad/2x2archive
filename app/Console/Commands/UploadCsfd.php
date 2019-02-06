<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Csfd;

class UploadCsfd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csfd:upload {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload csfd data';

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
        $file       = $this->argument('file');
        $data       = file_get_contents(public_path('csfd') . '/' . $file);
        $data       = unserialize($data);

        foreach ($data as $item) {

            $csfd = new Csfd();

            $csfd->csfd_id      = $item['csfd_id'];
            $csfd->region       = $item['region'];
            $csfd->city         = $item['city'];
            $csfd->cat1         = $item['cat1'];
            $csfd->cat2         = $item['cat2'];
            $csfd->cat3         = $item['cat3'];
            $csfd->title        = $item['title'];
            $csfd->body         = $item['body'];
            $csfd->tags         = $item['tags'];
            $csfd->price        = $item['price'];
            $csfd->tel          = $item['tel'];
            $csfd->email        = $item['email'];
            $csfd->name         = $item['name'];
            $csfd->date_start   = $item['date_start'];
            $csfd->date_end     = $item['date_end'];
            $csfd->image        = $item['image'];
            $csfd->params       = ($item['params']) ? $csfd->makeStrParams($item['params']) : '';

            try {
                $csfd->save();
            } catch(\Illuminate\Database\QueryException $ex){
                echo "{$ex->getMessage()}\n\r";
            }
        }
    }
}
