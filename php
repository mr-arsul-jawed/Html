<?php

$servername = "localhost";
$username = "root";
$password = "your_password"; // replace with your MySQL password
$dbname = "personal_info";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize input
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$dob = htmlspecialchars($_POST['dob']);
$gender = htmlspecialchars($_POST['gen']);
$father_name = htmlspecialchars($_POST['father-name']);
$mother_name = htmlspecialchars($_POST['mother-name']);
$phone = htmlspecialchars($_POST['Phone']);
$alternatenumber = htmlspecialchars($_POST['alternatenumber']);
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$subjects = implode(", ", array_keys(array_filter([
    'english' => isset($_POST['english']),
    'Biology' => isset($_POST['Biology']),
    'chemistry' => isset($_POST['chemistry']),
    'physics' => isset($_POST['physics']),
    'math' => isset($_POST['math']),
])));
$blood_group = htmlspecialchars($_POST['Blood']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO personal_info (firstname, lastname, dob, gender, father_name, mother_name, phone, alternatenumber, email, address, subjects, blood_group) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $firstname, $lastname, $dob, $gender, $father_name, $mother_name, $phone, $alternatenumber, $email, $address, $subjects, $blood_group);

// Execute statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and co
