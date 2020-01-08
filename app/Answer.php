<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {
    
    protected $fillable = ['title','body'];
	protected $dates = ['created_at'];
	
    public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function getBodyHtmlAttribute(){
    	return \Parsedown::instance()->text($this->body);
    }

    //dateformat
     public function getCreatedDateAttribute(){
    	return $this->created_at->diffForHumans();
    }

    public static function boot(){
    	parent::boot();

    	static::created(function ($answer){
    		$answer->question->increment('answers_count');
    		$answer->question->save();
    	});
    }	
}