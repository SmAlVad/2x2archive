<?php

use Illuminate\Database\Seeder;
use App\Models\Pdfpaper;

class PdfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pdfs = Storage::files('public/tmp_pdf');

        $data = [];

        foreach ($pdfs as $pdf) {

            $file = new Pdfpaper($pdf);

            $data[] = [
                'project_id'    => $file->projectId(),
                'file_name'     => $file->fileName(),
                'year'          => $file->year(),
                'month'         => $file->month(),
                'day'           => $file->day(),
                'number'        => $file->number(),
                'created_by'    => 'Авто-загрузка',
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        \DB::table('pdfs')->insert($data);
    }
}
