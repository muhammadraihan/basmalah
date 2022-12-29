<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DataTables;
use DB;
use File;
use Hash;
use Image;
use Response;
use URL;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        if (request()->ajax()) {
            $data = Testimoni::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('tanggal', function ($row) {
                    if ($row->tanggal == null){
                        return Carbon::make(null);
                    }
                    return Carbon::parse($row->tanggal)->translatedFormat('d M Y');
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('testimoni.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('testimoni.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('testimoni.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimoni.create');
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
            'judul' => 'required',
            'nama_jemaah' => 'required',
            'umur' => 'required',
            'nama_paket' => 'required',
            'tanggal' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $testimoni = new Testimoni();
        $testimoni->judul = $request->judul;
        $testimoni->nama_jemaah = $request->nama_jemaah;
        $testimoni->umur = $request->umur;
        $testimoni->nama_paket = $request->nama_paket;
        $testimoni->tanggal = $request->tanggal;

        if ($image = $request->file('video')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $testimoni->video = "$profileImage";
        }
        $testimoni->save();

        toastr()->success('New Testimoni Added', 'Success');
        return redirect()->route('testimoni.index');
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
        $testimoni = Testimoni::uuid($id);
        return view('testimoni.edit',compact('testimoni'));
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
            'judul' => 'required',
            'nama_jemaah' => 'required',
            'umur' => 'required',
            'nama_paket' => 'required',
            'tanggal' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $testimoni = Testimoni::uuid($id);
        $testimoni->judul = $request->judul;
        $testimoni->nama_jemaah = $request->nama_jemaah;
        $testimoni->umur = $request->umur;
        $testimoni->nama_paket = $request->nama_paket;
        $testimoni->tanggal = $request->tanggal;

        if($request->hasFile('video')){

            // user intends to replace the current image for the category.  
            // delete existing (if set)
        
            if($oldImage = $testimoni->video) {
        
                unlink(public_path('photo/') . $oldImage);
            }
        
            // save the new image
            $image = $request->file('video');
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $testimoni->video = "$profileImage";
        }
        $testimoni->save();

        toastr()->success('Testimoni Edited', 'Success');
        return redirect()->route('testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::uuid($id);
        $video = public_path('photo/').$testimoni->video;
        if(file_exists($video)){
            unlink($video);
        }
        $testimoni->delete();
        toastr()->success('Testimoni Deleted', 'Success');
        return redirect()->route('testimoni.index');
    }
}
