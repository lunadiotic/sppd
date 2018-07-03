<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiEximController extends Controller
{
    public function index()
    {
        $url = env('SKPD_API_URL', '').'daf_skpd/appkey/'.env('SKPD_API_TOKEN', '');
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', $url);
        $result = json_decode($res->getBody());

        return $result->data;
    }

    public function dataImport()
    {
        $id = '176';
        $url = env('SKPD_API_URL', '').'daf_peg_skpd/appkey/'.env('SKPD_API_TOKEN', '')."/skpd/{$id}";
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', $url);
        $result = json_decode($res->getBody());

        foreach ($result->data as $row) {
            Pegawai::insert([
                'nip' => str_replace(' ','', $row->nip),
                'nama' => $row->nama,
                'pangkat' => $row->pangkat,
                'golongan' => $row->golongan,
                'jabatan' => $row->jabatan,
                'skpd' => $row->skpd,
            ]);
        }

        return 'success';
    }
}
