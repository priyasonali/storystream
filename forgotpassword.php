<?php
    require 'class.jwt.php';

    $authHeader = apache_request_headers()["authorization"];
    $token = JWT::decode($authHeader, enchanted);
    echo $token->user_id;

?>
