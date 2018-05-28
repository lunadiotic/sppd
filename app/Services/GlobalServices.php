<?php

namespace App\Services;

use DB;
use Yajra\Datatables\Datatables;

class GlobalServices {
    
    /**
     * Generate Flash Session
     * For Notification
     */
    public function notif($message, $type)
    {
        session()->flash('message', $message);
        session()->flash('type', $type);
    }

    /**
     * Select2 Search
     */
    public function select2($request, $table)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table($table)
                ->select('id','nama')
                ->where('nama', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    public function select2surat($request, $table)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = DB::table($table)
                ->select('id','nomor')
                ->where('nomor', 'LIKE', "%$search%")
                ->get();
        }

        return response()->json($data);
    }

    /**
     * DataTables Instance Object
     */
    public function dataTable($model)
    {
        return DataTables::of($model);
    }

    /**
     * Upload Image
     */
    public function imageUpload($file, $name, $type)
    {
        $photo = $file;
        $fileName = date('ymdHis') . '-' . $name . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $type;
        $photo->move($destinationPath, $fileName);
        return 'images' . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $fileName;
    }

    /**
     * Delete image
     */
    public function imageDelete($name)
    {
        unlink($name);
    }
}