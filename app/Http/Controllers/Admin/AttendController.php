<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\RegisteredExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Visitor;
use App\Models\Attend;
use Inertia\Inertia;
use Carbon\Carbon;


class AttendController extends Controller
{

    private function checkIfAttend($id)
    {
       $check =  Attend::where('visitor_id',$id)->whereDate('created_at', Carbon::today())->first();

       if(!$check) return true;

       return false;
    }

    public function storeByQrcodeView($type)
    {
        return Inertia::render('Admin/Attenders/Store',[
            'print_type' => $type
        ]);
    }

    public function storeByQrcode(Request $request)
    {
        $registered = Visitor::where('qrcode',$request->qrcode)->first();

        if(!$registered) 
        {
            return response()->json(['msg' => 'هذا الرقم غير موجود','registered' => ''], Response::HTTP_OK);
        }
        
        if($this->checkIfAttend($registered->id))
            Attend::create(['visitor_id' => $registered->id]);

        return response()->json(['msg' => $registered->full_name,'registered' => $registered], Response::HTTP_CREATED);
    }

    public function store(Visitor $registered)
    {
        if($this->checkIfAttend($registered->id)) 
        Attend::create(['visitor_id' => $registered->id]);

        return Inertia::render('Admin/Badge',[
            'registered' => $registered
        ]);

    }

    public function attendersPerDay($day)
    {
        $attenders = Attend::whereDate('created_at',Carbon::createFromFormat('Y-m-d', $day))->pluck('visitor_id');

        return Inertia::render('Admin/Attenders/Index',[
            'registered' => Visitor::whereIn('id',$attenders)->get()->toArray(),
            'day' => $day
        ]);
    }

    public function exportAttendersPerDay($day)
    {
        return Excel::download(new RegisteredExport($day), $day.'.xlsx');
    }

    public function destroy(Visitor $registered)
    {
        Attend::where('visitor_id',$registered->id)->delete();
        return redirect()->back();
    }
}
