<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SuratServices;
use App\Http\Requests\SuratRequest;

class SuratController extends Controller
{
    public $srv;
    public function __construct()
    {
        $this->srv = new SuratServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.surat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $pelaksana = $request->pelaksana;
        $this->srv->create($request);
        return redirect()->route('admin.surat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->srv->find($id);
        return view('pages.surat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->srv->find($id);
        return view('pages.surat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->srv->update($request, $id);
        return redirect()->route('admin.surat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->srv->delete($id);
        return redirect()->route('admin.surat.index');
    }

    /**
     * Datatable API
     */
    public function dataTable()
    {
        return $this->srv->getTable();
    }

    /**
     * Select2 AJAX
     */
    public function getSelect2(Request $request)
    {
        return $this->srv->select2($request, 'pegawai');
    }
}
