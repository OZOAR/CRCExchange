<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;

class CourseController extends Controller
{
    public function getCourses()
    {
        try {
            $xml = \Storage::get('rates.xml');
        } catch (FileNotFoundException $e) {
            return '<?xml version="1.0"?><error>Rates are not found</error>';
        }

        return $xml;
    }
}
