<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
//    protected $fillable = ['name', 'email', 'active'];

    protected $guarded = [];  //gurded is much better then $fillable

    protected $attributes = [
      'active' => 1
    ];

    public function getActiveAttribute($attribute){

        return $this->activeOptions()[$attribute];

//        return [
//          '0' => 'Active',
//          '1' => 'In-Active'
//        ][$attribute];
    }

    public function scopeActive($query){
        return $query->where('active', 1);
    }
    public function scopeInActive($query) {
        return $query->where('active', 0);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function activeOptions(){
        return [
            '0' => 'In-Active',
            '1' => 'Active',
            '2' => 'In-Progress'
        ];
    }
}
