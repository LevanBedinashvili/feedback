<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = "subjects";
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public static function rules()
    {
       return [
         'title' => 'required|string|max:255',
         'text' => 'required',
         'address' => 'sometimes|required|string|max:255',
         'segment' => 'required|int|max:111',
         'category' => 'required|int',
         'city' => 'required|int|max:111',
         'fname' => 'required|string|max:255',
         'lname' => 'sometimes|string|max:255',
         'position' => 'sometimes|required|string|max:255',
         'code' => 'sometimes|required|int',
         'web' => 'sometimes|required|string|max:255',
         'image' => 'required',

       ];
    }

    function segment()
    {
        return $this->belongsTo('App\Models\SubjectType', 'segment_id');
    }

    function category()
    {
        return $this->belongsTo('App\Models\Proffesion', 'category_id');
    }

    function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    function userka()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


}
