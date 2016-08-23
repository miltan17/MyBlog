<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable=[
      'name'
    ];

    public  function scopePresent($query,$tag){
		$query->where('id',$tag);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(){
        return $this->belongsToMany('App\Article')->withTimestamps();
    }
}
