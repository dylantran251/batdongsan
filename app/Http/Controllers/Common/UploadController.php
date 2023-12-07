<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;


class UploadController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $fileName = time().  random_int(100, 999)  .'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
            return Response::json(['data' => $fileName]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return Response::json(['message' => 'Lỗi khi tải ảnh lên.']);
        }
    }

    public function remove(Request $request)
    {
        $data = $request->all();
        if (File::exists(public_path('uploads/'.$data['fileName']))) {
            File::delete(public_path('uploads/'.$data['fileName']));
        }
        return response()->json(['message' => $data['fileName']]);
    }
}
