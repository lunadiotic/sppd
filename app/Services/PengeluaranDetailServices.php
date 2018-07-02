<?php

namespace App\Services;

use App\Models\Sppd;
use App\Models\Pengeluaran;
use App\Models\PengeluaranDetail;
use App\Models\Transaksi;
use App\Services\GlobalServices;

class PengeluaranDetailServices extends GlobalServices {

    public function create($request) 
    {
        $data = $request->all();
        $this->notif('Data has been created', 'success');
        return $instansi = PengeluaranDetail::create($data);
    }

    public function find($id)
    {
        return $instansi = PengeluaranDetail::find($id);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $instansi = PengeluaranDetail::find($id);
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

    public function printReport($id)
    {
        $data['pengeluaran'] = Pengeluaran::with('sppd')->find($id);
        // $data['detail'] = PengeluaranDetail::with('biaya')->where('pengeluaran_id', $id)->get();
        return $data;
    }

    public function complete($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $sppd = Sppd::where('id', $pengeluaran->sppd_id)->update([
            'status' => '1'
        ]);
        $transaksi = Transaksi::orderBy('id', 'DESC')->first();

        $newTransaksi = [
            'tanggal' => date('Y-m-d'),
            'last' => $last = $transaksi->saldo,
            'out' => $out = $pengeluaran->detail->sum('total'),
            'saldo' => ($last - $out),
            'pengeluaran_id' => $id
        ];

        return Transaksi::create($newTransaksi);
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
            ->addColumn('qty', function ($model) {
                return $model->qty . ' ' . $model->satuan;
            })
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