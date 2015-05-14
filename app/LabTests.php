<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LabTests extends Model {
	protected $table = 'mobhe_labtests';
	// protected $fillable = ['name','lat', 'lng'];
	protected $fillable = ['test_name', 'formal_name', 'alias_name', 'objectId'];
}
