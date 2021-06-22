<?php include '../view/header.php'; ?>
<main>
    <h1>Fuel Consumption</h1>
	<form name="model_info" action="." method="post" id="model_info_form">
	<input type="hidden" name="action" value="model_info">
		<table>
			<tr>
				<td>Please Insert Model Code:</td>
				<td><input type="text" name="model_code" 
				<?php
					if (isset($model_code)){
					?> value='<?php echo $model_code; } ?>' ></td>
			</tr>
			<tr>
				<td><input type="submit" value="View Model"></td>
			</tr>
		</table>
	<?php if(isset($consumption)): ?>
		<?php if($consumption[0][0] != null): ?>
			<table>
				<?php
					foreach ($consumption as $avg):
					$fuel = $avg['AVG_FUEL'];
					$oil = $avg['AVG_OIL'];
					endforeach;
				?>
				<tr>
					<td>Average Fuel Consumption:</td>
					<td><?php echo $fuel; ?></td>
				</tr>
				<tr>
					<td>Average Oil Consumption:</td>
					<td><?php echo $oil; ?></td>
				</tr>
			</table>
		<?php endif; ?>
	<?php endif; ?>
	</form>
</main>
<?php include '../view/footer.php'; ?>