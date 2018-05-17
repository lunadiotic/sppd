<?php

namespace App\Services;

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