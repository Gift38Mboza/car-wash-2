<?php
$servername = "localhost";
$username = "root";    
$password = "";         
$dbname = "carwash-details"; 

//  CONNECT TO THE DATABASE
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts (name, email, subject, message) VALUES ( ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    
} else {
    die("Error executing statement: " . $N  stmt->error);
}


$stmt->close();
$conn->close();

?>

<!-- HTML for success message -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #e8d59cff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
        }
        .message-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
        }
        h1 {
            margin-top: 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #b46cd5;
            font-size: 30px;
        }
    
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6d02c4 ;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #4fe12aff;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h1>✅ Thank you for contacting us!</h1>
        <p>
            We will respond soon.
        </p>
        <p><a href="index.html">Go back to the form</a></p>
    </div>
</body> 
</html>
