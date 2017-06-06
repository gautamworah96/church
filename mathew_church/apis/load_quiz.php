<?php

include '../include/db_connect.php';

session_start();
$user = $_SESSION["user_id"];

if($_GET['quiz_id'] != null){
    $quiz = $_GET['quiz_id'];
    $sql = "select q.points,q.category,a.points as p from questions as q INNER JOIN  quiz_answers as a ON q.id = a.questions_id WHERE a.user_id = ".$user." AND q.quiz_id =".$quiz;
    $result = $conn->query($sql);
    $questions = array();
    while($row = $result->fetch_assoc()){
        array_push($questions,$row);
    }
    $res->success =1;
    $res->questions = $questions;

    echo json_encode($res);
}
else{
    $res->success = 0;
    echo json_encode($res);
}
?>