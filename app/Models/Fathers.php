<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fathers extends Model
{
    use HasFactory;

    protected $fillable = [
        'grand_father_id',
        'name',
        'phone',
        'email',
        'created_by'
    ];

    public function grandFather(){
        return $this->belongsTo(GrandFather::class,'grand_father_id');
    }
}
