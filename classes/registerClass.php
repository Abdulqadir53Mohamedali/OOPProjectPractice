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

    public function registration() {
        $passwordHash = password_hash($this->passwrd, PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO  user(Email,Passwrd,firstName,lastName) VALUES(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql_query);
        $stmt->execute([$this->email, $passwordHash, $this->firstName, $this->lastName]);
    }


    public function validation() {

        $errors = [];
        $MinimumNamelength = 2;
        $MinimumPasswordlength = 7;
        $firstName = $lastName = $email = $passwrd = $confirmPasswrd = ""; // friday every time



        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) || empty($this->email) || $this->emailCheck()) {
            $errors["email"] =  "Invalid email or email already exists";
        }
        // potnetially move email check otuside this 
        if (
            strlen($this->passwrd) < $MinimumPasswordlength ||
            !ctype_alnum($this->passwrd) ||
            empty($this->passwrd)
        ) {

            $errors["password"] = "Invalid password";
        }

        if ($this->confirmPassword != $this->passwrd || empty($this->confirmPassword)) {
            $errors["confirmPassword"] = "The passwords do not match."; // friday
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
        // could also use array_filter to check for empty errors array
        
        if(empty($errors)){
            
            $this->registration();
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

<!-- 

Refactor your connect method to be static as well, then you can use self::connect() instead of $this->connect().

If making connect static is not an option, you can indeed create an object within the static method and then use that object to call connect, like so:






 -->

<!-- 
    In PHP, an expression is anything that has a value. For example:

"$a + $b" is an expression whose value is the sum of $a and $b.
A function call that returns a value, like myFunction(), is also an expression.
The isset() function is meant to be used with variables, not with the result of expressions. 
For example, isset($a) is valid, but isset($a + $b) is not because isset() cannot determine
 if the result of $a + $b is set.
 -->

 <!-- 
    If you're getting an "expression" error, it might be because of something else in the 
    surrounding code. Double-check that you're not using isset() on an actual expression 
    somewhere else. If the line you provided is what's causing the error, 
    ensure that there are no syntax errors and that $_POST['submitBtn'] 
    is indeed a variable that can be checked with isset().
  -->