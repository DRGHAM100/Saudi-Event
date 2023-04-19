<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Attend;
use App\Models\Visitor;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegisteredExport implements FromCollection, WithHeadings
{
    private $day;

    public function __construct(string $day) 
    {
        $this->day = $day;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $attenders = Attend::whereDate('created_at',Carbon::createFromFormat('Y-m-d', $this->day))->pluck('visitor_id');
        return Visitor::select('qrcode','full_name','email')->whereIn('id',$attenders)->get();
    }


    public function headings(): array
    {
        return [
          'QrCode','Name','email',
        ];
    }
}
