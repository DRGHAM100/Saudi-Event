<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Attend;
use Inertia\Inertia;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Home',[
            'registerd_count' => Visitor::count(),
            'attenders' => Attend::get()->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
        ]);
    }

    public function filterChart($day){
        return $day;
    }
}
