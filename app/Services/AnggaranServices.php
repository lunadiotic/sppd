<?php

namespace App\Services;

use App\Models\Anggaran;
use App\Services\GlobalServices;
use App\Helpers\MoneyFormat;

class AnggaranServices extends GlobalServices {

    public function create($request) 
    {
        $data = $request->all();
        $this->notif('Data has been created', 'success');
        return $anggaran = Anggaran::create($data);
    }

    public function find($id)
    {
        return $surat = Anggaran::find($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $anggaran = Anggaran::find($id);
        $this->notif('Data has been updated', 'success');
        return $anggaran->update($data);
    }

    public function delete($id)
    {
        $data = $this->find($id);
        $data->delete();    
        $this->notif('Data has been deleted', 'success');
        return;
    }
    
    public function getTable()
    {
        $model = Anggaran::query();
        return $this->dataTable($model)
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('nominal', function ($model) {
                return MoneyFormat::rupiah($model->dana);
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.anggaran.show', $model->id),
                    'edit_url' => route('admin.anggaran.edit', $model->id),
                    'delete_url' => route('admin.anggaran.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}