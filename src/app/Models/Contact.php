<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'content','first_name','last_name','gender','email','tel','address','building','detail'];

    public function category(){
     return $this->belongTo(category::class);
    }

    public function scopeNameSearch($query,$name)#名前の検索
    {
       return $query->where('name','like','%' . $name . '%');
    }

    public function scopeEmailSearch($query,$email)#メールアドレスの検索
    {
        return $query->where('email','like','%' . $email . '%');
    }

    public function scopeGenderSearch($query,$gender)#性別の検索
    {
        return $query->where('gender','like','%' . $gender . '%');
    }

    public function scopeCategorySearch($query,$category)#お問い合わせの種類
    {
        return $query->where('category','like','%' . $category . '%');
    }

    public function scopeDateSearch($query,$startDate,$endDate)# 日付の検索
    {
        return $query->whereBetween('created_at',[$startDate,$endDate]);
    }

}
    /*public static $rules = array(
        'first_name'=>'required',
        'last_name'=>'required',
        'gender'=>'required',
        'email'=>'required',
        'tel'=>'required',
        'address'=>'required',
        'building'=>'nullable',
        'detail'=>'required|max:120'
    );*/



