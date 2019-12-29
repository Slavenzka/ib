<?php

namespace App\Http;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class Helper
{
    public static function createFileName(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();
        $fileName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);

        return Str::slug($fileName) . '.' . $file->getClientOriginalExtension();
    }

    /**
     * @param string $string
     * @return string
     */
    public static function removeTags(string $string): string
    {
        return trim(
            preg_replace('#<[^>]+>#', ' ', $string)
        );
    }

    /**
     * @param $phone
     * @return string
     */
    public static function stripPhoneNumber($phone): string
    {
        return str_replace([' ', '(', ')', '-'], '', $phone);
    }

    public static function makeFilter($requestName, $item)
    {
        $output = request()->except($requestName, 'page');
        $add = collect(request($requestName));

        $append = $add->contains($item) ? $add->filter(function ($i) use ($item) {
            return $i != $item;
        }) : $add->push($item);

        return array_merge($output, [$requestName => $append->all()]);
    }
}
