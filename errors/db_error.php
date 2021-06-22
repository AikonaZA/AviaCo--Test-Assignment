<?php include '../view/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p>An error occured while conneting to the database</p>
    <p>Ensure the database is installed and running.</p>
    <p>Error message: <?php echo $error_message; ?></p>
</main>
<?php include '../view/footer.php'; ?>