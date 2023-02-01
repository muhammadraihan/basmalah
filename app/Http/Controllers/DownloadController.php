<?php

namespace App\Http\Controllers;
use App\Models\Download;
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

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $download = Download::all();
        if (request()->ajax()) {
            $data = Download::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('photo', function ($row){
                    $url = asset('photo');
                    return '<image style="width: 150px; height: 150px;"  src="'.$url.'/'.$row->photo.'" alt="">';
                })
                ->editColumn('link', function($row){
                    return '<a href=' .$row->link. '> Cek Link disini !';
                })
                ->editColumn('tanggal', function ($row) {
                    if ($row->tanggal == null){
                        return Carbon::make(null);
                    }
                    return Carbon::parse($row->tanggal)->translatedFormat('d M Y');
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('download.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('download.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action','photo','link'])
                ->make(true);
        }

        return view('download.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('download.create');
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
            'link' => 'required',
            'tanggal' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $download = new Download();
        $download->judul = $request->judul;
        $download->link = $request->link;
        $download->tanggal = $request->tanggal;

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $download->photo = "$profileImage";
        }
        $download->save();

        toastr()->success('New Download Link Added', 'Success');
        return redirect()->route('download.index');
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
        $download = Download::uuid($id);
        return view('download.edit',compact('download'));
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
            'link' => 'required',
            'tanggal' => 'required',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $download = Download::uuid($id);
        $download->judul = $request->judul;
        $download->link = $request->link;
        $download->tanggal = $request->tanggal;

        if($request->hasFile('photo')){

            // user intends to replace the current image for the category.  
            // delete existing (if set)
        
            if($oldImage = $download->photo) {
        
                unlink(public_path('photo/') . $oldImage);
            }
        
            // save the new image
            $image = $request->file('photo');
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $download->photo = "$profileImage";
        }
        $download->save();

        toastr()->success('Download Link Edited', 'Success');
        return redirect()->route('download.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = Download::uuid($id);
        $photo = public_path('photo/').$download->photo;
        if(file_exists($photo)){
            unlink($photo);
        }
        $download->delete();
        toastr()->success('Download Deleted', 'Success');
        return redirect()->route('download.index');
    }
}
