<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstansiServices;
use App\Http\Requests\InstansiRequest;

class InstansiController extends Controller
{
    public $srv;
    public function __construct()
    {
        $this->srv = new InstansiServices();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.instansi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstansiRequest $request)
    {
        // return $request->all();
        $this->srv->create($request);
        return redirect()->route('admin.instansi.index');
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
        return view('pages.instansi.show', compact('data'));
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
        return view('pages.instansi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstansiRequest $request, $id)
    {
        $this->srv->update($request, $id);
        return redirect()->route('admin.instansi.index');
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
        return redirect()->route('admin.instansi.index');
    }

    /**
     * Datatable API
     */
    public function dataTable()
    {
        return $this->srv->getTable();
    }
}
