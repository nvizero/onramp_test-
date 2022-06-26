<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
class BrowsershotController extends Controller
{
    public static function Screenshot(String $url ,String $fileName) {
        Browsershot::url($url)
                ->setOption('args', ['--no-sandbox'])
                ->windowSize(3840, 2160)
                ->save(  "mai_".$fileName.'.jpg');
    }
}
