<?php
    $con = mysqli_connect("localhost","root","empire123","todo-list");
    if ($con)
    { 
            $email = $_POST['mail'];
            $pass = md5($_POST['pass']);
            $res = "SELECT * FROM user WHERE email = '$email'";
            $result = $con->query($res);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["id"];
                    $mail = $row["email"];
                    $pass = $row["pass"];

                    $agent_id = $id;
                    $password = $pass;

                }

                $messgae = 'success';
                $status = 200;
            }
           
         else {
                 $messgae = "failure.";
                $status = 401;
            }

            $requestData = array(
                'agent_id' => $agent_id,
                'password' => $password
            );


            
            $responseData = array(
                'status' => $status,
                'status_message' => $messgae,
                'agent_id' => $agent_id
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
        
        
    }
?>