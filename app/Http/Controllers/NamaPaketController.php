<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaPaket;
use App\Models\Kategori;

use Auth;
use DataTables;
use DB;
use File;
use Hash;
use Image;
use Response;
use URL;

class NamaPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namapaket = NamaPaket::all();
        if (request()->ajax()) {
            $data = NamaPaket::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('kategori', function($row){
                    return $row->Kategori->name;
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('namapaket.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('namapaket.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('nama_paket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all()->pluck('name', 'uuid');
        return view('nama_paket.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'kategori' => 'required'
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $namapaket = new NamaPaket();
        $namapaket->name = $request->name;
        $namapaket->kategori = $request->kategori;
        $namapaket->save();

        toastr()->success('New Nama Paket Added', 'Success');
        return redirect()->route('namapaket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $namapaket = NamaPaket::uuid($id);
        $kategori = Kategori::all()->pluck('name','uuid');
        return view('nama_paket.edit',compact('namapaket','kategori'));
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
        $rules = [
            'name' => 'required',
            'kategori' => 'required'
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $namapaket = NamaPaket::uuid($id);
        $namapaket->name = $request->name;
        $namapaket->kategori = $request->kategori;
        $namapaket->save();

        toastr()->success('Nama Paket Edited', 'Success');
        return redirect()->route('namapaket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $namapaket = NamaPaket::uuid($id);
        $namapaket->delete();
        toastr()->success('Nama Paket Deleted', 'Success');
        return redirect()->route('namapaket.index');
    }
}
