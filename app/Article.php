<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'published_at',
		'user_id'
    ];
	/**
	 * Additinal fields to treat as carbon instance.
	 * s
	 * @var array
	 */
	protected $dates = ['published_at'];

	/**
	 * Scope queries to articles that have been published.
	 *
	 * @param $query
     */
	public  function scopePublished($query){
		$query->where('published_at','<=',Carbon::now());
	}

	/**
	 * set the format of the published_at attribute.
	 *
	 * @param $date
     */
	public function setPublshedAtAttribute($date){
		$this->attributes['published_at']= Carbon::CreateFormFormat('Y-m-d', $date);
	}


	public function getPublishedAtAttribute($date){
		return  Carbon::parse($date)->format('Y-m-d');
	}

	/**
	 * An article in belongs to an user.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user(){
		return $this->belongsTo('App\User');
	}


	/**
	 * get the tags associated with all articles
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function tags(){
		return $this->belongsToMany('App\Tag');

	}

	/**
	 * Get a list of tag ids associated with the current article
	 *
	 * @return array
     */
	public function getTagListAttribute(){
		return $this->tags->lists('id');
	}
}
