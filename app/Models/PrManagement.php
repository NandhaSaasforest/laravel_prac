<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrManagement extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'quantity'];
}
