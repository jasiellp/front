<?php

namespace App\Repositories;

class CodeRepository
{
    /**
     * Upload and save the file and return the name of the file
     *
     * @param $file
     * @param $path
     * @return mixed|string
     */
    public static function saveFile($file, $path)
    {

        try {
            $path = str_replace('public/', '', $path);

            if ($path[0] == '/') {
                $path = substr($path, 1);
            }

            $arquivo = file_storage_upload('public/' . $path, $file, unique_fileupload_name($file));

            return $arquivo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}