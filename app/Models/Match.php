<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    protected $table = "matches";
    protected $guarded = [];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function league(){
        return  $this->belongsTo(League::class, 'league_id');
    }
    public function team1(){
        return  $this->belongsTo(Team::class, 'team_1');
    }
    public function team2(){
        return  $this->belongsTo(Team::class, 'team_2');
    }
//    public function teams(){
//        return  $this->belongsToMany(Team::class, 'teams_matches', 'match_id', 'team_id');
//    }
}
