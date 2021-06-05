<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;
    protected $table = "leagues";
    protected $guarded = [];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function teams(){
        return  $this->hasMany(Team::class, 'league_id');
    }

    public function matches(){
        return  $this->hasMany(Match::class, 'league_id');
    }
}
