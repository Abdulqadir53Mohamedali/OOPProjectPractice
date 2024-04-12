<?php

include_once '../connection/connection.php';

?>


<?php
class register extends database {
    private $values = [];
    private $errors = array();

    public function  __construct($email, $passwrd, $confirmPassword, $lastName, $firstName) {
        // Assign value
        $this->values = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'passwrd' => $passwrd,
            'confirmPassword' => $confirmPassword,
        ];
    }

    private function emailCheck() {
        $sql_query = "SELECT Email FROM user WHERE Email = ?";
        $result = $this->connect()->prepare($sql_query);
        $result->execute([$this->values["email"]]);
        return $result->rowCount() > 0;
    }

    private function registration() {
        $passwordHash = password_hash($this->values["passwrd"], PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare("INSERT INTO  user(Email,Passwrd,firstName,lastName) VALUES(?,?,?,?)");
        $stmt->execute([$this->values["email"], $passwordHash, $this->values["firstName"], $this->values["lastName"]]);
    }


    public function validation() {

        if (!filter_var($this->values["email"], FILTER_VALIDATE_EMAIL) || empty($this->values["email"]) || $this->emailCheck()) {
            array_push($this->errors, "email");
        }
        if (
            strlen($this->values["passwrd"]) < 7 ||
            !ctype_alnum($this->values["passwrd"]) ||
            empty($this->values["passwrd"])
        ) {
            array_push($this->errors, "passwrd");
        }

        if ($this->values["confirmPassword"] != $this->values["passwrd"] || empty($this->values["confirmPassword"])) {
            array_push($this->errors, "confirmPassword");
        }
        if (strlen($this->values["firstName"]) < 2  || !ctype_alpha($this->values["firstName"]) || empty(($this->values["firstName"]))) {
            array_push($this->errors, "firstName");
        }
        if (strlen($this->values["lastName"]) < 2  || !ctype_alpha($this->values["lastName"]) || empty(($this->values["lastName"]))) {
            array_push($this->errors, "lastName");
        }

        if (empty($this->errors)) {
            $this->registration();
            setcookie("userID", $this->getID(), time() + (86400 * 30), "/");
            header("location:info.php");
            exit();
        }
    }

    public function getID() {
        $stmt = $this->connect()->prepare("SELECT UserID FROM user WHERE Email = ?");
        $stmt->execute([$this->values["email"]]);
        return $stmt->fetch()["UserID"];
    }

    public function isInvalid($type) {
        return in_array($type, $this->errors) ? 'is-invalid' : 'is-valid';
    }

    public function keepText($type) {
        echo isset($_POST[$type]) ? $_POST[$type] : '';
    }
}

?>