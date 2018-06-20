<?php

namespace App\Services;

use App\Models\Pengeluaran;
use App\Models\PengeluaranDetail;
use App\Services\GlobalServices;

class PengeluaranDetailServices extends GlobalServices {

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

    public function getTableDetail($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $model = $pengeluaran->detail;
        return $model;
    }
    
    public function getTable($id)
    {
        $pengeluaran = Pengeluaran::whereId($id)->with('detail.biaya')->first();

        $model = $pengeluaran->detail;
        return $this->dataTable($model)
            ->addColumn('action', function($model) use ($id) { 
                return view('layouts.partials._action', [
                    'show_url' => route('admin.pengeluaran.detail.show', [$id, $model->id]),
                    'edit_url' => route('admin.pengeluaran.detail.edit', [$id, $model->id]),
                    'delete_url' => route('admin.pengeluaran.detail.destroy', [$id, $model->id])
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}