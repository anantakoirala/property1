<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyGallery extends Model
{
    protected $fillable = ['property_id','filename'];
}
