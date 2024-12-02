<?php

session_start(); 

require_once('../includes/dbh.inc.php');

// Variable to store the success or error message
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the email input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Prepare the SQL statement to insert email into waitlist
        $stmt = $conn->prepare("INSERT INTO waitlist (email) VALUES (?)");

        if (!$stmt) {
            // Prepare failed, redirect with error
            header("Location: ../index.php?status=error&message=An unexpected error occurred. Please try again later.");
            exit();
        } else {
            $stmt->bind_param("s", $email);

            // Try to execute the query
            try {
                if ($stmt->execute()) {
                    // Success: Redirect with success message
                    header("Location: ../index.php?status=success&message=Thank you! Your email has been added to the waitlist.");
                    exit();
                } else {
                    // Failure: Redirect with error message
                    header("Location: ../index.php?status=error&message=An unexpected error occurred. Please try again later.");
                    exit();
                }
            } catch (mysqli_sql_exception $e) {
                // Catch duplicate entry error (1062 is the code for duplicate entries)
                if ($e->getCode() === 1062) {
                    header("Location: ../index.php?status=error&message=This email is already on the waitlist.");
                    exit();
                } else {
                    header("Location: ../index.php?status=error&message=An unexpected error occurred. Please try again later.");
                    exit();
                }
            }
            
        }
    } else {
        // Invalid email, redirect with error message
        header("Location: ../index.php?status=error&message=Invalid email address.");
        exit();
    }
}




