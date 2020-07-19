<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['email'];

    require_once 'connect.php';

    $sql = "SELECT * FROM citizen_aid_table WHERE email='$email' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['getprofile'] = array();


    
        
     $row = mysqli_fetch_assoc($response);

    // if ( email_verify($email, $row['email']) ) {
            
        $index['type'] = $row['type'];
        $index['description'] = $row['description'];
        $index['name'] = $row['name'];

            
        array_push($result['getprofile'], $index);


    if (mysqli_query($conn, $sql)) {

        $result["success"] = "1";
        $result ["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result ["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }

    echo $email;
}



?>