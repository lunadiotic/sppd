<?php

namespace App\Services;

use App\Models\Pengeluaran;
use App\Services\GlobalServices;

class PengeluaranServices extends GlobalServices {

    private $imageType = 'logo';

    public function create($request) 
    {
        $data = $request->all();
        $this->notif('Data has been created', 'success');
        return $instansi = Pengeluaran::create($data);
    }

    public function find($id)
    {
        return $instansi = Pengeluaran::find($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $instansi = Pengeluaran::find($id);
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
        $model = Pengeluaran::query();
        return $this->dataTable($model)
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.pegawai.show', $model->id),
                    'edit_url' => route('admin.pegawai.edit', $model->id),
                    'delete_url' => route('admin.pegawai.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}