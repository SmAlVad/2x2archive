<?php

namespace App\Console\Commands;

use App\Mail\AdsSaved;
use Illuminate\Console\Command;
use App\Models\Csfd;
use App\Models\CsfdSaveLog as Log;

class UploadCsfd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csfd:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upload and save to db a csfd data';

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
        $errors = [];
        $count = 0;

        $data = file_get_contents('http://2x2.su/public/archive/' . date('Y-m-d'));

        if ($data !== false) {

            $data = unserialize($data);

            $last_item = count($data) - 1;
            $first_id = $data[1]['csfd_id'];
            $last_id = $data[$last_item]['csfd_id'];

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
                    $count++;
                } catch(\Illuminate\Database\QueryException $ex){
                    $errors[] = $ex->getMessage();
                }
            }

            $log = new Log();
            $log->count = $count;
            $log->first_id = $first_id;
            $log->last_id = $last_id;
            $log->save();

            \Mail::to('san@2x2.su')->send(
                new AdsSaved($log)
            );
        }

    }
}
