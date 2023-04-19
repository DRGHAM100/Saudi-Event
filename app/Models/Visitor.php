<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Visitor extends Model
{
   use HasFactory;
   protected $guarded = [];

 
   public static function boot()
   {
      parent::boot();
      static::creating(function($visitor)
      {
         $name = explode(' ', $visitor->full_name);
         $visitor->first_name = $name[0];
         $visitor->last_name = isset($name[1]) ? $name[1] : '-';
         $visitor->qrcode = rand(100000,999999);
         $visitor->code = Str::random(12);
      });
   }

}
