<?php

namespace nanofab\cylinders\Models;

use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nf_gas';
	
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
	 * cylinders function.
	 * 
	 * @access public
	 * @return App\Cylinder
	 */
	public function cylinders(){
	
		return $this->hasMany(Cylinder::class);
	
	}
	
	/**
     * path function. Returns path to this resource
     * 
     * @access protected
     * @return String
     */
    public function path(){
    	
    	return route('gases.show', $this);
    }
}
