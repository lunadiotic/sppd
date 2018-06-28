<?php

namespace App\Services;

use App\Models\Sppd;
use App\Services\GlobalServices;

class SppdServices extends GlobalServices {

    public function create($request) 
    {

        // $request['pengikut'] = array_chunk($request['pengikut'],3);
        $request['pengikut'] = implode(",", $request['pengikut']);
        Sppd::create($request->all());
        $this->notif('Data has been created', 'success');
        return;
    }

    public function find($id)
    {
        return $sppd = Sppd::find($id);
    }

    public function edit($id)
    {
        $sppd = Sppd::find($id);
        if($sppd['pengikut']){
            $sppd['pengikut'] = explode(",", $sppd['pengikut']);
            $sppd['pengikut'] = array_chunk($sppd['pengikut'],3);
        }
        $sppd['pengikut'] = null;
        return $sppd;
    }

    public function update($request, $id)
    {
        $pengikut = array_chunk($request['pengikut'],3);
        if(count($pengikut[0]) > 0) {
            $pelaksana = $request['pengikut'] = implode(",", $request['pengikut']);
        } else {
            $pelaksana = null;
        }
        
        $sppd = Sppd::findOrFail($id);
        $sppd->update($request->all());

        $this->notif('Data has been updated', 'success');

        return;
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
        $model = Sppd::query();
        return $this->dataTable($model)
            ->addColumn('nomor_sp', function ($model) {
                return $model->surat->nomor;
            })
            ->addColumn('nama', function ($model) {
                return $model->pegawai->nama;
            })
            ->addColumn('tanggal', function ($model) {
                return $model->tanggal_berangkat . '-' . $model->tanggal_kembali;
            })
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.sppd.show', $model->id),
                    'edit_url' => route('admin.sppd.edit', $model->id),
                    'delete_url' => route('admin.sppd.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}