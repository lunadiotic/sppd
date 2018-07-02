<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PengeluaranDetailServices;

class PengeluaranDetailController extends Controller
{
    public $srv;
    public function __construct()
    {
        $this->srv = new PengeluaranDetailServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('pages.pengeluaran.detail.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('pages.pengeluaran.detail.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request['pengeluaran_id'] = $id;
        $request['total'] = ($request->harga * $request->qty);
        // return $request->all();
        $this->srv->create($request);
        return redirect()->route('admin.pengeluaran.detail.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $detailId)
    {
        $data = $this->srv->find($detailId);
        return view('pages.pengeluaran.detail.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $detailId)
    {
        $data = $this->srv->find($detailId);
        return view('pages.pengeluaran.detail.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $detailId)
    {
        $this->srv->update($request, $detailId);
        return redirect()->route('admin.pengeluaran.detail.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $detailId)
    {
        $this->srv->delete($detailId);
        return redirect()->route('admin.pengeluaran.detail.index', $id);
    }

    /**
     * Datatable API
     */
    public function dataTable($id)
    {
        return $this->srv->getTable($id);
    }

    public function printReport($id)
    {
        $data = $this->srv->printReport($id);
        return view('pages.pengeluaran.detail.print', compact('data'));
    }

    public function complete($id)
    {
        $data = $this->srv->complete($id);
        return redirect()->route('admin.pengeluaran.detail.index', $id);
    }
}
