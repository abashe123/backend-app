<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;



class Patient extends Model
{
    use HasFactory; 

    protected $fillable = [
        'user_id', 
        'name',
        'age',
        'gender',
        'sampletype',
        'clinicalhistory',
        'diagnosis',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     
}
