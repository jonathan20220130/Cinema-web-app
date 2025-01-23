<?php 
require_once __DIR__ . "/../config/config.php"; 
require_once __DIR__ . "/../libs/App.php";

class Users
{
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $password;
    private $age;
    private $app;


    public function __construct() {
        $this->app = new App();
    }



    private function isLegal()
    {
        return $this->age >= 16;
    }

    public function creatAccount($firstName, $lastName, $username, $email, $password, $age)
    {
        $this->app->connect();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;

        if (!$this->isLegal()) {
            throw new Exception("User must be at least 16 years old.");
        }

        $query = "INSERT INTO users (firstName, lastName, username, email, password, age) 
            VALUES (:firstName, :lastName, :username, :email, :password, :age)";


        $array = [
            ":firstName"=> $this->firstName,
            ":lastName" => $this->lastName,
            ":username" => $this->username,
            ":email" => $this->email,
            ":password" => $this->password,
            ":age" => $this->age,
        ];

        $path = "login.php";
        
        $this->app->register($query, $array, $path);
    }




    public function logAccount($email, $password)
    {
        $query = "SELECT * FROM users WHERE email='$email'";

        $data = [
            "email" => $this->email,
            "password" => $this->password
        ];
 
        $this->app->login($query, $data);

    }






    public function isUsernameTaken($username)
    {
        $query = "SELECT username FROM users WHERE username = :username";
        $result = $this->app->selectOne($query);
    
        if ($result && $result->username == $username) {
            return true;
        }
        return false;
    }
    

    // Getter methods


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Other getter and setter methods...

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAge()
    {
        return $this->age;
    }

    // Setter methods
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

}
