<?php
require_once('./operations.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Image upload</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center my-3">Registration form</h1>
    <div class="container d-flex justify-content-center" >
        <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">
            <?php 
            inputFields("Username","username","","text");
            ?>
            <?php 
            inputFields("Mobile","mobile","","text");
            ?>
            <?php 
            inputFields("","file","", "file");
            ?>
            <button class="btn btn-dark" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>