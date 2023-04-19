<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateRegistered;
use Illuminate\Http\Request;
use App\Helper\UploadFile;
use App\Models\Visitor;
use Inertia\Inertia;

class RegisteredController extends Controller
{
    use UploadFile;

    public function index()
    {
        return Inertia::render('Admin/Registered/Index',[
            'registered' => Visitor::get()->toArray()
        ]);
    }

    public function edit(Visitor $registered)
    {
        return Inertia::render('Admin/Registered/Edit',[
            'registered' => $registered
        ]);
    }

    public function update(UpdateRegistered $request,Visitor $registered)
    {
        $data = $request->validated();
        
        if(isset($request->image)) 
        $data['image'] = $this->uploadFile($request->image,storage_path('app/public/personal_images'));
        else
        $data['image'] = $registered->image;

        $registered->update($data);

        return redirect()->route('registered.index');
    }

    public function destory(Visitor $registered)
    {
        $registered->delete();
        return redirect()->route('registered.index');
    }
}
