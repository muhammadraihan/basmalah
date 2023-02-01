<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Transport;
use App\Models\Hotel;
use App\Models\Kategori;
use App\Models\NamaPaket;
use Carbon\Carbon;

use Auth;
use DataTables;
use DB;
use File;
use Hash;
use Image;
use Response;
use URL;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::all();
        if (request()->ajax()) {
            $data = Paket::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('harga', function($row){
                    return $row->harga ? 'Rp.'.' '.number_format($row->harga,2) : '';
                })
                ->editColumn('transportasi', function($row){
                    return $row->Transport->name;
                })
                ->editColumn('kategori', function($row){
                    return $row->Kategori->name;
                })
                ->editColumn('nama', function($row){
                    return $row->NamaPaket->name;
                })
                ->editColumn('hotel', function($row){
                    return $row->Hotel->name;
                })
                ->editColumn('tanggal', function ($row) {
                    if ($row->tanggal == null){
                        return Carbon::make(null);
                    }
                    return Carbon::parse($row->tanggal)->translatedFormat('d M Y');
                })
                ->editColumn('photo', function ($row){
                    $url = asset('photo');
                    return '<image style="width: 150px; height: 150px;"  src="'.$url.'/'.$row->photo.'" alt="">';
                })
                ->editColumn('status', function($row){
                    switch ($row->status) {
                        case '0' :
                            return '<span class="badge badge-primary">Tersedia</span>';
                            break;
                        case '1' :
                            return '<span class="badge badge-danger">Full Booked</span>';
                            break;
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('paket.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('paket.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action','status', 'photo'])
                ->make(true);
        }

        return view('paket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $transport = Transport::all()->pluck('name', 'uuid');
        $hotel = Hotel::all()->pluck('name', 'uuid');
        $kategori = Kategori::all()->pluck('name', 'uuid');
        return view('paket.create',compact('transport', 'hotel','kategori'));
    }

    public function namaPaket(Request $request){
        if(request()->ajax()){
            $namapaket = NamaPaket::all()->where('kategori', request()->get('kategori'))->pluck('name', 'uuid')->all();
            return response()->json($namapaket);
        }
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
            'kategori' => 'required',
            'nama' => 'required',
            'include' => 'required',
            'exclude' => 'required',
            'harga' => 'required',
            'transportasi' => 'required',
            'hotel' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'photo' => 'required',
            'detail' => 'required'
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $harga = $request->harga;
        $formattedharga = str_replace(',', '', $harga);


        $paket = new Paket();
        $paket->kategori = $request->kategori;
        $paket->nama = $request->nama;
        $paket->tanggal = $request->tanggal;
        $paket->include = $request->include;
        $paket->exclude = $request->exclude; 
        $paket->harga = $formattedharga;
        $paket->transportasi = $request->transportasi;
        $paket->hotel = $request->hotel;
        $paket->tanggal = $request->tanggal;
        $paket->hari = $request->hari;
        $paket->photo = $request->photo;
        $paket->detail = $request->detail;
        $paket->status = 0;

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $paket->photo = "$profileImage";
        }
        $paket->save();

        toastr()->success('New Paket Added', 'Success');
        return redirect()->route('paket.index');
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
        $transport = Transport::all()->pluck('name', 'uuid');
        $hotel = Hotel::all()->pluck('name', 'uuid');
        $kategori = Kategori::all()->pluck('name', 'uuid');
        $uuid_kategori = Kategori::all();
        $paket = Paket::uuid($id);
        $namapaket = NamaPaket::all()->pluck('name','uuid');
        // dd($namapaket);
        return view('paket.edit',compact('transport', 'hotel', 'paket','kategori','namapaket'));
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
            'kategori' => 'required',
            'nama' => 'required',
            'include' => 'required',
            'exclude' => 'required',
            'harga' => 'required',
            'transportasi' => 'required',
            'hotel' => 'required',
            'tanggal' => 'required',
            'hari' => 'required',
            'photo' => 'required',
            'detail' => 'required'
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $harga = $request->harga;
        $formattedharga = str_replace(',', '', $harga);


        $paket = Paket::uuid($id);
        $paket->kategori = $request->kategori;
        $paket->nama = $request->nama;
        $paket->tanggal = $request->tanggal;
        $paket->include = $request->include;
        $paket->exclude = $request->exclude; 
        $paket->harga = $formattedharga;
        $paket->transportasi = $request->transportasi;
        $paket->hotel = $request->hotel;
        $paket->tanggal = $request->tanggal;
        $paket->hari = $request->hari;
        $paket->status = $request->status;
        $paket->photo = $request->photo;
        $paket->detail = $request->detail;
        
        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $paket->photo = "$profileImage";
        }
        $paket->save();

        toastr()->success('Paket Edited', 'Success');
        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::uuid($id);
        $file = public_path('photo/').$paket->photo;
        if(file_exists($file)){
            unlink($file);
        }
        $paket->delete();

        toastr()->success('Paket Deleted', 'Success');
        return redirect()->route('paket.index');
    }
}
