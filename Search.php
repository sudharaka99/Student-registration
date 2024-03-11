<?php
include('C:\wamp64\www\Student registration\Config\Constants.php');
$SITEURL = 'http://localhost/Student%20registration/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RegisteredStudentCss.css">
    <title>Registered Student</title>
</head>
<body>

<!-- SEARCH Section Starts Here -->
<div class="container">
    <?php
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    ?>
    <h2>Student on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

</div>
<!-- SEARCH Section Ends Here -->

<!-- Menu Section Starts Here -->
<div class="container">
    <h2 class="text-center">Registered Student</h2>

    <?php
    $sql = "SELECT * FROM stdetails WHERE NIC LIKE '%$search%' OR StudentName LIKE '%$search%'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        ?>
        <table class="tbl-full">
            <tr>
                <th>StudentID</th>
                <th>NIC</th>
                <th>Student Name</th>
                <th>Student Address</th>
                <th>Telephone Number</th>
                <th>Course</th>
                <th>Action</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                $No = $row['StudentNo'];
                $NIC = $row['NIC'];
                $StudentName = $row['StudentName'];
                $StudentAddress = $row['StudentAddress'];
                $Tel = $row['TelNumber'];
                $Course = $row['Course'];
                ?>

                <tr>
                    <td><?php echo $No; ?></td>
                    <td><?php echo $NIC; ?></td>
                    <td><?php echo $StudentName; ?></td>
                    <td><?php echo $StudentAddress; ?></td>
                    <td><?php echo $Tel; ?></td>
                    <td><?php echo $Course; ?></td>
                    <td>
                        <a href="<?php echo $SITEURL ?>UpdateStudent.php? NIC=<?php echo $NIC; ?>" class="btn-2">Update Student</a><br><br>
                        <a href="<?php echo $SITEURL ?>DeleteStudent.php?id=<?php echo $No; ?>" class="btn-Dlt">Delete Student</a>
                    </td>
                </tr>

                <?php
            }
            ?>
        </table>
        <?php
    } else {
        // Handle case when there are no records
        echo "<div class='error'>No records found</div>";
    }
    ?>

    <div class="clearfix"></div>
</div>

<a href="RegisteredStudent.php" class="btn-back">Back</a>
</body>
</html>
