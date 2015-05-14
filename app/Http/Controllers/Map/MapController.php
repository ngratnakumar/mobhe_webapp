<?php namespace App\Http\Controllers\Map;

require 'autoload.php';
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseFile;
use Parse\ParseQuery;
use Parse\ParseGeoPoint;
use App\Map;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Input;
use View;
use DB;
use XMLWriter;

class MapController extends Controller {

	/**
	 * Show the application dashboard to the map-user.
	 *
	 * @return Response
	 */
	public function __construct(){
		ParseClient::initialize('jmFlOj75W1du11VgOec9a311oirARUoQmR2D23V8', 'IeFEhY0M5JNSs46BmPzrHJHqkERNG4plvNoBXgW6', 'kq3scNi17gZyaYdxUxm5SoXvBwZ6OtirmtBD0WBl');
		// ParseClient::initialize('EU9daLseC5u7qOT8dFGOJrD4jHTc38y5Cz7O1XqF', 'PbbeJ3BMKZOSY5Hk86lLFjx442ppPI1ZiXdQcz5m', 'aMfezVMHz99hSxZfgxU0gMOkSqMqhBp9BGboH2st');
	}

	public function addmap()
	{
		$addLab = new Map;

		$facilities = array();
		$lat = (double) Input::get('lat'); $lng = (double) Input::get('lng'); $point = new ParseGeoPoint($lat, $lng);
		$fac = Input::get('facilities');
		array_push($facilities, $fac);

		$saveMapData = new ParseObject("Labs");

		$saveMapData->set("name", Input::get('name'));
		$saveMapData->set("addressLine1", Input::get('addressLine1'));
		$saveMapData->set("addressLine2", Input::get('addressLine2'));
		$saveMapData->set("addressLine3", Input::get('addressLine3'));
		$saveMapData->set("location", $point);
		$saveMapData->set("phone", Input::get('phone'));
		$saveMapData->set("openTimings", Input::get('openTimings'));
		$saveMapData->setArray("facilities", $facilities);

		$addLab->name = Input::get('name');
		$addLab->addressLine1 = Input::get('addressLine1');
		$addLab->addressLine2 = Input::get('addressLine2');
		$addLab->addressLine3 = Input::get('addressLine3');
		$addLab->type = Input::get('type');
		$addLab->lat = $lat;
		$addLab->lng = $lng;
		$addLab->phone = Input::get('phone');
		$addLab->openTimings = Input::get('openTimings');
		$addLab->facilities = Input::get('facilities');

		try {
	      $saveMapData->save();
	      $addLab->objectId = (string) $saveMapData->getObjectId();
	      $addLab->save();
		  echo 'New object created with objectId: ' . $saveMapData->getObjectId();
		} catch (ParseException $ex) {  
		  // Execute any logic that should take place if the save fails.
		  // error is a ParseException object with an error code and message.
		  echo 'Failed to create new object, with error message: ' + $ex->getMessage();
		}

		return redirect('map/view');
	}

	public function viewForm()
	{
		return View::make('maps.addmap')
		->with("title", "Add Lab Map");
	}

	public function viewData()
	{
	   	$markers = DB::table('mobhe_maps')
        ->select('mobhe_maps.*')
        ->get();

	    $xml = new XMLWriter();
	    $xml->openMemory();
	    $xml->startDocument();
	    $xml->startElement('markers');
	    foreach($markers as $marker) {
	        $xml->startElement('marker');
	        $xml->writeAttribute('name', $marker->name);
	        $xml->writeAttribute('type', $marker->type);
	        $xml->writeAttribute('facilities', $marker->facilities);
	        $xml->writeAttribute('addressLine1', $marker->addressLine1);
	        $xml->writeAttribute('addressLine2', $marker->addressLine2);
	        $xml->writeAttribute('addressLine3', $marker->addressLine3);
	        $xml->writeAttribute('openTimings', $marker->openTimings);
	        $xml->writeAttribute('lat', $marker->lat);
	        $xml->writeAttribute('lng', $marker->lng);
	        $xml->writeAttribute('phone', $marker->phone);
	        $xml->endElement();
	    }

	    $xml->endElement();
	    $xml->endDocument();

	    $content = $xml->outputMemory();
	    $xml = null;

	    return response($content)->header('Content-Type', 'text/xml');
    }

    public function viewMaps()
    {
    	$markers = DB::table('mobhe_maps')
        ->select('mobhe_maps.*')
        ->get();
        $labs_tests = DB::table('mobhe_lab_quotes')
        ->select('mobhe_lab_quotes.*')
        ->get();
        $tests = DB::table('mobhe_labtests')
        ->select('mobhe_labtests.*')
        ->get();
		return View::make('maps.viewmaps')
		->with("requests", $markers)
		->with("tests", $tests)
        ->with("labrequests", $labs_tests)
		->with("title", "Mobhe Lab Maps");    	
    }
	
}
