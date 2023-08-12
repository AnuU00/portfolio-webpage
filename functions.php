<?php
function connectDatabase() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_form";

    return new mysqli($host, $username, $password, $dbname);
}

function validateForm($data) {
    $errors = [];

    // Validate and sanitize name
    if (empty($data["name"])) {
        $errors[] = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $data["name"])) {
        $errors[] = "Only letters and spaces allowed in the name";
    }

    // Validate email
    if (empty($data["email"])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Sanitize message
    $data["message"] = sanitizeInput($data["message"]);

    return $errors;
}

function sanitizeInput($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

function insertProject($db, $name, $email, $message) {
    $stmt = $db->prepare("INSERT INTO projects (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    $stmt->close();
}
?>
