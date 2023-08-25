<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
    ];

    public function scopeNameSearch($query,$name_keyword){
        if (!empty($name_keyword)){
            $query->where('fullname','like','%' . $name_keyword . '%');
        }
    }
    public function scopeGenderSearch($query,$gender_keyword){
        if ($gender_keyword != 0){
            $query->where('gender',$gender_keyword);
        }
    }
    public function scopeDateSearch($query,$start_date_keyword,$end_date_keyword){
        if(!empty($start_date_keyword)){
            if (!empty($end_date_keyword)) {
                $query->whereBetween('created_at',[$start_date_keyword,$end_date_keyword]);
            }else{
                $query->where('created_at','>=',$start_date_keyword);
            }
        }elseif (!empty($end_date_keyword)){
            $query->where('created_at','<=',$end_date_keyword);
        }
    }

    public function scopeEmailSearch($query,$email_keyword){
        if (!empty($email_keyword)) {
            $query->where('email', 'like', '%' . $email_keyword . '%');
        }
    }
}
