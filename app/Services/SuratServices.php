<?php

namespace App\Services;

use App\Models\SuratPerintah;
use App\Services\GlobalServices;

class SuratServices extends GlobalServices {

    private $imageType = 'logo';

    public function create($request) 
    {
        $surat = $request->except('pelaksana');
        $pelaksana = $request->pelaksana;
        $sp = SuratPerintah::create($surat);
        foreach ($pelaksana as $id) {
            $sp->sppd()->create([
                'pegawai_id' => $id,
            ]);
        }
        $this->notif('Data has been created', 'success');

        return;
    }

    public function find($id)
    {
        return $surat = SuratPerintah::find($id);
    }

    public function update($request, $id)
    {
        $input = $request->except('pelaksana');
        $pelaksana = $request->pelaksana;
        $surat = SuratPerintah::find($id);
        $surat->update($input);

        if(count($pelaksana) > 0) {
            // $surat->sppd()->sync($pelaksana);
            $surat->sppd()->delete();
            foreach ($pelaksana as $idPelaksana) {
                $surat->sppd()->create([
                    'pegawai_id' => $idPelaksana,
                ]);
            }
        } else {
            $surat->sppd()->delete();
        }

        $this->notif('Data has been updated', 'success');

        return;
    }

    public function delete($id)
    {
        $data = $this->find($id);
        $data->sppd()->delete();
        $data->delete();    
        $this->notif('Data has been deleted', 'success');
        return;
    }
    
    public function getTable()
    {
        $model = SuratPerintah::query();
        return $this->dataTable($model)
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? 'Aktif' : 'Tidak Aktif';
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.surat.show', $model->id),
                    'edit_url' => route('admin.surat.edit', $model->id),
                    'delete_url' => route('admin.surat.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}