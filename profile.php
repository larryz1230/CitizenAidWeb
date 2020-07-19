<?php
    
if ($_SERVER['REQUEST_METHOD']== 'POST'){

    $email = $_POST ['email'];
    $description = $_POST ['description'];
    $type = $_POST ['type'];
    $name = $_POST ['name'];


    require_once 'connect.php';


    // $sql = "UPDATE citizen_aid_table SET description= '$description' WHERE email= '$email'";

    $sql = "UPDATE citizen_aid_table SET description= '$description', type= '$type', name = '$name' WHERE email= '$email'";

    // $sql = "UPDATE citizen_aid_table SET type= '$type' WHERE email= '$email'";


    if (mysqli_query($conn, $sql)) {

        $result["success"] = "1";
        $result ["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        // $sql = "UPDATE users_table SET textmessage= $textmessage WHERE id=20";
        $result["success"] = "0";
        $result ["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }


}


?>