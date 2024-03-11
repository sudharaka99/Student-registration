<?php
session_start(); // Ensure session is started

// Your existing code for Constants and SiteURL

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="Hstyle.css">
</head>

<body>

    <div class="container">
	
        <header>
            <h1>Student Registration Dashboard</h1>
        </header>
        <?php
            if(isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        
        <section class="content">
            <div class="widget">
                <h2>Welcome, User!</h2>
                <p>Here you can view and manage student information.</p>
            </div>
 	<nav>
            <ul>
                <button class="b1"><li><a href="StudentRegistration.php">New Registration</a></li></button>
                <button class="b1"><li><a href="RegisteredStudent.php">View Student Details</a></li></button>
                <button class="b1"><li><a href="Logout.php">Logout</a></li></button>
            </ul>
        </nav>
          
        </section>
 	
       
    </div>

</body>
</html>
