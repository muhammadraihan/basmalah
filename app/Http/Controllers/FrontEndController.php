<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Brosur;
use App\Models\Home;
use App\Models\Hotel;
use App\Models\Kategori;
use App\Models\Transport;
use App\Models\Paket;
use App\Models\Youtube;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all();
        $brosur = Brosur::all();
        $home = Home::all();
        $hotel = Hotel::all();
        $transport = Transport::all();
        $paket = Paket::all();
        $youtube = Youtube::all();
        $kategori = Kategori::all();

        return view('pages.home', compact('about', 'brosur', 'home', 'hotel', 'transport', 'paket', 'youtube', 'kategori'));
    }

    public function about()
    {
        $about = About::all();

        return view(('pages.about'), compact('about'));
    }

    public function contact()
    {
        return view(('pages.contact'));
    }

    public function umrah($id)
    {
        $paket = Kategori::uuid($id);
        $result = Paket::all()->where('kategori', 'like', $paket->uuid);

        return view(('pages.paket'), compact('paket', 'result'));
    }

    public function navbar($id)
    {
        $paket = Kategori::uuid($id);
        $result = Paket::all()->where('kategori', 'like', $paket->uuid);

        return view(('includes.navbar'), compact('paket', 'result'));
    }
}
