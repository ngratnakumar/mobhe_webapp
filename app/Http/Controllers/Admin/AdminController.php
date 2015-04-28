<?php namespace App\Http\Controllers\Admin;
require 'autoload.php';
use App\Http\Controllers\Controller;
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
class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
    	ParseClient::initialize('EU9daLseC5u7qOT8dFGOJrD4jHTc38y5Cz7O1XqF', 'PbbeJ3BMKZOSY5Hk86lLFjx442ppPI1ZiXdQcz5m', 'aMfezVMHz99hSxZfgxU0gMOkSqMqhBp9BGboH2st');
    	$TimeZone = Config::set('app.timezone', 'Asia/Kolkata');

			
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('dashboard');
	}

	public function preSync()
	{
        DB::table("Requests_tmp")->truncate();
        $query = new ParseQuery("Requests");
        $query->limit(9999999);
        $results = $query->find();
        foreach ($results as $key => $value) {
            $object = $results[$key];
            $objectId=$object->getObjectId();
            $Images=$object->get('Images');
            if(sizeof($Images) > 0 ) {
                $medicalRecords = "";
                foreach ($Images as $mrkey => $value) {
                    $file = $Images[$mrkey];
                    $url = $file->getURL();
                    $medicalRecords .= ",".$url;
                } 
                $Images = "[".$medicalRecords."]";
            } else
            {
                $Images = "NA";
            }
            $Notes=$object->get('Notes');
            $Type=$object->get('Type');
            $createdAt=$object->getCreatedAt()->format('d-M-Y H:i');
            $date=$object->getCreatedAt()->format('d-M-Y');
            $time=$object->getCreatedAt()->format('H:i');
            $doctorId=$object->get('doctorId');
            $doctorName=$object->get('doctorName');
            $patientAllergies=$object->get('patientAllergies');
            $patientBloodGroup=$object->get('patientBloodGroup');
            $patientDisease=$object->get('patientDisease');
            $patientMedications=$object->get('patientMedications');
            $patientObjectId=$object->get('patientObjectId');
            $updatedAt=$object->getUpdatedAt()->format('d-M-Y H:i');
            $OTCData=json_encode($object->get('OTCData'));
            if($OTCData == null) 
            {
                $OTCData = "";
            }
            else
            $OTCData = $OTCData;
            $Prescription=$object->get('Prescription');
            if(sizeof($Prescription) > 0 ) {
                $otcPrescription = "[";
                foreach ($Prescription as $otcPreKey => $value) {
                    $file = $Prescription[$otcPreKey];
                    $url = $file->getURL();
                    $otcPrescription .= ',"' . $url .'"' ;
                }
                $Prescription1 = $otcPrescription . "]";
                $Prescription = str_replace("[,", "[", $Prescription1);
            }
            else
            {
                $Prescription = " ";
            }
            $Schedule=$object->get('Schedule');
            $status=$object->get('status');
            $userId=$object->get('userId');
            $LabTestNames=json_encode($object->get('LabTestNames'));
            $LabTestPrescription=$object->get('LabTestPrescription');
            if(sizeof($LabTestPrescription) > 0 ) {
                $labPrescription = "";
                foreach ($LabTestPrescription as $labPreKey => $value) {
                    $file = $LabTestPrescription[$labPreKey];
                    $url = $file->getURL();
                    $labPrescription .=',"'.$url.'"';
                }
                $LabTestPrescription1 = "[".$labPrescription."]";
                $LabTestPrescription = str_replace("[,", "[", $LabTestPrescription1);
            }
            else
            {
                $LabTestPrescription = " ";
            }
            $verifyStatus=$object->get('verifyStatus');
            $medicationReminder=$object->get('medicationReminder');
            $genuineStatus=$object->get('genuineStatus');

            DB::table('Requests_tmp')->insert(
            [
                'objectId' => "$objectId",
                'Images' => "$Images",
                'Notes' => "$Notes",
                'Type' => "$Type",
                'createdAt' => "$createdAt",
                'date' => "$date",
                'time' => "$time",
                'doctorId' => "$doctorId",
                'doctorName' => "$doctorName",
                'patientAllergies' => "$patientAllergies",
                'patientBloodGroup' => "$patientBloodGroup",
                'patientDisease' => "$patientDisease",
                'patientMedications' => "$patientMedications",
                'patientObjectId' => "$patientObjectId",
                'updatedAt' => "$updatedAt",
                'OTCData' => "$OTCData",
                'Prescription' => "$Prescription",
                'Schedule' => "$Schedule",
                'status' => "$status",
                'userId' => "$userId",
                'LabTestNames' => "$LabTestNames",
                'LabTestPrescription' => "$LabTestPrescription",
                'verifyStatus' => "$verifyStatus",
                'medicationReminder' => "$medicationReminder",
                'genuineStatus' => "$genuineStatus"
            ]);
        }

        #PatientProfile Class/Table Parameters
        DB::table("PatientProfiles")->truncate();
        $query = new ParseQuery("PatientProfiles");
        $query->limit(9999999);
        $results = $query->find();
        foreach ($results as $key => $value) {
            $object = $results[$key];
            $invitesArr = $results[$key]->get('InviteDoctors');
            $IMEI=$object->get('IMEI');
            $Profile="Arraydata";
            $Name=$object->get('Name');
            $Age=$object->get('Age');
            $Gender=$object->get('Gender');
            $Mobile=$object->get('Mobile');
            $Address=$object->get('Address');
            $City=$object->get('City');
            $Medication=$object->get('Medication');
            $Allergies=$object->get('Allergies');
            $History=$object->get('History');
            $BloodGroup=$object->get('BloodGroup');
            $updateAt=$object->getUpdatedAt()->format('d-M-Y H:i');
            $createdAt=$object->getCreatedAt()->format('d-M-Y H:i');
            $objectId=$object->getObjectId();
            $status=$object->get('status');
            $ImageFile="Arraydata";
            $ImageName=$object->get('ImageName');
            $ImageUrl=$object->get('ImageUrl');
            $quantity=$object->get('quantity');
            $Images="Arraydata";
            $Email=$object->get('Email');
            $Height=$object->get('Height');
            $HeightFt=$object->get('HeightFt');
            $Notes=$object->get('Notes');
            $Weight=$object->get('Weight');
            $doctorId=$object->get('doctorId');
            $patientAllergies=$object->get('patientAllergies');
            $patientBloodGroup=$object->get('patientBloodGroup');
            $patientDisease=$object->get('patientDisease');
            $patientId=$object->get('patientId');
            $patientMedications=$object->get('patientMedications');
            $userId=$object->get('userId');
            $HeightIn=$object->get('HeightIn');
            $Disease=$object->get('Disease');
            $InviteDoctors="Arraydata";
            $Medications=$object->get('Medications');
            $savedForFutureUse=$object->get('savedForFutureUse');

            DB::table('PatientProfiles')->insert(
            [
                'IMEI' => "$IMEI",
                'Profile' => "$Profile",
                'Name' => "$Name",
                'Age' => "$Age",
                'Gender' => "$Gender",
                'Mobile' => "$Mobile",
                'Address' => "$Address",
                'City' => "$City",
                'Medication' => "$Medication",
                'Allergies' => "$Allergies",
                'History' => "$History",
                'BloodGroup' => "$BloodGroup",
                'updateAt' => "$updateAt",
                'createdAt' => "$createdAt",
                'objectId' => "$objectId",
                'status' => "$status",
                'ImageFile' => "$ImageFile",
                'ImageName' => "$ImageName",
                'ImageUrl' => "$ImageUrl",
                'quantity' => "$quantity",
                'Images' => "$Images",
                'Email' => "$Email",
                'Height' => "$Height",
                'HeightFt' => "$HeightFt",
                'Notes' => "$Notes",
                'Weight' => "$Weight",
                'doctorId' => "$doctorId",
                'patientAllergies' => "$patientAllergies",
                'patientBloodGroup' => "$patientBloodGroup",
                'patientDisease' => "$patientDisease",
                'patientId' => "$patientId",
                'patientMedications' => "$patientMedications",
                'userId' => "$userId",
                'HeightIn' => "$HeightIn",
                'Disease' => "$Disease",
                'InviteDoctors' => "$InviteDoctors",
                'Medications' => "$Medications",
                'savedForFutureUse' => "$savedForFutureUse"
            ]);
        }
#Syncing the Latest Data from Parse to Mysql
            $cond = DB::table('Requests_tmp')->whereNotIn('id', function($sq) { 
            $sq->select('Requests_tmp.id')
               ->from('Requests_tmp')
               ->join('Requests', 'Requests_tmp.id', '=', 'Requests.id'); 
        })->get();

        foreach ($cond as $key => $value) {
            DB::table('Requests')->insert(
            [
                'objectId' => $cond[$key]->objectId,
                'Images' => $cond[$key]->Images,
                'Notes' => $cond[$key]->Notes,
                'Type' => $cond[$key]->Type,
                'createdAt' => $cond[$key]->createdAt,
                'date' => $cond[$key]->date,
                'time' => $cond[$key]->time,
                'doctorId' => $cond[$key]->doctorId,
                'doctorName' => $cond[$key]->doctorName,
                'patientAllergies' => $cond[$key]->patientAllergies,
                'patientBloodGroup' => $cond[$key]->patientBloodGroup,
                'patientDisease' => $cond[$key]->patientDisease,
                'patientMedications' => $cond[$key]->patientMedications,
                'patientObjectId' => $cond[$key]->patientObjectId,
                'updatedAt' => $cond[$key]->updatedAt,
                'OTCData' => $cond[$key]->OTCData,
                'Prescription' => $cond[$key]->Prescription,
                'Schedule' => $cond[$key]->Schedule,
                'status' => $cond[$key]->status,
                'userId' => $cond[$key]->userId,
                'LabTestNames' => $cond[$key]->LabTestNames,
                'LabTestPrescription' => $cond[$key]->LabTestPrescription,
                'verifyStatus' => $cond[$key]->verifyStatus,
                'medicationReminder' => $cond[$key]->medicationReminder
            ]);

        }
        return Redirect::to('data');
#DoctorProfile Class/Table Parameters
        // if ($table_name == "DoctorProfiles") 
        // {   
        //     $query = new ParseQuery("DoctorProfiles");
        //     $query->limit(9999999);
        //     $results = $query->find();
        //     foreach ($results as $key => $value) {
        //         $object = $results[$key];
        //         $IMEI=$object->get('IMEI');
        //         $Profile="Arraydata";
        //         $Name=$object->get('Name');
        //         $Age=$object->get('Age');
        //         $Gender=$object->get('Gender');
        //         $Mobile=$object->get('Mobile');
        //         $Address=$object->get('Address');
        //         $City=$object->get('City');
        //         $Medication=$object->get('Medication');
        //         $Allergies=$object->get('Allergies');
        //         $History=$object->get('History');
        //         $BloodGroup=$object->get('BloodGroup');
        //         $updateAt=$object->getUpdatedAt()->setTimezone(new DateTimeZone('Asia/Kolkata'))->format('d-M-Y H:i');
        //         $createdAt=$object->getCreatedAt()->setTimezone(new DateTimeZone('Asia/Kolkata'))->format('d-M-Y H:i');
        //         $objectId=$object->getObjectId();
        //         $status=$object->get('status');
        //         $ImageFile="Arraydata";
        //         $ImageName=$object->get('ImageName');
        //         $ImageUrl=$object->get('ImageUrl');
        //         $quantity=$object->get('quantity');
        //         $Images="Arraydata";
        //         $Email=$object->get('Email');
        //         $Height=$object->get('Height');
        //         $HeightFt=$object->get('HeightFt');
        //         $Notes=$object->get('Notes');
        //         $Weight=$object->get('Weight');
        //         $doctorId=$object->get('doctorId');
        //         $patientAllergies=$object->get('patientAllergies');
        //         $patientBloodGroup=$object->get('patientBloodGroup');
        //         $patientDisease=$object->get('patientDisease');
        //         $patientId=$object->get('patientId');
        //         $patientMedications=$object->get('patientMedications');
        //         $userId=$object->get('userId');
        //         $HeightIn=$object->get('HeightIn');
        //         $Disease=$object->get('Disease');
        //         $InviteDoctors="Arraydata";
        //         $Medications=$object->get('Medications');
        //         $savedForFutureUse=$object->get('savedForFutureUse');

        //         $sql = "INSERT INTO PatientProfiles (
        //             IMEI,Profile,Name,Age,Gender,Mobile,Address,City,Medication,Allergies,History,BloodGroup,updateAt,createdAt,objectId,status,ImageFile,ImageName,ImageUrl,quantity,Images,Email,Height,HeightFt,Notes,Weight,doctorId,patientAllergies,patientBloodGroup,patientDisease,patientId,patientMedications,userId,HeightIn,Disease,InviteDoctors,Medications,savedForFutureUse ) 
        //             VALUES 
        //             ('".$IMEI."',
        //             '".$Profile."',
        //             '".$Name."',
        //             '".$Age."',
        //             '".$Gender."',
        //             '".$Mobile."',
        //             '".$Address."',
        //             '".$City."',
        //             '".$Medication."',
        //             '".$Allergies."',
        //             '".$History."',
        //             '".$BloodGroup."',
        //             '".$updateAt."',
        //             '".$createdAt."',
        //             '".$objectId."',
        //             '".$status."',
        //             '".$ImageFile."',
        //             '".$ImageName."',
        //             '".$ImageUrl."',
        //             '".$quantity."',
        //             '".$Images."',
        //             '".$Email."',
        //             '".$Height."',
        //             '".$HeightFt."',
        //             '".$Notes."',
        //             '".$Weight."',
        //             '".$doctorId."',
        //             '".$patientAllergies."',
        //             '".$patientBloodGroup."',
        //             '".$patientDisease."',
        //             '".$patientId."',
        //             '".$patientMedications."',
        //             '".$userId."',
        //             '".$HeightIn."',
        //             '".$Disease."',
        //             '".$InviteDoctors."',
        //             '".$Medications."',
        //             '".$savedForFutureUse."')";
        //         mysql_query($sql);
        //     }
        // }

	}

    public function benchmarkSelectedData($date, $type)
    {

        switch ($type) {
            case 'Total':
                $type = "%";
                break;

            case 'Doctor':
                $type = "Doc%";
                break;

            case 'Nurse':
                $type = "Nur%";
                break;

            case 'Lab':
                $type = "Lab%";
                break;

            case 'Physiotherapist':
                $type = "Phys%";
                break;

            case 'Dentist':
                $type = "Dent%";
                break;

            case 'ct':
                $type = "Care%";
                break;

            case 'cfm':
                $type = "Call%";
                break;

            case 'pd':
                $type = "Phar%";
                break;                                
            
            default:
                $type = "HN";
                break;
        }
        // echo $type;
        $requests = DB::table('Requests')
        ->orderBy('Requests.id', 'desc')
        ->leftJoin('PatientProfiles', 'Requests.patientObjectId', '=', 'PatientProfiles.objectId')
        ->select('PatientProfiles.*','Requests.*','PatientProfiles.id as ppid', 'Requests.id as rid', 'Requests.createdAt as rdatetime')
        // ->where('date', $date, 'Type', $type)
        ->whereRaw('date like "'. $date .'" and Type like "'. $type .'"')
        ->get();
        return View::make('admin.showBenchmark')
        ->with('title','Mobhe Benchmark')
        ->with('requests',$requests);

    }

	public function benchmark()
	{	
			$value = Input::get('date');
		if(!empty($value)){
			$value = date_create($value);
			$date = date_format($value, "d-M-Y");
		}
		else
			$date = "%";
		// $sql = "select 
		// 			count(*) as Total, 
		// 			(select count(*) from Requests where Requests.Type like 'Doctor' and createdAt like '27-Mar%' and delStat = 0) as Doctor ,
		// 			(select count(*) from Requests where Requests.Type like 'Care Taker' and createdAt like '27-Mar%' and delStat = 0) as 'Care Taker' ,
		// 			(select count(*) from Requests where Requests.Type like 'Nurse' and createdAt like '27-Mar%' and delStat = 0) as Nurse ,
		// 			(select count(*) from Requests where Requests.Type like 'Callback from doctor' and createdAt like '27-Mar%' and delStat = 0) as 'Callback from doctor' ,
		// 			(select count(*) from Requests where Requests.Type like 'Pharmacy Delivery' and createdAt like '27-Mar%' and delStat = 0) as 'Pharmacy Delivery' ,
		// 			(select count(*) from Requests where Requests.Type like 'Lab' and createdAt like '27-Mar%' and delStat = 0) as Lab ,
		// 			(select count(*) from Requests where Requests.Type like 'Physiotherapist' and createdAt like '27-Mar%' and delStat = 0) as Physiotherapist ,
		// 			(select count(*) from Requests where Requests.Type like 'Dentist' and createdAt like '27-Mar%' and delStat = 0) as Dentist 
		// 		from Requests
		// 		where createdAt like '27-Mar%' and delStat = 0;
		// 		select 
		// 		    count(*) total,
		// 		    sum(case when Type = 'Doctor' then 1 else 0 end) doctor,
		// 		    sum(case when Type = 'Nurse' then 1 else 0 end) nurse
		// 		from Requests;";
				if($date == "%") {
					$date1 = "%";
					$check = "date as createdAt ";
				}
				else { $date1 = $date . "%"; $check = '"' . $date . '"createdAt'; }
				$query = $check . ",
				count(*) as Total, 
				sum(case when Type = 'Doctor' then 1 else 0 end) as Doctor,
				sum(case when Type = 'Care Taker' then 1 else 0 end) as ct,
				sum(case when Type = 'Callback from doctor' then 1 else 0 end) as cfm,
				sum(case when Type = 'Pharmacy Delivery' then 1 else 0 end) as pd,
				sum(case when Type = 'Lab' then 1 else 0 end) as Lab,
				sum(case when Type = 'Physiotherapist' then 1 else 0 end) as Physiotherapist,
				sum(case when Type = 'Dentist' then 1 else 0 end) as Dentist,
				sum(case when Type = 'Nurse' then 1 else 0 end) as Nurse";
		$where = 'createdAt like "'.$date1.'" and delStat = 0';
		$request = DB::table('Requests')
			->select(DB::raw($query))
			->whereRaw($where)
			->groupBy('date')
			->get();
		return View::make('admin.benchmark')
					->with('title','Mobhe Leads | benchmark')
					->with('requests',$request);
	}


	public function data()
	{
				$requests = DB::table('Requests')
                    ->orderBy('Requests.id', 'desc')
                    ->leftJoin('PatientProfiles', 'Requests.patientObjectId', '=', 'PatientProfiles.objectId')
                    ->select('PatientProfiles.*','Requests.*','PatientProfiles.id as ppid', 'Requests.id as rid', 'Requests.createdAt as rdatetime')
                    ->where('delStat', 0)
                    ->get();
		return View::make('admin.requests')
					->with('title','Mobhe Leads')
					->with('requests',$requests);
	}

	public function pranaData()
	{
				$requests = DB::table('Requests')
                    ->leftJoin('PatientProfiles', 'Requests.patientObjectId', '=', 'PatientProfiles.objectId')
                    ->select('PatientProfiles.*','Requests.*','PatientProfiles.id as ppid', 'Requests.id as rid', 'Requests.createdAt as rdatetime', 'Requests.sp-status as spstatus')
                    ->where('transferedTo', 'prana')
                    ->where('delStat', 0)
                    ->get();
		return View::make('admin.prana')
					->with('title','Mobhe Leads | Prana')
					->with('requests',$requests);
	}

	public function mdentData()
	{
				$requests = DB::table('Requests')
                    ->leftJoin('PatientProfiles', 'Requests.patientObjectId', '=', 'PatientProfiles.objectId')
                    ->select('PatientProfiles.*','Requests.*','PatientProfiles.id as ppid', 'Requests.id as rid', 'Requests.createdAt as rdatetime', 'Requests.sp-status as spstatus')
                    ->where('transferedTo', 'mdent')
                    ->where('delStat', 0)
                    ->get();
		return View::make('admin.mdent')
					->with('title','Mobhe Leads | Mobhe Dent')
					->with('requests',$requests);
	}

	public function deleteRequest($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['delStat' => 1]);
            	return Redirect::to('data');
	}

	public function prana($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['transferedTo' => "prana"]);
            	return Redirect::to('data');
	}

	public function mdent($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['transferedTo' => "mdent"]);
            	return Redirect::to('data');
	}

	public function mdentDone($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['sp-status' => 'check']);
            	return Redirect::to('mdent');
	}

	public function mdentTrash($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['sp-status' => 'times']);
            	return Redirect::to('mdent');
	}

	public function pranaDone($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['sp-status' => 'check']);
            	return Redirect::to('prana');
	}

	public function pranaTrash($id)
	{
		DB::table('Requests')
            ->where('id', $id)
            ->update(['sp-status' => 'times']);
            	return Redirect::to('prana');
	}	

}
