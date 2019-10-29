<?php

namespace nanofab\cylinders\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Cylinder extends Model
{
	
	use HasSlug;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nf_cylinders';
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
	/**
	 * guarded
	 * 
	 * (default value: ['id', 'created_at', 'updated_at'])
	 * 
	 * @var string
	 * @access protected
	 */
	protected $guarded = ['id', 'created_at', 'updated_at'];
	
	
    /**
     * gas function.
     * 
     * @access public
     * @return App\Gas 
     */
    public function gas(){
    
    	return $this->belongsTo(Gas::class);
    
    }
    
    
    /**
     * path function. Returns path to this resource
     * 
     * @access protected
     * @return String
     */
    public function path(){
    	
    	return route('cylinders.show', $this);
    }	
}
