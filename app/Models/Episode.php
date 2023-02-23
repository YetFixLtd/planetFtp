<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = [
        'tvSeriesId',
        'seasonId',
        'episodeTitle',
        'episodeDescription',
        'episodeFile',
        'episodeUrl',
        'rating',
        'year',
        'publicationStatus'
    ];
}
