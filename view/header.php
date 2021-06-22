<!DOCTYPE html>
<html>
	<head>
		<title>AviaCo Test Assignment - s213295679</title>
	</head>
	<body>
		<table border="2px">
			<tr>
				<td>
					<form action="../View/fuel_consumption.php" method="post">
						<input type="submit" value="Fuel Consumption">
					</form>
				</td>
				<td>
					<form action="../View/engine_service.php" method="post">
						<input type="hidden" name="action" value="engine_service">
						<input type="submit" value="Engine Service Info">
					</form>
				</td>
				<td>
					<form action="../View/medical.php" method="post">
						<input type="hidden" name="action" value="medical">
						<input type="submit" value="Medical Info">
					</form>
				</td>
				<td>
					<form action="../View/pilots_by_ratings.php" method="post">
						<input type="hidden" name="action" value="pilot_ratings">
						<input type="submit" value="Pilots By Ratings">
					</form>
				</td>
				<td>
					<form action="../View/pilot_rating_update.php" method="post">
						<input type="hidden" name="action" value="all_pilots">
						<input type="submit" value="Add Rating To Pilot">
					</form>
				</td>
			</tr>
		</table>
		<header>
			<h1>AviaCo Test Assignment</h1>
		</header>
