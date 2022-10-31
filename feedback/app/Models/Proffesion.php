<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proffesion extends Model
{
    use HasFactory;
    protected $table = "subject_proffesion";
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    function segment()
    {
        return $this->belongsTo('App\Models\SubjectType', 'subject_type_id');
    }
}
