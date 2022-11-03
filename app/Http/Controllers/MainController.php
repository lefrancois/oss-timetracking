<?php

namespace App\Http\Controllers;

use App\Models\Tracker;
use Ulid\Ulid;

class MainController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function legal()
    {
        return view('frontend.legal');
    }

    public function privacy()
    {
        return view('frontend.privacy-policy');
    }

    public function create()
    {
        $tracker = Tracker::create([
            'identifier' => Ulid::generate(true),
        ]);

        return redirect()->route('tracker', ['id' => $tracker->identifier]);
    }

    public function tracker(string $id)
    {
        if (Tracker::where('identifier', $id)->count()) {
            return view('frontend.tracker', [
                'identifier' => $id,
            ]);
        } else {
            return redirect()->route('index');
        }
    }
}
