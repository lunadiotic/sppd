<?php

namespace App\Services;

use App\Models\Instansi;
use App\Services\GlobalServices;

class InstansiServices extends GlobalServices {

    private $imageType = 'logo';

    public function create($request) 
    {
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageUpload(
                $request->file('logo'), 
                str_replace(' ', '', $data['nama']), 
                $this->imageType
            );
        }

        $this->notif('Data has been created', 'success');
        return $instansi = Instansi::create($data);
    }

    public function find($id)
    {
        return $instansi = Instansi::find($id);
    }

    public function update($request, $id)
    {
        $data = $request->except('logo');
        $instansi = Instansi::find($id);

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageUpload(
                $request->file('logo'), 
                str_replace(' ', '', $data['nama']), 
                $this->imageType
            );
            if ($instansi->logo !== null) $this->imageDelete($instansi->logo);
        }

        $this->notif('Data has been updated', 'success');
        return $instansi->update($data);
    }

    public function delete($id)
    {
        $data = $this->find($id);
        if ($data->logo !== null) $this->imageDelete($data->logo);
        $data->delete();
        $this->notif('Data has been deleted', 'success');
        return $data;
    }
    
    public function getTable()
    {
        $model = Instansi::query();
        return $this->dataTable($model)
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.instansi.show', $model->id),
                    'edit_url' => route('admin.instansi.edit', $model->id),
                    'delete_url' => route('admin.instansi.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}