<?php

include_once '..//connection/connection.php';

?>


<?php
    class login extends database
    {
        private $email;
        private $passwrd;

        public function  __construct($email, $passwrd){
            
            $this->email = $email;
            $this->passwrd = $passwrd;
        }



        private function FetchEmail(){

            $resultEmail =  $this ->connect()-> prepare("SELECT * FROM  user WHERE Email = ?");
            // $resultEmail = $resultEmail->execute([$this->email]);
    
            $resultEmail -> execute([$this->email]);
            return $resultEmail->rowCount() > 0;
    
        }

        private function startSession() {
            // session_status()  returns the status of the current session. , if it equals null/ false etc then it starts a session
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }

        private function finaliseLogin(){
            $this -> startSession();
            $_SESSION['email'] = $this->email;
            $_SESSION['user_logged_in'] = true;
            // $this->Cookies();
            header("Location:homepage.php"); // Redirect to a success page
    
        }

        private function FetchPassword(){
            $passwordFetch = "SELECT Passwrd FROM user WHERE Email = ?";
            $resultPassword = $this ->connect()->prepare($passwordFetch);
            $resultPassword->execute([$this->email]);
            // return $resultPassword;
    
            // this stores the decrypted password / holds it 
            $row = $resultPassword->fetch();
            if ($row !== false) {
                return password_verify($this->passwrd, $row['Passwrd']);
            } else {
                // Handle the case where no password is returned (e.g., email not found)
                return false;
            }
            
    
    
        }



        public function validation(){

            $errors = [];
            $FetchingPassword = $this->FetchPassword();
    
            if(empty($this->email) || !filter_var($this->email,FILTER_VALIDATE_EMAIL) || !$this->FetchEmail()){
                $errors['email']= "Email invalid or does not exist";
            }
    
            if(empty($this->passwrd)|| $FetchingPassword === false){
                $errors['password']= "Invalid password";
            }
    
            if (empty($errors)) {
                $this->finaliseLogin();
                header("Location: homepage.php"); // Redirect to a success page
                exit();
            }
    
            return ['errors' => $errors];
            
    
        }

        public function isInvalid($validationResult,$type){
            return !empty($validationResult['errors']["$type"]) ? 'is-invalid' : 'is-valid';
        }
        
        public function errorMessageDisplay($validationResult,$type){
            if(!empty($validationResult['errors'][$type])){
                return $validationResult[ 'errors'][$type] ;
            }
        }

        public function keepText($type){
            echo isset($_POST["$type"]) ? htmlspecialchars($_POST["$type"]) : '';
        }

        



    }

?>