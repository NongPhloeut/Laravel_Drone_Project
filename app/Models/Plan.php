<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'date_time',
        'spray_density',
        'plan_description',
        'user_id',
        'map_id',
        'farm_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function store($request , $id = null){
       $plans = $request->only([
            'plan_name',
            'date_time',
            'spray_density',
            'plan_description',
            'user_id',
            'map_id',
            'farm_id',
       ]);

       $plans = self::updateOrCreate(['id'=>$id],$plans);
       return $plans;
    }

    // plan belongs to user
    public function user(){
        return $this->belongsTo(User::class);
    } 
    

    public function map(){
        return $this->belongsTo(Map::class);
    }

    //plan has many locations
    public function drones():hasMany{
        return $this->hasMany(Drone::class);
    }
}

