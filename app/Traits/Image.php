<?php
/**
 * Created by PhpStorm.
 * User: msahi
 * Date: 29.12.2018
 * Time: 15:35
 */

namespace App\Traits;

trait Image{

    /**
     * @param $model
     * @param $key
     */
    public function setImagePath($model, $key)
    {
        if ( request()->hasFile($key) ) {
            $image = request($key);
            $file_name = "$key-" . time() . '.' . $image->extension();
            $target_directory = 'uploads/files';
            $file_path = $target_directory . '/' . $file_name;
            $image->move($target_directory, $file_name);
            $model->$key = $file_path;
            return $model->$key;
        }
    }
}



