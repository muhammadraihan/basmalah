<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Syarat;
use App\Models\Kategori_syarat;

use Auth;
use DataTables;
use DB;
use File;
use Hash;
use Image;
use Response;
use URL;

class SyaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syarat = Syarat::all();
        if (request()->ajax()) {
            $data = Syarat::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function($row){
                    return $row->kategoriSyarat->name;
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('syarat.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('syarat.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('syarat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori_syarat::all()->pluck('name', 'uuid');
        return view('syarat.create',compact('kategori'));
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
            'detail' => 'required'
        ];

        $messages = [
            '*.required' => 'Field :attribute tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        
        $syarat = new Syarat();
        $syarat->name = $request->name;
        $detail = $request->detail;
        // dd($count);
        if(count($detail) > 0){
            foreach ($detail as $item => $value) {
                $hasil = array(
                    'name' => $syarat->name,
                    'detail' => $detail[$item]
                );
                // dd($hasil);
                Syarat::create($hasil);
            }
        }

        toastr()->success('New Syarat Added', 'Success');
        return redirect()->route('syarat.index');
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
        $syarat = Syarat::uuid($id);
        $kategori = Kategori_syarat::all()->pluck('name', 'uuid');
        // dd($hasil);
        return view('syarat.edit',compact('syarat','kategori'));
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
            'detail' => 'required'
        ];

        $messages = [
            '*.required' => 'Field :attribute tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->all());

        $syarat = Syarat::uuid($id);
        $syarat->name = $request->name;
        $syarat->detail = $request->detail;

        // dd($syarat->detail);
        
        $syarat->save();

        toastr()->success('Syarat Edited', 'Success');
        return redirect()->route('syarat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syarat = Syarat::uuid($id);
        $syarat->delete();
        toastr()->success('Syarat Deleted', 'Success');
        return view('syarat.index');
    }
}
