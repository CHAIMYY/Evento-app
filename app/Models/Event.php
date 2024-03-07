<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
       'title',
       'description',
       'date',
       'location',
       'places',
       'mode',
       'statut',
       'categorie_id',
       'user_id',
    ];
}
