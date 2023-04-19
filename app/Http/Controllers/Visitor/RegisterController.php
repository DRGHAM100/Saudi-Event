<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Visitor\RegisterRequest;
use Illuminate\Http\Request;
use App\Helper\UploadFile;
use App\Models\Visitor;

class RegisterController extends Controller
{
    use UploadFile;

    public function index()
    {
        return inertia('Welcome',[
            'registration_link' => Settings::get('registration_link'),
            'registration_link_lock_msg' => Settings::get('registration_link_lock_msg'),
        ]);
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request->image,storage_path('app/public/personal_images'));

        $visitor = Visitor::create($data);
        
        return inertia('Success',['code' => $visitor->code]);
    }

    public function badge($code)
    {
        $visitor = Visitor::where('code',$code)->first();
        return inertia('Badge',compact('visitor'));
    }
}
