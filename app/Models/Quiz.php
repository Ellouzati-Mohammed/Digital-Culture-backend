<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable =[
        'question',
        'activity_id'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class); // Héritage
    }
}
