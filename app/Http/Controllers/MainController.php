<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('frontend.index');
    }

    public function tracker(String $id) {
        return view('frontend.tracker', [
            'identifier' => $id,
        ]);
    }
}
