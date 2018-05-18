<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PegawaiServices;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    public $srv;
    public function __construct()
    {
        $this->srv = new PegawaiServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
        // return $request->all();
        $this->srv->create($request);
        return redirect()->route('admin.pegawai.index');
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
        return view('pages.pegawai.show', compact('data'));
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
        return view('pages.pegawai.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
        $this->srv->update($request, $id);
        return redirect()->route('admin.pegawai.index');
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
        return redirect()->route('admin.pegawai.index');
    }

    /**
     * Datatable API
     */
    public function dataTable()
    {
        return $this->srv->getTable();
    }
}
