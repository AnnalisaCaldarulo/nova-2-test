<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use App\Models\NewsletterUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth')->except('homepage');
    }

    public function homepage()
    {
        $articles = Article::where('is_published', true)->orderBy('published_at', 'DESC')->take(3)->get();

        return view('welcome', compact('articles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        if (Auth::user()->email != $request->email) {
            return redirect()->route('homepage')->with('errorMessage', 'Utilizza la stessa mail con cui ti sei iscritt*!');

        } else {
            // NewsletterUser::create([
            //     'email' => $request->email
            // ]);
            $user =Auth::user();
            $user->update([
                $user->subscriber = true
            ]);
            Mail::to($user->email)->send(new Newsletter($user->name, 'Benvenut* nella newsletter!', 'Ti sei correttamente iscritto alla newsletter'));
            return redirect()->route('homepage')->with('successMessage', 'Ti sei iscritt* alla newsletter');
        }
    }
}
