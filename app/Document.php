<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable=['name'];

    public static function boot(){
        parent::boot();

    }

    public function adjustments(){
        return $this->belongsToMany(User::class,'adjustments')
            ->withTimestamps()
            ->withPivot('identifier')
            ->latest('pivot_updated_at');
    }
}
