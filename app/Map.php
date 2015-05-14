<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model {
	protected $table = 'mobhe_maps';
	// protected $fillable = ['name','lat', 'lng'];
	protected $fillable = ['name', 'type', 'objectId', 'phone', 'lat', 'lng', 'addressLine1', 'addressLine2', 'addressLine3', 'facilities', 'openTimings'];
}
