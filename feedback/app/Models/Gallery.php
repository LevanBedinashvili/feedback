<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = "mygallery";
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
