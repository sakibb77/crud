
<?php 
 $id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
 $student = getStudent($id);
 if($student):
?>

<div class="row justify-content-center">
    <div class="col-8 justify-content-center">
        <form action="index.php?task=edit" method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="mb-3">
                <label for="fname" class="forn-control">First Name</label>
                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $student['fname']?>">
            </div>
            <div class="mb-3">
                <label for="lname" class="forn-control">Last Name</label>
                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $student['lname']?>">
            </div>
            <div class="mb-3">
                <label for="age" class="forn-control">Age</label>
                <input type="number" name="age" id="age" class="form-control" value="<?php echo $student['age']?>">
            </div>
            <div class="mb-3">
                <label for="age" class="forn-control">Roll</label> 
                <input type="number" name="roll" id="roll" class="form-control" value="<?php echo $student['roll']?>">
            </div>
            <div class="mb-3">
                <input type="submit" value="SUBMIT" class="btn btn-primary" name="submit">
            </div>
        </form>
    </div>
</div>

<?php endif;?>