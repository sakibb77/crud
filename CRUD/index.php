<?php require_once "function.php" ?>

<!-- seeding -->
<?php
$info = '';
$alert = $_GET['alert'] ?? 0;
$task = $_GET['task'] ?? 'report';
if ('seed' == $task) {
    seed(DB_NAME);
    $error = 'seeding is complete';
    header('location: index.php?task=report&alert=seedsuccess');
}

if (isset($_POST['submit'])) {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
    $roll = filter_input(INPUT_POST, 'roll', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    if ($id) {
        if ($fname != '' && $lname != '' && $age != '' && $roll != '') {
            updateStudent($id, $fname, $lname, $age, $roll);
            header('location: index.php?task=report&alert=updatesuccess');
        }
    } else {
        if ($fname != '' && $lname != '' && $age != '' && $roll != '') {
            $result = addStudent($fname, $lname, $age, $roll);
            if ($result) {
                header('location: index.php?task=report&alert=success');
            } else {
                header('location: index.php?task=report&alert=1');
            }
        } elseif ($fname == '') {
            $alert = 'plese enter your name';
        }
    }
}

// delete function
if ('delete' == $task) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    if ($id > 0) {
        deleteStudent($id);
        header('location: index.php?task=report&alert=deletecomplete');
    }
}

// delete function
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>CRUD APLICATION IN PHP</h1>
    <div class="container">
        <!-- all btn -->
        <?php include_once('templates/nav.php') ?>
        <!-- all btn -->
        <!-- add student form -->
        <?php
        if ('add' == $task) {
            include_once('templates/modal.php');
        }
        ?>
        <!-- add student form -->

        <!-- edite form -->
        <?php
        if ('edit' == $task) {
            include_once('templates/edit.php');
            // header('location: index.php?task=edit');
        } ?>

        <!-- edite form -->

        <!-- add student btn -->
        <?php if ('report' == $task) : ?>
            <div class="row">
                <?php generate_report(); ?>
            </div>
        <?php endif; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>