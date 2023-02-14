<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Video;
use App\Models\View;
use App\Models\Like;

class VideoController extends Controller
{
    public function index() {
        return Inertia::render('Index', [
            'user' => Auth::user(), 
            'videos' => Video::latest()->with(['user', 'views', 'likes'])->get()
        ]);
    }

    public function create() {
        return Inertia::render('Create', [
            'user' => Auth::user()
        ]);
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

        return to_route('home');
    }

    

    public function show(Video $video) {

        $views = View::all();
        $isEmpty = true;
        foreach($views as $view) {
            if ($view['video_id'] == $video->id && $view['user_id'] == Auth::user()->id) {
                $isEmpty = false;
            }
        }
    
        if ($isEmpty) {
            $view = View::create([
                'user_id' => Auth::user()->id,
                'video_id' => $video->id
            ]);
        }

        return Inertia::render('Show', [
            'video' => $video->with(['user', 'views', 'likes'])->find($video->id),
            'user' => Auth::user(), 
        ]); 
    }


    public function like(Request $request) {

        $video_id = $request->input('video_id');

        $likes = Like::all();
        $isEmpty = true;
        foreach($likes as $like) {
            if ($like['video_id'] == $video_id && $like['user_id'] == Auth::user()->id) {
                $isEmpty = false;
            }
        }
        
        if ($isEmpty) {
            Like::create([
                'video_id' => $video_id,
                'user_id' => Auth::user()->id
            ]);
        }
    
        return redirect('/videos/' . $video_id);
    }
}
