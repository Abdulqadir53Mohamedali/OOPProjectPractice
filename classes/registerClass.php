<?php

include_once '../connection/connection.php';

?>


<?php
class register extends database {
    private $email;
    private $passwrd;
    private $confirmPassword;
    private $lastName;
    private $firstName;
    private $TC;

    public function  __construct($email, $passwrd, $confirmPassword, $lastName, $firstName, $TC) {

        $this->email = $email;
        $this->passwrd = $passwrd;
        $this->confirmPassword = $confirmPassword;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->TC = $TC;
    }


    private function emailCheck() {
        $sql_query = "SELECT Email FROM user WHERE Email = ?";
        $result = $this->connect()->prepare($sql_query);
        $result->execute([$this->email]);
        return $result->rowCount() > 0;
    }

    private function registration() {
        $passwordHash = password_hash($this->passwrd, PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO  user(Email,Passwrd,firstName,lastName) VALUES(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql_query);
        $stmt->execute([$this->email, $passwordHash, $this->firstName, $this->lastName]);
    }


    public function validation() {

        $errors = [];
        $MinimumNamelength = 2;
        $MinimumPasswordlength = 7;


        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) || empty($this->email) || $this->emailCheck()) {
            $errors["email"] = "Invalid email or email already exists";
        }
        if (
            strlen($this->passwrd) < $MinimumPasswordlength ||
            !ctype_alnum($this->passwrd) ||
            empty($this->passwrd)
        ) {

            $errors["password"] = "Invalid password";
        }

        if ($this->confirmPassword != $this->passwrd || empty($this->confirmPassword)) {
            $errors["confirmPassword"] = "The passwords do not match.";
        }
        if (strlen($this->firstName) < $MinimumNamelength  || !ctype_alpha($this->firstName) || empty(($this->firstName))) {
            $errors["firstName"] = "Invalid name entered ";
        }
        if (strlen($this->lastName) < $MinimumNamelength  || !ctype_alpha($this->lastName) || empty(($this->lastName))) {
            $errors["lastName"] = "Invalid name entered ";
        }

        if (!isset($this->TC)) {
            $errors["TC"] = "*required*";
        }

        if (empty($errors)) {
            $this->registration();
            header("location:login.php");
            exit();
        }

        return ['errors' => $errors];
    }

    public function isInvalid($validationResult, $type) {
        return !empty($validationResult['errors']["$type"]) ? 'is-invalid' : 'is-valid';
    }

    public function errorMessageDisplay($validationResult, $type) {
        if (!empty($validationResult['errors'][$type])) {
            return $validationResult['errors'][$type];
        }
    }

    public function keepText($type) {
        echo isset($_POST[$type]) ? $_POST[$type] : '';
    }
}

?>