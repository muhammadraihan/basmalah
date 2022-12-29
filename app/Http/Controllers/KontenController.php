<?php

namespace App\Http\Controllers;
use App\Models\Konten;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use DB;
use File;
use Hash;
use Image;
use Response;
use URL;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konten = Konten::all();
        if (request()->ajax()) {
            $data = Konten::get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('photo', function ($row){
                    $url = asset('photo');
                    return '<image style="width: 150px; height: 150px;"  src="'.$url.'/'.$row->photo.'" alt="">';
                })
                ->editColumn('link', function($row){
                    return '<a href=' .$row->link. '> Cek Link disini !';
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a class="btn btn-success btn-sm btn-icon waves-effect waves-themed" href="' . route('konten.edit', $row->uuid) . '"><i class="fal fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm btn-icon waves-effect waves-themed delete-btn" data-url="' . URL::route('konten.destroy', $row->uuid) . '" data-id="' . $row->uuid . '" data-token="' . csrf_token() . '" data-toggle="modal" data-target="#modal-delete"><i class="fal fa-trash-alt"></i></a>';
                })
                ->removeColumn('id')
                ->removeColumn('uuid')
                ->rawColumns(['action','photo','link'])
                ->make(true);
        }

        return view('konten.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konten.create');
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
            'detail' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $konten = new Konten();
        $konten->judul = $request->judul;
        $konten->link = $request->link;
        $konten->detail = $request->detail;

        if ($image = $request->file('photo')) {
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $konten->photo = "$profileImage";
        }
        $konten->save();

        toastr()->success('New Konten Added', 'Success');
        return redirect()->route('konten.index');
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
        $konten = Konten::uuid($id);
        return view('konten.edit',compact('konten'));
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
            'detail' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $messages = [
            '*.required' => 'Field tidak boleh kosong !',
            '*.min' => 'Nama tidak boleh kurang dari 2 karakter !',
        ];

        $this->validate($request, $rules, $messages);
        // dd($request->photo);

        $konten = Konten::uuid($id);
        $konten->judul = $request->judul;
        $konten->link = $request->link;
        $konten->detail = $request->detail;

        if($request->hasFile('photo')){

            // user intends to replace the current image for the category.  
            // delete existing (if set)
        
            if($oldImage = $konten->photo) {
        
                unlink(public_path('photo/') . $oldImage);
            }
        
            // save the new image
            $image = $request->file('photo');
            $destinationPath = 'photo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $konten->photo = "$profileImage";
        }
        $konten->save();

        toastr()->success('Konten Edited', 'Success');
        return redirect()->route('konten.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $konten = Konten::uuid($id);
        $photo = public_path('photo/').$hotel->photo;
        if(file_exists($photo)){
            unlink($photo);
        }
        $konten->delete();
        toastr()->success('Konten Deleted', 'Success');
        return redirecr()->route('konten.index');
    }
}
