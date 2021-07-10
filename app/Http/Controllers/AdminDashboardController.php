<?php

namespace App\Http\Controllers;

use App\ClientTestimonial;
use App\Contact;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\AnalyticsFacade;
use Spatie\Analytics\Period;

class AdminDashboardController extends Controller
{

    public function index()
    {
    
        return view('admin.index');
    }
}