<?php

namespace App\Http\Controllers;

use App\Order;
use App\Post;
use App\Tag;
use App\ClientTestimonial;
use App\WebSite;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recent_post = Post::where('recent', 1)->with('photo')->get();

        $user = Auth::user();
        if (session()->get('website_id') !== null) {
            $website = WebSite::find(session()->get('website_id'));
            $order = Order::create([
                'web_site_id' => $website->id,
                'user_id' => $user->id,
                'description' => $website->description,
                'delivered_at' => Carbon::now(),
                'cost' => $website->cost,
            ]);
            session()->forget('website_id');
            $order->create_client_room($website, $order->id, $user->id);
            return redirect()->route('orders.confirm', ['order' => $order->id]);
        } else {
            return view('home', compact('recent_post'));
        }
    }

    public function aboutUs()
    {

        return view('aboutUs');
    }

    public function recentPosts(){

        $recent_post = Post::where('recent', 1)->with('photo')->get();

        return view('components.home-master', compact('recent_post'));
    }




}