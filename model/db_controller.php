<?php
require('../model/db_connection.php');
require('../model/db_stored_procedures.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) 
	{
		$action = filter_input(INPUT_GET, 'action');
		if ($action == NULL) 
		{
			$action = 'engine_service';
		}
	}

	switch($action)
	{
		case 'engine_service':
			$aircraft_service = getEngineForService();
			include('../View/engine_service.php');
			break;
		case 'fuel_consumption':
			$model_code = filter_input(INPUT_POST, 'model_code', FILTER_SANITIZE_STRING);
			$consumption = getFuelOilByModel($model_code);
			include('../View/fuel_consumption.php');
			return $model_code;
			break;
		case 'medical':
			$pilot_medical = getPilotsDueForMedical();
			include('../View/medical.php');
			break;
		case 'pilot_ratings':
			$pilot_ratings = getAllPilotRatings();
			include('../View/pilots_by_ratings.php');
			break;
		case 'pilots_rating':
			$rating_code = filter_input(INPUT_POST, 'rating_code', FILTER_SANITIZE_STRING);
			$pilots_rating = getPilotsByRating($rating_code);
			$pilot_ratings = getAllPilotRatings();
			$hours_flown = array();
			$i = 0;
			foreach($pilot_rating)
			{
				$temp = getPilotHoursFlown($pilot_rating['EMP_NUM']);
				$hours_flown[$i] = $temp;
				$i = $i + 1;
			}			
			include('../View/pilots_by_ratings.php');
			return $hours_flown;
			break;
		case 'all_pilots':
			$all_pilots = getAllPilots();
			include('../View/pilot_rating_update.php');
			break;
		case 'pilot_rating_update':
			$emp_num = filter_input(INPUT_POST, 'emp_num', FILTER_SANITIZE_STRING);
			$rating_code = filter_input(INPUT_POST, 'rating_code', FILTER_SANITIZE_STRING);
			$pilot_full_name = getPilotFullNameByEmpNo($emp_num);
			$rating_descr = getRatingDetails($rating_code);
			include('../View/pilot_rating_update.php');
			break;
		case 'pilot_rating_update_confirm':
			$update_verify = filter_input(INPUT_POST, 'update_verify', FILTER_SANITIZE_STRING);
			$emp_num = filter_input(INPUT_POST, 'emp_num', FILTER_SANITIZE_STRING);
			$rating_code = filter_input(INPUT_POST, 'rating_code', FILTER_SANITIZE_STRING);
			if($update_verify == 'Yes')
			{
				$pilot_current_ratings = getPilotCurrentRating($emp_num);
				$emp_rating = $pilot_current_ratings[0][0] . '/' . $rating_code;
				updatePilotRating($emp_num, $emp_rating);
				$pilot_current_ratings = null;
				$all_pilots = getAllPilots();
				include('../View/pilot_rating_update.php');
				break;
			}
			else if ($update_verify == 'No')
			{
				$all_pilots = getAllPilots();
				include('../View/pilot_rating_update.php');
				break;
			}


		case 'pilot_current_ratings':
			$emp_num = filter_input(INPUT_POST, 'emp_num', FILTER_SANITIZE_STRING);
			$pilot_current_ratings = getPilotCurrentRating($emp_num);
			$all_pilots = getAllPilots();
			$pilot_rate_codes = explode('/', $pilot_current_ratings[0][0]);
			error_reporting(E_ERROR | E_PARSE);
			$rating1 = null;
			$rating2 = null;
			$rating3 = null;
			$rating4 = null;
			$rating5 = null;
			$rating6 = null;
			$rating7 = null;
			$rating8 = null;
			$rating9 = null;
			$rating10 = null;
			$rating11 = null;
			$rating12 = null;
			$i = 1;
			try
			{
				$rating1 = $pilot_rate_codes[0];
				$rating2 = $pilot_rate_codes[1];
				$rating3 = $pilot_rate_codes[2];
				$rating4 = $pilot_rate_codes[3];
				$rating5 = $pilot_rate_codes[4];
				$rating6 = $pilot_rate_codes[5];
				$rating7 = $pilot_rate_codes[6];
				$rating8 = $pilot_rate_codes[7];
				$rating9 = $pilot_rate_codes[8];
				$rating10 = $pilot_rate_codes[9];
				$rating11 = $pilot_rate_codes[10];
				$rating12 = $pilot_rate_codes[11];
			}
			catch (Exception $e)
			{ 
			
			}
			if ($rating1 == null)
				{$rating1 = '1';}
			if ($rating2 == null)
				{$rating2 = '2';}
			if ($rating3 == null)
				{$rating3 = '3';}
			if ($rating4 == null)
				{$rating4 = '4';}
			if ($rating5 == null)
				{$rating5 = '5';}
			if ($rating6 == null)
				{$rating6 = '6';}
			if ($rating7 == null)
				{$rating7 = '7';}
			if ($rating8 == null)
				{$rating8 = '8';}
			if ($rating9 == null)
				{$rating9 = '9';}
			if ($rating10 == null)
				{$rating10 = '10';}
			if ($rating11 == null)
				{$rating11 = '11';}
			if ($rating12 == null)
				{$rating12 = '12';}
			$pilot_available_ratings = getAllAvailableRatings($rating1, $rating2, $rating3, $rating4, $rating5, $rating6, $rating7, $rating8, $rating9, $rating10, $rating11, $rating12);
			include('../View/pilot_rating_update.php');
			break;
	}
?>