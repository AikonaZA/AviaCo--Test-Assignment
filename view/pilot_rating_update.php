<?php include '../view/header.php'; ?>
<?php ?>
<main>
    <h1>Update Pilot Ratings</h1>


	<?php if(isset($all_pilots) AND $all_pilots <> null): ?>
	<table>
		<td>
			<th>Please select a pilot:</th>
		</td>
		<?php foreach($all_pilots as $everyone): ?>
			<tr>
				<td>
					<form action="." method="post">
						<input type="hidden" name="action" value="pilot_current_ratings">
						<input type="hidden" name="emp_num" value="<?php echo $everyone['EMP_NUM']; ?>">
						<input type="submit" value="<?php echo $everyone['PILOT_FULL_NAME']; ?>">
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>


	<?php if(isset($pilot_current_ratings) AND $pilot_current_ratings <> null): ?>
		<table>
			<td>
				<h3>Current Ratings Of <?php echo $pilot_current_ratings[0][1]; ?></h3>
			</td>	
		</table>
	<?php endif; ?>


	<?php if(isset($pilot_available_ratings)): ?>
		<table>
			<tr>
				<th>Please Select A Rating:</th>
			</tr>
			<?php foreach($pilot_available_ratings as $ratings): ?>
				<tr>
					<td>
						<form action="." method="post">
							<input type="hidden" name="action" value="pilot_rating_update">
							<input type="hidden" name="rating_code" value="<?php echo $ratings['RTG_CODE']; ?>">
							<input type="hidden" name="emp_num" value="<?php echo $pilot_current_ratings[0][2]; ?>">
							<input type="submit" value="<?php echo $ratings['RTG_CODE']; ?> - <?php echo $ratings['RTG_NAME']; ?>">
						</form>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
	

	<?php if(isset($rating_descr) AND isset($pilot_full_name)): ?>
		<h2>Are Your Sure You Want To Add <?php echo $rating_descr[0][0]; ?> - <?php echo $rating_descr[0][1]; ?> To Pilot <?php echo $pilot_full_name[0][0]; ?>?</h2>
		<form action="." method="post">
			<input type="hidden" name="action" value="pilot_rating_update_confirm">
			<input type="hidden" name="update_verify" value="Yes">
			<input type="hidden" name="emp_num" value="<?php echo $pilot_full_name[0][1]; ?>">
			<input type="hidden" name="rating_code" value="<?php echo $rating_descr[0][0]; ?>">
			<input type="submit" value="Yes/Add Rating">
		</form>
		<br>
		<form action="." method="post">
			<input type="hidden" name="action" value="pilot_rating_update_confirm">
			<input type="hidden" name="update_verify" value="No">
			<input type="submit" value="No/Cancel">
		</form>
	<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>