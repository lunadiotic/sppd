<?php

namespace App\Services;

use App\Models\Pengeluaran;
use App\Models\Sppd;
use App\Services\GlobalServices;

class PengeluaranServices extends GlobalServices {

    public function create($request) 
    {
        $data = $request->all();
        // Sppd::where('id', $request->sppd_id)->update([
        //     'status' => 1
        // ]);
        $this->notif('Data has been created', 'success');
        return $instansi = Pengeluaran::create($data);
    }

    public function find($id)
    {
        return $instansi = Pengeluaran::find($id);
    }

    public function show($id)
    {
        $data['pengeluaran'] = Pengeluaran::find($id);
        $data['total'] = 0;

        if(count($data['pengeluaran']->detail) > 0) {
            foreach ($data['pengeluaran']->detail as $row) {
                $data['total'] += $row->total;
            }

            return $data;
        }

        return $data;
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
            ->addColumn('sppd', function ($model) {
                return '<a href="' . route('admin.sppd.show', $model->sppd->id) .'">' . $model->sppd->nomor . '</a>';
            })
            ->addColumn('detail', function ($model) {
                return '<a href="' . route('admin.pengeluaran.detail.index', $model->id) . '" class="btn btn-sm green btn-outline">Detail</a>';
            })
            ->addColumn('action', function($model) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.pengeluaran.show', $model->id),
                    'edit_url' => route('admin.pengeluaran.edit', $model->id),
                    'delete_url' => route('admin.pengeluaran.destroy', $model->id)
                ]);
            })
            ->rawColumns(['action', 'detail', 'sppd'])
            ->make(true);
    }

}