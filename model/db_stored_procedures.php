<?php
function getFuelOilByModel($model_code)
{
	$db = Database::getDB();
	$query = 'CALL GetFuelOilByModel(:modelCode)';
	$statement = $db->prepare($query);
	$statement->bindValue(':modelCode', $model_code);
	$statement->execute();
	$modelFuelOil = $statement->fetchAll();
    $statement->closeCursor();
	return $modelFuelOil;
}

function getEngineForService()
{
	$db = Database::getDB();
	$query = 'CALL GetEngineForService()';
	$statement = $db->prepare($query);
	$statement->execute();
	$aircraft_service = $statement->fetchAll();
    $statement->closeCursor();
	return $engine_service;
}

function getPilotsDueForMedical()
{
	$db = Database::getDB();
	$query = 'CALL GetPilotDueForMedical()';
	$statement = $db->prepare($query);
	$statement->execute();
	$pilot_medical = $statement->fetchAll();
    $statement->closeCursor();
	return $pilot_medical;
}

function getAllPilotRatings()
{
	$db = Database::getDB();
	$query = 'CALL 	GetAllRatings()';
	$statement = $db->prepare($query);
	$statement->execute();
	$pilot_ratings = $statement->fetchAll();
    $statement->closeCursor();
	return $pilot_ratings;
}

function getPilotsByRating($rating_code)
{
	$db = Database::getDB();
	$query = 'CALL GetEmployeeByRating(:rating_code)';
	$statement = $db->prepare($query);
	$statement->bindValue(':rating_code', $rating_code);
	$statement->execute();
	$pilots_by_rating = $statement->fetchAll();
    $statement->closeCursor();
	return $pilots_by_rating;
}

function getPilotHoursFlown($emp_num)
{
	$db = Database::getDB();
	$query = 'CALL GetEmployeeHrsFlown(:emp_num)';
	$statement = $db->prepare($query);
	$statement->bindValue(':emp_num', $emp_num);
	$statement->execute();
	$pilot_hrs_flown = $statement->fetch();
    $statement->closeCursor();
	return $pilot_hrs_flown;
}

function getAllPilots()
{
	$db = Database::getDB();
	$query = 'CALL 	GetAllPilotsFullName()';
	$statement = $db->prepare($query);
	$statement->execute();
	$all_pilots = $statement->fetchAll();
    $statement->closeCursor();
	return $all_pilots;
}

function getPilotCurrentRating($emp_num)
{
	$db = Database::getDB();
	$query = 'CALL GetRatingsByPilot(:emp_num)';
	$statement = $db->prepare($query);
	$statement->bindValue(':emp_num', $emp_num);
	$statement->execute();
	$pilot_current_ratings = $statement->fetchAll();
    $statement->closeCursor();
	return $pilot_current_ratings;
}

function getAllAvailableRatings($rating1, $rating2, $rating3, $rating4, $rating5, $rating6, $rating7, $rating8, $rating9, $rating10, $rating11, $rating12)
{
	$db = Database::getDB();
	$query = 'CALL GetAvailableRatings(:rating1, :rating2, :rating3, :rating4, :rating5, :rating6, :rating7, :rating8, :rating9, :rating10, :rating11, :rating12)';
	$statement = $db->prepare($query);
	$statement->bindValue(':rating1', $rating1);
	$statement->bindValue(':rating2', $rating2);
	$statement->bindValue(':rating3', $rating3);
	$statement->bindValue(':rating4', $rating4);
	$statement->bindValue(':rating5', $rating5);
	$statement->bindValue(':rating6', $rating6);
	$statement->bindValue(':rating7', $rating7);
	$statement->bindValue(':rating8', $rating8);
	$statement->bindValue(':rating9', $rating9);
	$statement->bindValue(':rating10', $rating10);
	$statement->bindValue(':rating11', $rating11);
	$statement->bindValue(':rating12', $rating12);
	$statement->execute();
	$pilot_available_ratings = $statement->fetchAll();
    $statement->closeCursor();
	return $pilot_available_ratings;
}

function getPilotFullNameByEmpNo($emp_num)
{
	$db = Database::getDB();
	$query = 'CALL GetPilotFullNameByEmpNo(:emp_num)';
	$statement = $db->prepare($query);
	$statement->bindValue(':emp_num', $emp_num);
	$statement->execute();
	$pilot_full_name = $statement->fetchAll();
    $statement->closeCursor();
	return $pilot_full_name;
}

function getRatingDetails($rating_code)
{
	$db = Database::getDB();
	$query = 'CALL GetRatingDetails(:rating_code)';
	$statement = $db->prepare($query);
	$statement->bindValue(':rating_code', $rating_code);
	$statement->execute();
	$rating_descr = $statement->fetchAll();
    $statement->closeCursor();
	return $rating_descr;
}

function updatePilotRating($emp_num, $emp_rating)
{
	$db = Database::getDB();
	$query = 'CALL UpdatePilotRating(:emp_num, :emp_rating)';
	$statement = $db->prepare($query);
	$statement->bindValue(':emp_num', $emp_num);
	$statement->bindValue(':emp_rating', $emp_rating);
	$statement->execute();
    $statement->closeCursor();
}
?>