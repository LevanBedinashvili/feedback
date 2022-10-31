<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    public static function rules()
    {
       return [
         'reciver_email' => 'required|string|max:255',
         'title' => 'required|string|max:255',
         'text' => 'required|string|max:255',
       ];
    }

    function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    function reciver()
    {
        return $this->belongsTo('App\Models\User', 'reciver_id');
    }
}
