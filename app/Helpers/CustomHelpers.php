<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

if (!function_exists('unique_fileupload_name')) {
    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @return string
     */
    function unique_fileupload_name(\Illuminate\Http\UploadedFile $file)
    {
        $baseFileName = mb_strtolower($file->getClientOriginalName());
        $ext = strtolower($file->getClientOriginalExtension());
        $filenameWithoutExt = preg_replace("~\." . $ext . "$~i", '', $baseFileName);

        $final = str_slug($filenameWithoutExt) . '_' . date('YmdHis') . '.' . $ext;

        return $final;
    }
}

if (!function_exists('file_storage_upload')) {
    /**
     * @param $path
     * @param $file
     * @param $name
     * @return mixed
     */
    function file_storage_upload($path, $file, $name)
    {
        return Storage::disk(config('filesystems.default'))->putFileAs($path, $file, $name);
    }
}

if (!function_exists('file_storage_url')) {
    /**
     * @param $file
     * @return mixed
     */
    function file_storage_url($file)
    {
        return Storage::disk(config('filesystems.default'))->url($file);
    }
}

if (!function_exists('file_storage_exists')) {
    /**
     * @param $file
     * @return bool
     */
    function file_storage_exists($file)
    {
        if (!$file) {
            return false;
        }

        $path = Storage::disk(config('filesystems.default'))->url($file);


        if (file_exists(substr($path, 1))) {
            return true;
        }

        return false;
    }
}

if (!function_exists('file_storage_delete')) {
    /**
     * @param $file
     * @return mixed
     */
    function file_storage_delete($file)
    {
        return Storage::disk(config('filesystems.default'))->delete($file);
    }
}

if (!function_exists('money_to_float')) {
    /**
     * Transforms a valid money string to float
     *
     * @param string $number
     *
     * @return float
     */
    function money_to_float($number)
    {
        if (!is_null($number)) {
            // Removing non-number caracteres.
            $number = preg_replace("/[^0-9,.-]/", "", $number);

            if (substr($number, -1) == ',' || substr($number, -1) == '.') {
                $number = substr($number, 0, strlen($number) - 1);
            }
        }

        if (preg_match("/^(-)?[0-9]{1,3}(,?[0-9]{3})*(\.[0-9]{1,6})?$/", $number)) {
            return (float)str_replace(',', '.', $number);
        } elseif (preg_match("/^(-)?[0-9]{1,3}(\.?[0-9]{3})*(,[0-9]{1,6})?$/", $number)) {
            return (float)str_replace(',', '.', str_replace('.', '', $number));
        } elseif (empty($number)) {
            return (float)0;
        } elseif ($number <= 0.000001) {
            return (float)0;
        } else {
            throw new InvalidArgumentException(
                'The parameter is not a valid money string. Ex.: 100.00, 100,00, 1.000,00, 1,000.00'
            );
        }
    }
}

if (!function_exists('float_to_money')) {
    /**
     * Transforms a float to a currency formatted string
     *
     * @param float $number
     *
     * @return string
     */
    function float_to_money($number, $prefix = 'R$ ', $decimals = 2)
    {
        try {
            if (empty($number)) {
                $number = 0;
            }

            return $prefix . number_format(round($number, $decimals), $decimals, ',', '.');
        } catch (Exception $e) {
            dd($number, $prefix, $e);
        }
    }
}