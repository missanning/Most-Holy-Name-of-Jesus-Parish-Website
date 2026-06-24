<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $events = DB::table('events')->orderBy('id')->get();
        return view('pages.home', compact('events'));
    }

    public function news()
    {
        $news   = DB::table('news')->orderByDesc('id')->get();
        $events = DB::table('events')->orderBy('id')->get();
        return view('pages.news', compact('news', 'events'));
    }

    public function massSchedule()
    {
        $weekly  = DB::table('mass_schedule')->where('category', 'weekly')->orderBy('id')->get();
        $holyday = DB::table('mass_schedule')->where('category', 'holyday')->orderBy('id')->get();
        $office  = DB::table('mass_schedule')->where('category', 'office')->orderBy('id')->get();
        return view('pages.mass-schedule', compact('weekly', 'holyday', 'office'));
    }

    public function sacraments()
    {
        $sacraments = DB::table('sacraments')->orderBy('sort_order')->orderBy('id')->get();
        return view('pages.sacraments', compact('sacraments'));
    }

    public function ministries()
    {
        return view('pages.ministries');
    }

    public function gallery()
    {
        $photos = DB::table('gallery')->orderBy('sort_order')->orderBy('id')->get();
        return view('pages.gallery', compact('photos'));
    }

    public function resources()
    {
        $documents = DB::table('resources')->where('category', 'document')->orderBy('sort_order')->get();
        $faith     = DB::table('resources')->where('category', 'faith')->orderBy('sort_order')->get();
        $devotions = DB::table('resources')->where('category', 'devotion')->orderBy('sort_order')->get();
        return view('pages.resources', compact('documents', 'faith', 'devotions'));
    }

    public function about()    { return view('pages.about'); }
    public function donate()   { return view('pages.donate'); }
    public function contact()  { return view('pages.contact'); }
    public function flipbook() { return view('pages.flipbook'); }

    public function sendContact(\Illuminate\Http\Request $request)
    {
        $request->validate(['name'=>'required','email'=>'required|email','message'=>'required']);
        return redirect('/contact')->with('success', 'Your message has been sent. We will get back to you soon.');
    }
}
