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
    <div class="container">
        <h1>Registered Student</h1>

        <section class="search text-center">
        <div class="container">
            
            <form action="<?php echo $SITEURL; ?>Search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Student.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>

        <?php
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				
				}
                if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				
                }
				?>
        <table class="tbl-full">
            <tr>
                <th>StudentID</th>
                <th>NIC</th>
                <th>Student Name</th>
                <th>Student Address</th>
                <th>Telephone Number</th>
                <th>Course</th>
                <th> Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM stdetails";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
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
                        <a href="<?php echo $SITEURL?>UpdateStudent.php? NIC=<?php echo $NIC; ?>" class="btn-2">Update Student</a><br><br>
                        <a href="<?php echo $SITEURL?>DeleteStudent.php? id=<?php echo $No;?>" class="btn-Dlt">Delete Student</a>
                        </td>
                    </tr>

            <?php
                }
            } else {
                // Handle case when there are no records
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </table>
        <a href="Home.php" class="btn-back">Back</a>
    </div>

</body>
</html>
