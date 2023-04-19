<?php

namespace App\Http\Controllers\Admin;

use Rawilk\Settings\Facades\Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        
        return Inertia::render('Admin/Settings/Index',[
            'registration_link' => Settings::get('registration_link'),
            'registration_link_lock_msg' => Settings::get('registration_link_lock_msg'),
        ]);
    }

    public function store(Request $request)
    {
        Settings::set('registration_link',($request->registration_link) ? true : false);
        Settings::set('registration_link_lock_msg',$request->registration_link_lock_msg);

        return redirect()->route('settings.index');
    }
}
