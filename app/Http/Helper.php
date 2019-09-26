<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

if (!function_exists('createFileName')) {
    function createFileName(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();
        $fileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);

        return Str::slug($fileName).'.'.$file->getClientOriginalExtension();
    }
}
