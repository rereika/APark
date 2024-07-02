<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Create;

class HomeController extends Controller
{
    public function index()
    {

    return view('APark.home');
    }

    public function selectTheme(){
        return view('APark.select_theme');
    }

    public function createRadarChart(){
        return view('APark.create_radar_chart');
    }

}
