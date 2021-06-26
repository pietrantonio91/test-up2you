<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
        $pdf = \PDF::loadView('pdf.images', [
            'first' => $request->first,
            'second' => $request->second,
            'third' => $request->third,
        ]);
        return $pdf->download('images.pdf');
    }
}
