<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Ticket extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = ['id','services_id','user_id','status','active_date'];
    protected $append = ['service_name'];
    protected static function booted()
    {
        static::creating(function($model){
            $model->user_id = Auth::id();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function serviceName($service_id)
    {
        $name =  Service::where('id', $service_id)->first(['name']);
        return $name->name;
    }
    public static function allCookies($cooke_name)
    {
        $items= Cookie::get($cooke_name);
        if($items){
            return unserialize($items);
        }
        return [];
    }
   
}
