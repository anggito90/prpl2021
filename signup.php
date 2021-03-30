<?php

/**
 * SignUp
 * 
 */
class SignUp
{
    /**
     * Send an email to new user
     */
    function sendEmail()
    {
        $to = $email
        $subject = 'Your account has been created';
        $message = 'Hi $username 
        Your account has been succesfully created
        Please enjoy
        Sweng-academy team';
        $headers = 'From:noreply@sweng-academy.com';
        mail($to, $subject, $message, $headers);
    }

    function inputValidation($email, $password)
    {
        if (empty($email) || empty($password)) {
            return 'Username or password is empty!';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format!";
        }
        if (strlen($password) < 6) {
            return "Your Password Must Contain At Least 6 Characters!";
        }
        if (!preg_match("#[0-9]+#", $password) && !preg_match("#[A-Z]+#", $password)) {
            return "Your Password Must Contain At Least 1 Number or capital letter! ";
        }
        
        session_start();
        $_SESSION['username'] = $email;
        header("location: dashboard.php");
    }
}