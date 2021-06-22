<?php include '../view/header.php'; ?>
<main>
    <h1>Next Service Due</h1>
	<?php if(isset($engine_service)): ?>
		<table border='2px'>
			<tr>
				<th>Aircraft Number:</th>
				<th>Total Time - Left Engine:</th>
				<th>Total Time - Right Engine:</th>
			</tr>
			<?php foreach($engine_service as $a): ?>
				<tr>
					<td><?php echo $a['AC_NUMBER']; ?></td>
					<td><?php echo $a['AC_TTEL']; ?></td>
					<td><?php echo $a['AC_TTER']; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>