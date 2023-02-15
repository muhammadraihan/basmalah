<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Brosur;
use App\Models\Download;
use App\Models\Galeri;
use App\Models\Home;
use App\Models\Hotel;
use App\Models\Kategori;
use App\Models\Transport;
use App\Models\Paket;
use App\Models\Syarat;
use App\Models\Youtube;
use App\Models\Testimoni;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all()->first();
        $brosur = Brosur::all();
        $home = Home::all();
        $hotel = Hotel::all();
        $transport = Transport::all();
        $paket = Paket::all();
        $youtube = Youtube::all()->first();
        $kategori = Kategori::all();
        $testimoni = Testimoni::all();

        return view('pages.home', compact('about', 'brosur', 'home', 'hotel', 'transport',
        'paket', 'youtube', 'kategori', 'testimoni'));
    }

    public function about()
    {
        $about = About::all()->first();
        $kategori = Kategori::all();

        return view(('pages.about'), compact('about', 'kategori'));
    }

    public function syarat()
    {
        $syarat = Syarat::all();
        $kategori = Kategori::all();

        return view(('pages.syarat'), compact('syarat', 'kategori'));
    }

    public function detailPaket($id)
    {
        $paket = Paket::uuid($id);
        $detilPaket = Paket::all();
        $kategori = Kategori::all();
        
        return view('pages.detail_paket',compact('paket', 'detilPaket', 'kategori'));
    }

    public function contact()
    {
        $kategori = Kategori::all();
        return view(('pages.contact'), compact('kategori'));
    }

    public function gallery()
    {
        $gallery = Galeri::all();
        $kategori = Kategori::all();

        return view(('pages.gallery'), compact('gallery', 'kategori'));
    }

    public function download()
    {
        $download = Download::all();
        $kategori = Kategori::all();

        return view(('pages.download'), compact('download', 'kategori'));
    }

    public function umrah($id)
    {
        $paket = Kategori::uuid($id);
        $result = Paket::all()->where('kategori', 'like', $paket->uuid);
        $kategori = Kategori::all();

        return view(('pages.paket'), compact('paket', 'result', 'kategori'));
    }

    public function navbar($id)
    {
        $paket = Kategori::uuid($id);
        $kategori = Kategori::all();
        $result = Paket::all()->where('kategori', 'like', $paket->uuid);

        return view(('includes.navbar'), compact('paket', 'result', 'kategori'));
    }
}
