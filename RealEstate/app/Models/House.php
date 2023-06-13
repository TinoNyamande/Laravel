<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = ['type','location','price','email','description','mobile','companyName','fileName','fileName1','fileName2','fileName3'];
}
