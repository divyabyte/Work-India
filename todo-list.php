<?php
    $con = mysqli_connect("localhost","root","empire123","todo-list");
    if ($con)
    {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $due_date = $_POST['due_date'];
            $agent_id = $_GET['agent_id'];

            $res = "INSERT INTO list (title, description, category,due_date,agent_id) VALUES ('$title','$description','$category','$due_date','$agent_id')";
            mysqli_query($con, $res);

            $res1 = "SELECT * FROM list WHERE agent_id = '$agent_id'";
            $result = $con->query($res1);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $title= $row["title"];
                    $description = $row["description"];
                    $category = $row["category"];
                    $due_date = $row["due_date"];


                    $t = $title;
                    $d = $description;
                    $c = $category;
                    $due = $due_date;

                }

                $messgae = 'account created';
                $status = 200;
            }
            $requestData = array(
                'title' => $t,
                'description' => $d,
                'category' => $c,
                'due_date' => $due
            );
            $responseData = array(
                'status' => $status,
                'status_message' => $messgae
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
        
            
    }
?>