<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Brosur;
use App\Models\Home;
use App\Models\Hotel;
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

        return view('pages.home', compact('about', 'brosur', 'home', 'hotel', 'transport', 'paket', 'youtube'));
    }

    public function about()
    {
        $about = About::all();

        return view(('pages.about'), compact('about'));
    }

    public function umrah()
    {
        $paket = Paket::all();

        return view(('pages.umrah'), compact('paket'));
    }

    public function haji()
    {
        $paket = Paket::all();

        return view(('pages.haji'), compact('paket'));
    }
}
