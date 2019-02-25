<?php

namespace App\Models;

/**
 *  Вспомогательный калсс для работы с массовой записью pdf файлов
 *
 * Class Pdfpaper
 * @package App\Models
 *
 */
class Pdfpaper
{
    /**
     * Имя файла
     * @var
     */
    public $file;

    /**
     * Pdfpaper constructor.
     * @param $file_path
     */
    function __construct($file_path)
    {
        $path = explode('/', $file_path);
        $file = $path[2];

        $this->file = $file;

    }

    /**
     * Возвращает id соответствующиго проекта
     * @return mixed
     */
    public function projectId()
    {
        $file = explode('_', $this->file);
        $project_slug = $file[0];

        $project = Project::where('slug', '=', $project_slug)->pluck('id');

        return $project[0];
    }

    /**
     * Имя файла
     * @return mixed
     */
    public function fileName()
    {
        return $this->file;
    }

    /**
     * Год
     * @return bool|string
     */
    public function year()
    {
        $file = explode('_', $this->file);

        return substr($file[4], 0,4);
    }

    /**
     * Месяц
     * @return mixed
     */
    public function month()
    {
        $file = explode('_', $this->file);

        return $file[3];
    }

    /**
     * День
     * @return mixed
     */
    public function day()
    {
        $file = explode('_', $this->file);

        return $file[2];
    }

    /**
     * Номер
     * @return bool|string
     */
    public function number()
    {
        $file = explode('_', $this->file);

        return substr($file[1], 1);
    }
}
