<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Video;

class VideoController extends Controller
{
    public function index() {
        return Inertia::render('Index', [
            'user' => Auth::user(), 
            'videos' => Video::latest()->with('user')->get()
        ]);
    }

    public function create() {
        return Inertia::render('Create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required',
            'thumbnail' => 'required'
        ]);

        $formFields['video'] = $request->file('video')->store('videos', 'public');
        $formFields['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');

        $formFields['user_id'] = Auth::user()->id;

        Video::create($formFields);

        return to_route('home')->with('message', 'success');
    }
}
