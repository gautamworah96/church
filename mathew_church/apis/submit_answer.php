<?php
include '../include/db_connect.php';

session_start();
$_GET['user_id'] = $_SESSION["user_id"];

if($_GET['user_id'] != null  && $_GET['quest_id'] != null && $_GET['points'] != null ) {
    $user = $_GET["user_id"];
    $question = $_GET["quest_id"];
    $points = $_GET["points"];
    $sql = "select * from quiz_answers where user_id = ".$user." AND questions_id = ".$question;
    $result = $conn->query($sql);
//    var_dump($result);
    if($result->num_rows == 0){
        $sql = "insert into quiz_answers (user_id,questions_id,points) VALUES (".$user.",".$question.",".$points.")";
        $result = $conn->query($sql);
        $response->success =  1;

    }
    else{

        $response->success =  0;
        $response->error = "Already Answered";

    }
    echo json_encode($response);

}
else{
    echo "Invalid use of API";
}
?>