<?php
session_start();

// Include functions and database connection
require_once("functions.php");
$db = connectDatabase();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = validateForm($_POST);
    
    if (empty($errors)) {
        $name = sanitizeInput($_POST["name"]);
        $email = sanitizeInput($_POST["email"]);
        $message = sanitizeInput($_POST["message"]);

        // Insert form data into the database
        insertProject($db, $name, $email, $message);
    }
}
?>
