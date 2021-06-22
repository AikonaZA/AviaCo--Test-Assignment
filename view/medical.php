<?php include '../view/header.php'; ?>
<main>
    <h1>Medical Examinations for next Pilots</h1>
	<?php if(isset($pilot_medical)): ?>
		<table border='2px'>
			<tr>
				<th>Pilot Name:</th>
			</tr>
			<?php foreach($pilot_medical as $pilot): ?>
				<tr>
					<td><?php echo $pilot['PILOT_FULL_NAME']; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>