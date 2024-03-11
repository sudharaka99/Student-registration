<?php
session_start(); // Ensure session is started

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response</title>
    <link rel="stylesheet" href="Hstyle.css">
</head>

<body>

    <div class="container">
        <header>
            <h1> <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    ?></h1>
        </header>
        <section class="content">
            <div class="widget">
            <h2>Thank you for your response!</h2>
                   
                <p>Please click the below button for a new registration.</p>
            </div>
            <nav>
                <ul>
                <button class="b1"><li><a href="Home.php">Home</a></li></button>  
                </ul>
                <br>
                <ul>
                
                <button class="b1"><li><a href="StudentRegistration.php">New Registration</a></li></button>
                </ul>
            </nav>
        </section>
    </div>

</body>
</html>
