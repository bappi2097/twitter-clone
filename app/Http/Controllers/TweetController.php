<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('home', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'body' => 'required|max:255'
        ]);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);
        return redirect('/home');
    }
}
