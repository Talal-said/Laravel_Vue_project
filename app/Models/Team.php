<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = "teams";
    protected $guarded = [];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function league(){
        return  $this->belongsTo(League::class, 'league_id');
    }

    public function team_1_match(){
        return  $this->hasMany(Match::class, 'team_1');
    }

    public function team_2_match(){
        return  $this->hasMany(Match::class, 'team_2');
    }
}
