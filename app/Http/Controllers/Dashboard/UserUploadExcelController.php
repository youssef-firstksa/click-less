<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class UserUploadExcelController extends Controller
{
    public function form()
    {
        Gate::authorize('bulk-upload-user');

        return view('dashboard.users.upload');
    }

    public function upload(Request $request)
    {
        Gate::authorize('bulk-upload-user');

        $request->validate([
            'file' => ['required', 'file', 'mimes:xlsx,csv', 'max:2048'],
            'action' => ['required', 'in:create-update,activated,disabled'],
        ]);

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filePath = $file->storeAs('uploads', "users.{$extension}", 'local');

        Excel::import(new UsersImport, $filePath);

        return redirect()->route('dashboard.users.index')->with('success', __('dashboard.messages.success.updated', ['resource' => __('dashboard.general.users')]));
    }
}
