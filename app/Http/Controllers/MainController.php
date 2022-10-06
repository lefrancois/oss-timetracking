<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Illuminate\Http\Request;
use Ulid\Ulid;

class MainController extends Controller
{
    public function index() {
        return view('frontend.index');
    }

    public function create() {
        $tracker = Tracker::create([
            'identifier' => Ulid::generate(true),
        ]);
        return redirect()->route('tracker', ['id' => $tracker->identifier]);
    }

    public function tracker(String $id) {
        return view('frontend.tracker', [
            'identifier' => $id,
        ]);
    }
}
