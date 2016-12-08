
<?php
// Project: Story Stream
    header("Content-type: application/json");
    require 'class.database.php';
    $response = array();
    

    class Users{

        public function __construct($uemail, $uname, $upass) {
        
            $this->user_email = $uemail;
            $this->user_name = $uname;
            $this->user_pass = $upass;

        }

        public function pushdata(){  
            $db = new Database;
            $mysqli = $db->connect();

            //if(!$mysqli) echo "not connected"; else echo "connected";
             
            if($result = $mysqli->query("INSERT INTO users (user_email, user_name, user_pass, user_status) VALUES ('$this->user_email', '$this->user_name', '$this->user_pass', 'Pending')"))
            {
                $response["status"] = "Success"; 
            }
            else                
            { 
                $response["status"] = "Failed"; 
            }
            $mysqli -> close();
            return json_encode($response, JSON_PRETTY_PRINT);
        }
        
    }

    $check = new Users($_REQUEST["user_email"],$_REQUEST["user_name"],$_REQUEST["user_pass"]);
    echo $check->pushdata();
    
?>