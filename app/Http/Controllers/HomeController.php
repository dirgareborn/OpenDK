<?php

namespace App\Http\Controllers;

use function captcha_img;
use Illuminate\Http\Response;
use function response;
use function view;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $data['page_title'] = 'Dashboard';
        $data['page_description'] = 'Selamat Datang di openDK';

        return view('home')->with($data);
    }

    public function refresh_captcha()
    {
        return response()->json(['captcha' => captcha_img('mini')]);
    }
}
