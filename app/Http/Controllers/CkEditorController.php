<?php

namespace App\Http\Controllers;

use App\Models\CkEditorFakeModel;
use Illuminate\Http\Request;

class CkEditorController extends Controller
{
    public function upload(Request $request)
    {
        if (!$request->hasFile('upload')) {
            return $this->ckeditorError($request, 'No file uploaded.');
        }

        $file = $request->file('upload');

        $ckeditorModel = new CkEditorFakeModel();
        $ckeditorModel->id = 0;
        $ckeditorModel->exists = true;

        $media = $ckeditorModel
            ->addMedia($file)
            ->usingFileName(time() . '_' . $file->getClientOriginalName())
            ->toMediaCollection('ckeditor', 'media');

        $url = $media->getUrl();

        $funcNum = $request->input('CKEditorFuncNum');

        if ($funcNum) {
            $message = 'File uploaded successfully';
            return response(
                "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>"
            )->header('Content-Type', 'text/html; charset=utf-8');
        }

        return response()->json([
            'uploaded' => 1,
            'fileName' => $file->getClientOriginalName(),
            'url' => $url
        ]);
    }

    protected function ckeditorError(Request $request, $message)
    {
        $funcNum = $request->input('CKEditorFuncNum');
        if ($funcNum) {
            return response(
                "<script>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>"
            )->header('Content-Type', 'text/html; charset=utf-8');
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => $message]
        ], 400);
    }
}
