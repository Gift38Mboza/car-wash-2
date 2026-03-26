<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carwash-details";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    // Stop execution and show error if connection fails
    die("Connection failed: " . $conn->connect_error);
}

//  Handle Selected Services (Checkboxes)
if (isset($_POST['service']) && is_array($_POST['service'])) {
    
    $services_list = implode(', ', $_POST['service']);
} else {
    $services_list = 'None Selected';
}

// Get other form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$carReg = $_POST['carReg'];
$carMake = $_POST['carMake'];
$vehicleType = $_POST['vehicleType'];
$bookingDate = $_POST['bookingDate'];


// Prepare the SQL statement for secure insertion (Prepared Statement)
$sql = "INSERT INTO bookings 
        (full_name, email, phone, car_registration, car_make_model, vehicle_type, services, booking_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("SQL prepare error: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("ssssssss", $fullName, $email, $phone, $carReg, $carMake, $vehicleType, $services_list, $bookingDate);


if ($stmt->execute()) {
    
} else {
    
    echo "Error inserting record: " . $stmt->error;
    
    exit(); 
}

$stmt->close();
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        
        /* ... (Your CSS remains here) ... */
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
        <h1>✅ Booking Confirmed!</h1>
        <p>Your booking has been successfully recorded. We will contact you soon!</p>
        <p><a href="index.html">Make another booking</a></p>
    </div>
</body> 
</html>