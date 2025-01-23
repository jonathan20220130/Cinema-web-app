<?php
require_once __DIR__ . "/../config/config.php";
//require_once __DIR__ . "/../Modules/User.php"; 



// if (!isset($_SERVER['HTTP_REFERER'])) {
//     // redirect them to your desired location
//     echo "<script>window.location.href='http://localhost/Cimooz'</script>";
//     exit;
// }


class App
{
    public $host = HOST;
    public $dbname = DBNAME;
    public $userName = USERNAME;
    public $db_password = PASSWORD;


    public $link;

    public function __construct()
    {
        $this->connect();
    }


    public function connect()
    {
        if ($this->link) {
            echo "connected";
        }

        try {
            $this->link = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->userName,
                $this->db_password
            );

            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected Successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectAll($quey)
    {

        //$rows = $this->link->prepare($quey);
        $rows = $this->link->query($quey);
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

        if ($allRows) {
            return $allRows;
        } else {
            return false;
        }
    }



    //select one row
    public function selectOne($query)
    {

        $row = $this->link->query($query);
        //$rows = $this->link->query($quey);
        $row->execute();

        $singleRow = $row->fetch(PDO::FETCH_OBJ);

        if ($singleRow) {
            return $singleRow;
        } else {
            return false;
        }
    }

    public function validate($arr)
    {
        if (in_array("", $arr)) {
            return false;
        } else {
            return true;
        }
    }



    public function validateCartItems($q)
    {
        $row = $this->link->query($q);
        $row->execute();
        $count = $row->rowCount();
        return $count;
    }




    public function insert($query, $arr, $path)
    {
        if (!$this->validate($arr)) {
            echo "<script> alert('One or more inputs are empty')</script>";
        } else {
            $insert_record = $this->link->prepare($query);
            $insert_record->execute($arr);

            if (!empty($path)) {
                echo "<script>window.location.href='" . $path . "'</script>";
            }
        }
    }



    public function update($query, $arr, $path)
    {
        if (!$this->validate($arr)) {
            echo "<script> alert('One or more inputs are empty')</script>";
        } else {
            $update_record = $this->link->prepare($query);
            $update_record->execute($arr);

            echo "<script>window.location.href='" . $path . "'</script>";
        }
    }


    public function delete($query, $path)
    {

        $delete_record = $this->link->query($query);
        $delete_record->execute();

        echo "<script>window.location.href='" . $path . "'</script>";
    }


    public function register($query, $arr, $path)
    {
        if (!$this->validate($arr)) {
            echo "<script> alert('One or more inputs are empty')</script>";
        } else {
            $register_user = $this->link->prepare($query);
            $register_user->execute($arr);

            echo "<script>window.location.href='" . $path . "'</script>";
        }
    }

    public function login($query, $data, $path)
    {
        $login_user = $this->link->query($query);
        $login_user->execute();

        $fetch = $login_user->fetch(PDO::FETCH_ASSOC);

        if ($login_user->rowCount() > 0) {
            if (password_verify($data['password'], $fetch['password'])) {
                # start session vars
                $_SESSION['firstName'] = $fetch['firstName'];
                $_SESSION['lastName'] = $fetch['lastName'];
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['user_id'] = $fetch['id'];
                $_SESSION['password'] = $fetch['password'];
                $_SESSION['email'] = $fetch['email'];


                echo "<script>window.location.href='" . $path . "'</script>";
            }
        }
    }

    public function login_admin($query, $data, $path)
    {
        $login_user = $this->link->query($query);
        $login_user->execute();

        $fetch = $login_user->fetch(PDO::FETCH_ASSOC);

        if ($login_user->rowCount() > 0) {
            if (password_verify($data['password'], $fetch['password'])) {
                # start session vars
                // $_SESSION['firstName'] = $fetch['firstName'];
                // $_SESSION['lastName'] = $fetch['lastName'];
                $_SESSION['admin_name'] = $fetch['admin_name'];
                $_SESSION['admin_id'] = $fetch['id'];
                // $_SESSION['password'] = $fetch['password'];
                $_SESSION['email'] = $fetch['email'];
                //echo "<script>window.location.href='" . APP_URL . "'</script>";

                //echo "<script>alert('Logged Successfully!')</script>";

                echo  "<script>alert('$_SESSION[admin_name]')</script>";
                echo "<script>window.location.href='" . ADMIN_URL . "'</script>";


            } else {
                echo "<script>alert('Email or Password is Wrong!')</script>";
    
            }
        }
        else {
            echo "<script>alert('Email or Password is Wrong!')</script>";

        }
    }

    public function startingSession()
    {
        session_start();
    }

    public function validateSession()
    {
        if (isset($_SESSION['user_id']))
            echo "<script>window.location.href='" . APP_URL . "'</script>";
    }


    public function validateAdminSession()
    {
        if (isset($_SESSION['admin_id']))
            echo "<script>window.location.href='" . ADMIN_URL . "'</script>";
    }
    public function validateAdminSessionInside()
    {
        if (!isset($_SESSION['admin_id']))
            echo "<script>window.location.href='" . ADMIN_URL . "/admins/login-admins.php'</script>";
    }

    function sanitize_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }




    private function generateSeatNumbers($rows, $columns)
    {
        $seats = [];
        $rowLetters = range('A', 'Z');

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 1; $j <= $columns; $j++) {
                $seats[] = $rowLetters[$i] . $j;
            }
        }

        return $seats;
    }


    public function generate_seats($movieId, $available_seats)
    {

        $rows = $available_seats / 2 ;
        $columns = $available_seats - $rows;

        // Generate seat numbers
        $seatNumbers = $this->generateSeatNumbers($rows, $columns);

        foreach ($seatNumbers as $seatNumber) {
            $query = "INSERT INTO seats (movie_id, seat_number) VALUES (:movie_id, :seat_number)";

            $array = [
                ":movie_id" => $movieId,
                ":seat_number" => $seatNumber
            ];

            $this->insert($query, $array, "");
        }

        echo "Seats inserted successfully!";
    }
}
