<?php

define("DB_NAME", 'F:\\xampp\\htdocs\\php-classby- hasin\\project\\crud\\data\\data.txt');


function seed()
{
    $data = array(
        array(
            'id' => 1,
            'fname' => 'sakib',
            'lname' => 'biswas',
            'age' => '22',
            'roll' => '12'
        ),
        array(
            'id' => 2,
            'fname' => 'bakibilla',
            'lname' => 'mondal',
            'age' => '22',
            'roll' => '32'
        ),
        array(
            'id' => 3,
            'fname' => 'masud',
            'lname' => 'azhar',
            'age' => '22',
            'roll' => '52'
        ),
        array(
            'id' => 4,
            'fname' => 'azizul',
            'lname' => 'biswas',
            'age' => '22',
            'roll' => '25'
        )
    );
    $serializeData = serialize($data);
    file_put_contents(DB_NAME, $serializeData, LOCK_EX);
}

function generate_report()
{
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
?>

    <table class="table table-light table-hover table-bordered table-striped">
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>Age</th>
                <th>Roll</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        foreach ($students as $student) {
        ?>
            <tr>
                <td>
                    <?php printf('%s %s', $student['fname'], $student['lname']); ?>
                </td>
                <td>
                    <?php printf('%s', $student['age']); ?>
                </td>
                <td>
                    <?php printf('%s', $student['roll']); ?>
                </td>
                <td>
                    <?php printf('<a href="index.php?task=edit&id=%s" class="btn btn-primary">Edit</a> <a href="index.php?task=delete&id=%s" class="btn btn-danger">Delete</a>', $student['id'], $student['id']);  ?>
                </td>
            </tr>
            </tbody>
        <?php
        }
        ?>
        <tbody>

    </table>
<?php
}


function addStudent($fname, $lname, $age, $roll)
{
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    foreach ($students as $_student) {
        if ($_student['roll'] == $roll) {
            $found = true; 
            break;
        }
    }
    if (!$found) {
        $newId = getNewId($students);
        $student = array(
            'id' => $newId,
            'fname' => $fname,
            'lname' => $lname,
            'age' => $age,
            'roll' => $roll
        );
        array_push($students, $student);
        $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);
        return true;
    }
    return false;
}


function getNewId($students) {
    $maxId = max(array_column($students , 'id'));
    return $maxId + 1;
}

function getStudent($id){
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    foreach ($students as $student) {
        if ($student['id'] == $id) {
            return $student;
        }
    }
    return false;
}



function updateStudent($id, $fname, $lname, $age, $roll){
    $found = false;
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    foreach ($students as $student) {
        if ($student['id'] != $id && $student['roll'] == $roll) {
            $found = true; 
            break;
        }
    }
    if(!$found){
        $students[$id-1]['fname'] = $fname;
        $students[$id-1]['lname'] = $lname;
        $students[$id-1]['age'] = $age;
        $students[$id-1]['roll'] = $roll;
        $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);
        return true;
    }
    
}

function deleteStudent($id){
    $serializeData = file_get_contents(DB_NAME);
    $students = unserialize($serializeData);
    
    unset($students[$id - 1]);
    $serializeData = serialize($students);
        file_put_contents(DB_NAME, $serializeData, LOCK_EX);

}



?>