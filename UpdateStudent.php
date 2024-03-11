<?php
require_once('C:\wamp64\www\Student registration\Config\Constants.php');

function isSelected($value, $selectedValue)
{
    return $value === $selectedValue ? 'selected' : '';
}

if (isset($_GET['NIC'])) {
    $id = $_GET['NIC'];

    $sql = "SELECT * FROM stdetails WHERE NIC=$id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    $StudentName = $row['StudentName'];
    $StudentAddress = $row['StudentAddress'];
    $Tel = $row['TelNumber'];
    $Course = $row['Course'];
} else {
    // Redirect to the registeredStudent.php page if NIC is not set
    header('location:' . $SITEURL . 'registeredStudent.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Registration</title>
</head>
<body>
<!-- Main section -->
<div class="Main">
    <div class="login-container">
        <h1>Update Student</h1><br>

        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" value="<?php echo $id; ?>" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $StudentName; ?>" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $StudentAddress; ?>" required>

            <label for="tel">Tele Number:</label>
            <input type="tel" id="tel" name="tel" value="<?php echo $Tel; ?>" required>

            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="Select" <?php echo isSelected("Select", $Course); ?>></option>
                <option value="Diploma in English" <?php echo isSelected("Diploma in English", $Course); ?>>Diploma in English</option>
                <option value="Diploma in Information Technology" <?php echo isSelected("Diploma in Information Technology", $Course); ?>>Diploma in Information Technology</option>
                <option value="Diploma in Business Management" <?php echo isSelected("Diploma in Business Management", $Course); ?>>Diploma in Business Management</option>
                <option value="Diploma in Human Resource Management" <?php echo isSelected("Diploma in Human Resource Management", $Course); ?>>Diploma in Human Resource Management</option>
                <option value="Diploma in Psychology and Counselling" <?php echo isSelected("Diploma in Psychology and Counselling", $Course); ?>>Diploma in Psychology and Counselling</option>
            </select>
            <br>
            <button type="submit" name="submit">Update Student details</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $Nic = $_POST['nic'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $Tel = $_POST['tel'];
            $Course = $_POST['course'];

            $sql3 = "UPDATE stdetails SET 
            NIC='$Nic',
            StudentName='$name',
            StudentAddress='$address',
            TelNumber='$Tel',
            Course='$Course'
            WHERE NIC=$id
            ";

            if ($conn->query($sql3) === TRUE) {
                $_SESSION['update'] = "<b><p style='color:green'>Record updated successfully.</p></b>";
                header('location:' . $SITEURL . 'registeredStudent.php');
            } else {
                $_SESSION['update'] = "<b><p style='color:red'>Record update failed.</p></b>";
                header('location:' . $SITEURL . 'registeredStudent.php');
            }
        }
        ?>
    </div>
</div>
</body>
</html>
