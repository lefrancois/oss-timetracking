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
        $tracker = Tracker::whereIdentifier($id)->first();
        return view('frontend.tracker', [
            'tracker' => $tracker,
        ]);
    }
}
