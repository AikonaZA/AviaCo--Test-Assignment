<?php include '../view/header.php'; ?>
<main>
    <h1>Pilots By Rating</h1>
		<table>
			<th>Please Select Rating:</th>
			<?php foreach($pilot_ratings as $rating): ?>
				<tr>
					<td>
						<form action="." method="post">
						<input type="hidden" name="action" value="pilots_rating">
						<input type="hidden" name="rating_code" value="<?php echo $rating['RTG_CODE']; ?>">
						<input type="submit" value="<?php echo $rating['RTG_CODE']; ?> - <?php echo $rating['RTG_NAME']; ?>"></form>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
		
		<?php if(isset($pilots_rating)):
			$i = 0; ?>
			<table border="2px">
				<tr>
					<th>Pilot Name:</th>
					<th>Total Hours Flown:</th>
				</tr>
				<?php foreach($pilots_rating as $pilot):  ?>
					<tr>
						<td><?php echo $pilot['PILOT_FULL_NAME']; ?></td>
						<td><?php echo $hours_flown[$i][0];; $i = $i + 1; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>