<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LabQuotes extends Model {
	protected $table = 'mobhe_lab_quotes';
	// protected $fillable = ['name','lat', 'lng'];
	protected $fillable = ['labId', 'testId', 'costAtHome', 'costAtLab'];
}
