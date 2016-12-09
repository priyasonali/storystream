
<?php
// Project: Story Stream
    header("Content-type: application/json");
    require 'class.database.php';
    require 'class.errorlist.php';
    $response = array();
    

    class Signin{

        public function __construct($uname, $upass) {
        
            $this->user_name = $uname;
            $this->user_pass = $upass;

        }

        public function pulldata(){  
            $db = new Database;
            $mysqli = $db->connect();
            $errnum = new ErrorList;

            $user_name = $mysqli->real_escape_string($this->user_name);

            if($this->user_name != null && $this->user_pass != null){

                $result = $mysqli->query("SELECT * FROM users WHERE user_name='$user_name'");
                $row = $result->fetch_assoc();
                $user = $row['user_name'];
                $pass = $row['user_pass'];
                
                if($user == $user_name && $pass == $this->user_pass && $result->num_rows > 0){
                    $response["status"] = "Logged in";
                }
                else{
                    $response["status"] = "Failed";
                }

            } else {
                $response["error"]["err_code"] = 2;
                $response["error"]["err_desc"] = $errnum->errlist[2]; 
            }
                          
            $mysqli -> close();
            return json_encode($response, JSON_PRETTY_PRINT);
        }
        
    }

    $check = new Signin($_REQUEST["user_name"],$_REQUEST["user_pass"]);
    echo $check->pulldata();
    
?>