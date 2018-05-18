<?php

namespace App\Services;

use App\Models\Biaya;
use App\Services\GlobalServices;

class BiayaServices extends GlobalServices {

    private $imageType = 'logo';

    public function create($request) 
    {
        $data = $request->all();
        $this->notif('Data has been created', 'success');
        return $instansi = Biaya::create($data);
    }

    public function find($id)
    {
        return $instansi = Biaya::find($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $instansi = Biaya::find($id);
        $this->notif('Data has been updated', 'success');
        return $instansi->update($data);
    }

    public function delete($id)
    {
        $data = $this->find($id);
        $data->delete();
        $this->notif('Data has been deleted', 'success');
        return $data;
    }
    
    public function getTable()
    {
        $model = Biaya::query();
        return $this->dataTable($model)
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.biaya.show', $model->id),
                    'edit_url' => route('admin.biaya.edit', $model->id),
                    'delete_url' => route('admin.biaya.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}