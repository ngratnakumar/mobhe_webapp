<?php namespace App\Http\Controllers\Lab;
require 'autoload.php';
use App\Http\Controllers\Controller;
use App\LabQuotes;
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseFile;
use Parse\ParseQuery;
use DB;
use View;
use Redirect;
use Request;
use Input;
use Config;
use Auth;
use App\LabTests;
use FormFaced;

class LabController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Lab-Tests Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "Lab-Tests page" for the application and
	| is configured to only allow admins.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
        ParseClient::initialize('jmFlOj75W1du11VgOec9a311oirARUoQmR2D23V8', 'IeFEhY0M5JNSs46BmPzrHJHqkERNG4plvNoBXgW6', 'kq3scNi17gZyaYdxUxm5SoXvBwZ6OtirmtBD0WBl');
    	// ParseClient::initialize('EU9daLseC5u7qOT8dFGOJrD4jHTc38y5Cz7O1XqF', 'PbbeJ3BMKZOSY5Hk86lLFjx442ppPI1ZiXdQcz5m', 'aMfezVMHz99hSxZfgxU0gMOkSqMqhBp9BGboH2st');
	}

	/**
	 * Show the application welcome screen to the lab-user.
	 *
	 * @return Response
	 */
	public function addTest()
	{
        $addTest = new LabTests;
        $addTest->test_name   = Input::get('test_name');
        $addTest->alias_name  = Input::get('alias_name');

        $saveLabTestData = new ParseObject("LabTests");
        $saveLabTestData->add("alias_name", explode(',', Input::get('alias_name')));
        $saveLabTestData->set("name", Input::get('test_name'));

        try {
          $saveLabTestData->save();
          $addTest->objectId = $saveLabTestData->getObjectId();
          $addTest->save();
          echo 'New object created with objectId: ' . $saveLabTestData->getObjectId();
        } catch (ParseException $ex) {  
          // Execute any logic that should take place if the save fails.
          // error is a ParseException object with an error code and message.
          echo 'Failed to create new object, with error message: ' + $ex->getMessage();
        }

        return redirect('lab/viewTest');
  }

    public function viewLabTests()
    {
        $tests = DB::table('mobhe_labtests')
        ->select('mobhe_labtests.*')
        ->get();
        return View::make('labs.viewTests')
        ->with("requests", $tests)
        ->with("title", "Mobhe Lab Tests"); 
    }

    public function addLTData()
    {

        $selectData = Input::get('selectData');
        $labobjid   = Input::get('labobjid');
        foreach ($selectData as $test_id) {
          $labQuotes = new LabQuotes;
          $saveLabTestData = new ParseObject("LabQuotes");

          $labQuotes->labObjectId = $labobjid;
          $labQuotes->testObjectId = $test_id;

          $saveLabTestData->set('labId', $labobjid);
          $saveLabTestData->set('testId', $test_id);
          try {
            $saveLabTestData->save();
            $labQuotes->objectId = $saveLabTestData->getObjectId();
            $labQuotes->save();
            echo 'New object created with objectId: ' . $saveLabTestData->getObjectId();
          } catch (ParseException $ex) {  
          // Execute any logic that should take place if the save fails.
          // error is a ParseException object with an error code and message.
            echo 'Failed to create new object, with error message: ' + $ex->getMessage();
          }
        }

        return redirect('map/view');
    }

    public function updateTests()
    {
      $testObjectId = Input::get('testid');
      $lab_cost = Input::get('lab_cost');
      $homevisit_cost = Input::get('homevisit_cost');

      foreach($testObjectId as $key => $value) {
        $query = new ParseQuery("LabQuotes");    
        $query->equalTo("objectId", $testObjectId[$key]);
        $results = $query->find();

        LabQuotes::where('objectId', '=', $testObjectId[$key])->update(['lab_cost' => $lab_cost[$key]]);
        LabQuotes::where('objectId', '=', $testObjectId[$key])->update(['homevisit_cost' => $homevisit_cost[$key]]);

        $results[0]->set('costAtHome', $lab_cost[$key]);
        $results[0]->set('costAtLab', $homevisit_cost[$key]);
          try {
            $results[0]->save();
            echo 'New object created with objectId: ' . $results[0]->getObjectId();
          } catch (ParseException $ex) {  
          // Execute any logic that should take place if the save fails.
          // error is a ParseException object with an error code and message.
            echo 'Failed to create new object, with error message: ' + $ex->getMessage();
          }
      }
    }
}
