<?php

session_start();
$_SESSION["user_id"] = 1;

?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/customgrid.css" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body onload="formgrid(<?php echo $_GET["quiz"] ?>)">
<!--Import jQuery before materialize.js-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/question.js"></script>


    <div class="row">
        <div class="col m10 s12">
            <div class="row">
                <div class="col s2 grid-example-cat blue offset-s1">
                    <span class="flow-text">Category 1</span>
                </div>
                <div class="col s2 grid-example-cat blue">
                    <span class="flow-text">Category 2</span>
                </div>
                <div class="col s2 grid-example-cat blue">
                    <span class="flow-text">Category 3</span>
                </div>
                <div class="col s2 grid-example-cat blue">
                    <span class="flow-text">Category 4</span>
                </div>
                <div class="col s2 grid-example-cat blue ">
                    <span class="flow-text">Category 5</span>
                </div>
                <div class="col s2 grid-example-res blue-grey offset-s1" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,1,100);" id="1100">
                    <span class="flow-text">100</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,2,100);" id="2100">
                    <span class="flow-text">100</span>
                </div>
                <div class="col s2 grid-example-res  blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,3,100);" id="3100">
                    <span class="flow-text">100</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,4,100);" id="4100">
                    <span class="flow-text">100</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,5,100);" id="5100">
                    <span class="flow-text">100</span>
                </div>


                <div class="col s2 grid-example-res blue-grey offset-s1" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,1,200);" id="1200">
                    <span class="flow-text">200</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,2,200);" id="2200">
                    <span class="flow-text">200</span>
                </div>
                <div class="col s2 grid-example-res  blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,3,200);" id="3200">
                    <span class="flow-text">200</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,4,200);" id="4200">
                    <span class="flow-text">200</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,5,200);" id="5200">
                    <span class="flow-text">200</span>
                </div>



                <div class="col s2 grid-example-res blue-grey offset-s1" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,1,300);" id="1300">
                    <span class="flow-text">300</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,2,300);" id="2300">
                    <span class="flow-text">300</span>
                </div>
                <div class="col s2 grid-example-res  blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,3,300);" id="3300">
                    <span class="flow-text">300</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,4,300);" id="4300">
                    <span class="flow-text">300</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,5,300);" id="5300">
                    <span class="flow-text">300</span>
                </div>




                <div class="col s2 grid-example-res blue-grey offset-s1" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,1,400);" id="1400">
                    <span class="flow-text">400</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,2,400);" id="2400">
                    <span class="flow-text">400</span>
                </div>
                <div class="col s2 grid-example-res  blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,3,400);" id="3400">
                    <span class="flow-text">400</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,4,400);" id="4400">
                    <span class="flow-text">400</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,5,400);" id="5400">
                    <span class="flow-text">400</span>
                </div>




                <div class="col s2 grid-example-res blue-grey offset-s1" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,1,500);" id="1500">
                    <span class="flow-text">500</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,2,500);" id="2500">
                    <span class="flow-text">500</span>
                </div>
                <div class="col s2 grid-example-res  blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,3,500);" id="3500">
                    <span class="flow-text">500</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,4,500);" id="4500">
                    <span class="flow-text">500</span>
                </div>
                <div class="col s2 grid-example-res blue-grey" onclick="loadquestions(<?php echo $_GET["quiz"] ?>,5,500);" id="5500">
                    <span class="flow-text">500</span>
                </div>

            </div>
        </div>

        <div class="col m2 s12">

        </div>
    </div>
<div id="modal1" class="modal1 modal1-fixed-footer">
    <div class="modal1-content">
        <div class="row">
            <div class="col s6">
                <h5 id = "question_info"></h5>
            </div>
            <div class="col s6 right-align">
                <h5 >Timer: <span id="qtimer"></span></h5>
            </div>
        </div>
        <div class=" card-panel indigo white-text">
            <h5>English :</h5>
            <H6 id="question_en">Loading</H6>
            <h5>മലയാളം :</h5>
            <h6 id="question_ml">Loading</h6>
        </div>
        <form id="myForm">
            <p>
                <input name="group1" type="radio" id="test1" value= "0"/>
                <label id ="op0" for="test1">Loading</label>
            </p>
            <p>
                <input name="group1" type="radio" id="test2" value = "1"/>
                <label id ="op1" for="test2">Loading</label>
            </p>
            <p>
                <input   name="group1" type="radio" id="test3" value = "2" />
                <label  id ="op2" for="test3">Loading</label>
            </p>
            <p>
                <input name="group1" type="radio" id="test4" value = "3" />
                <label id ="op3" for="test4">Loading</label>
            </p>
        </form>

    </div>
    <div class="modal1-footer">
        <a id="your_points" class="btn-flat green-text" disabled>Your Points: </a> <a  id="submit_btn" class=" btn" onclick="submitanswer();">SUBMIT</a>

    </div>
</div>



</body>
</html>


