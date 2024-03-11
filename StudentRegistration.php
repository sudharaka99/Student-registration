<!-- StudentRegistration.php (Student Registration Page) -->
<?php include('C:\wamp64\www\Student registration\Config\Constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Registration</title>
</head>
<body>
    <div class="login-container">
        <h2>Student Registration</h2>
       
        <form action="" method="POST" onsubmit="return validateForm()">
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="tel">Tele Number:</label>
            <input type="tel" id="tel" name="tel" required>
            
            <label for="course">Course:</label>
            <select id="course" name="course" required>
                <option value="Select"></option>
                <option value="Diploma in English">Diploma in English</option>
                <option value="Diploma in Information Technology">Diploma in Information Technology</option>
                <option value="Diploma in Business Management">Diploma in Business Management</option>
                <option value="Diploma in Human Resource Management">Diploma in Human Resource Management</option>
                <option value="Diploma in Psychology and Counselling">Diploma in Psychology and Counselling</option>
            </select>
            <br>
            <button type="submit" name="submit" href="response.php">Register</button>
            

        </form>
        <a href="Home.php" class="btn-back">Back</a>
            
    </div>
   
    <script>
        function validateForm() {
            var nic = document.getElementById("nic").value;
            var name = document.getElementById("name").value;
            var address = document.getElementById("address").value;
            var tel = document.getElementById("tel").value;
            var course = document.getElementById("course").value;

            if (nic === "" || name === "" || address === "" || tel === "" || course === "") {
                alert("All fields are required");
                return false;
            }

            // You can add more advanced validation if needed

            return true;
        }
    </script>

    <?php
    if(isset($_POST['submit']))
    {
        $Nic=$_POST['nic'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $Tel=$_POST['tel'];
        $Course=$_POST['course'];

        $sql = "INSERT INTO stdetails (NIC,StudentName,StudentAddress,TelNumber,Course)
        VALUES ('$Nic','$name','$address','$Tel','$Course')";
        
        if ($conn->query($sql) == TRUE) {
            $_SESSION['add'] ="<b><p style='color:green'>Student Registration successfully.</p></b>";
            header('location:'.$SITEURL.'response.php');
        } 
        else {
            $_SESSION['add'] ="<b><p style='color:red'>Student Registration Failed.</p></b>";
            header('location:'.$SITEURL.'StudentRegistration.php');
        }
    }
    ?>

</body>
</html>