<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProffesion extends Model
{
    use HasFactory;
    protected $table = "sub_subject_proffesion";
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
