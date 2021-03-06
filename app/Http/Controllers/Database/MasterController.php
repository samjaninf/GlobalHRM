<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use App\Models\Recruitments\InterviewResult;
use DB;

class MasterController extends Controller
{
    public function getMasterSkills($term){
    	
    	$sqlString = "SELECT tblSkills.id, tblSkills.name, tblCandidate_Skills.no_years 
    						  FROM tblSkills
    			              LEFT JOIN tblCandidate_Skills ON
    							 tblSkills.id = tblCandidate_Skills.skill_id
    						  WHERE tblSkills.name LIKE '%". $term ."%' ORDER BY tblSkills.name ASC";
    	
    	$skills = DB::select($sqlString);
    	   	
    	if(!is_null($skills))
    			$res = response()->json(['success'=>true,'data'=>json_encode($skills)]);
    		else
    			$res = response()->json(['success'=>false, 'data' => 'Can not query master data from tblEducationLevels.']);
    	return $res ;
	}
	public function getMasterInterviewResults(){
		$interviewResults = InterviewResult::all();
		if(!is_null($interviewResults))
			$res = response()->json(['success'=>true,'data'=>json_encode($interviewResults)]);
			else
				$res = response()->json(['success'=>false, 'data' => 'Can not query master data from tblInterviewResults.']);
		return $res ;
		
	}
}
