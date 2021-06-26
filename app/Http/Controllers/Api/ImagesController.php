<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ImagesRequest;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function send(ImagesRequest $request)
    {
        return response()->json([
            'data' => [
                'url' => $this->makeUrlByRequest($request)
            ]
        ]);
    }

    public function later(ImagesRequest $request)
    {
        return response()->json([
            'data' => [
                'url' => $this->makeUrlByRequest($request)
            ]
        ]);
    }

    protected function makeUrlByRequest(Request $request)
    {
        return '/download?first='.$request->firstImage.'&second='.$request->secondImage.'&third='.$request->thirdImage;
    }
}
