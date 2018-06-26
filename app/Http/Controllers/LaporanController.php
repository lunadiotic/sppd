<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LaporanServices;

class LaporanController extends Controller
{
    public $srv;
    public function __construct()
    {
        $this->srv = new LaporanServices();
    }

    public function index()
    {
        return view('pages.laporan.index');
    }

    public function getByMonth(Request $request)
    {
        $data = $this->srv->reportByMonth($request);
        if ($request->type == 'sppd') {
            return view('pages.laporan.report_sppd', compact('data'));
        } else {
            return view('pages.laporan.report_saldo', compact('data'));
        }
    }

    public function getByYear(Request $request)
    {
        $data = $this->srv->reportByYear($request);
        if ($request->type == 'sppd') {
            return view('pages.laporan.report_sppd', compact('data'));
        } else {
            return view('pages.laporan.report_saldo', compact('data'));
        }
    }
}
