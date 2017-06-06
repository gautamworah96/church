var over ;
var correct ;
var timer;
var counter;
var category;
var maxpoints ;
var question_id;
var user_id;
var totalpoint;
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal1').modal({  dismissible:false });

});

function loadquestions(quiz,cat,points) {
    maxpoints = points;
    over = 0;
    category = cat;
    totalpoint = points;
    //console.log("CALLED THE FUNCTION");
    $('#modal1').modal('open');
    $('#submit_btn').text('SUBMIT');
    $('#question_info').html("Cat: "+cat+"<br> Points: "+points);
    $('input[type=radio][name="group1"]').prop('disabled', true);

    for(i =0 ;i <4 ;i++){
        $("#op"+i).css('color', ' black');
        $("#op"+i).text('Loading');
        $('input[type=radio][name="group1"][value=' + i + ']').prop('checked', false);


    }
    $('#your_points').text("Your Points:"+0);

    $("#question_en").text('Loading');
    $("#question_ml").text('Loading');

    var qdata={"category":cat,"point":points,"quiz_id": quiz};
    over = 0;
    $.ajax({
        url: 'apis/get_question.php',
        type: 'GET',
        data: qdata,
        dataType: 'json',
        success: function(data, status) {
            console.log(data);
            if(data.success == 1) {
                question_id = data.question.id;
                $('input[type=radio][name="group1"]').prop('disabled', false);
                $("#question_en").text(data.question.english + " ?");
                $("#question_ml").text(data.question.malyalam) + " ?";
                for (i = 0; i < data.options.length; i++) {
                    $("#op" + i).html(data.options[i].eng + "<br>" + data.options[i].ml);
                    var theDiv = $("#op" + i).data('op_no', i);
                    $("#op" + i).css('color', ' black');
                    if (data.options[i].corr == "1")
                        correct = i;
                }

                if (data.answers!=null){

                    $('#your_points').text("Your Points:"+data.answers.points);
                    $("#op" + correct).css('color', 'green');
                    $('#submit_btn').text('CLOSE');
                    $('input[type=radio][name="group1"]').prop('disabled', true);
                    over = 1;
                    $('input[type=radio][name="group1"][value=' + correct + ']').prop('checked', true);

                }
                else{
                    timer = 60;
                    $('#qtimer').text(timer);
                    counter = setInterval(myTimer, 2000);
                }


            }
            else {
                timer = 60;
                $('#qtimer').text(timer);
                $('#submit_btn').text('CLOSE');

                $('input[type=radio][name="group1"]').prop('disabled', true);
                over =1 ;
            }
        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });


}

function myTimer(){
    timer --;
    $('#qtimer').text(timer);
    if(timer <= 0){
        over =1;
        $("#modal_btn").html("CLOSE");
        clearInterval(counter);
    }
}

function  submitanswer() {
    console.log("Submit Called");
    if(over == 0 ){
        console.log("Checking");
        var useran = $('input[name="group1"]:checked', '#myForm').val();
        if(useran != null) {
            if (useran == correct) {
                clearInterval(counter);
                $("#op" + useran).css('color', 'green');
                correctans();
            }
            else {
                $("op" + useran).attr('disabled', true);
                timer -= 20;
                maxpoints = 0.5 * maxpoints;
                if (timer <= 0) {
                    $("#modal_btn").html("CLOSE");
                    timer = 0;
                    clearInterval(counter);
                    endtimer();
                }
                $("#op" + useran).css('color', 'red');
                $('#qtimer').text(timer);
                $('input[type=radio][name="group1"][value=' + useran + ']').prop('disabled', true);
                $('input[type=radio][name="group1"][value=' + useran + ']').prop('checked', false);


            }
            console.log($('input[name="group1"]:checked', '#myForm').val());
        }
        else{
            console.log("No ans selected");
        }
    }
    else {
        //insertans(1,question_id,maxpoints)
        $('.modal1').modal('close');
    }
}

function endtimer() {
    $('#your_points').text("Your Points:"+0);
    $('input[name=group1]').attr("disabled",true);
    $('#submit_btn').text('CLOSE');
    $("#op"+correct).css('color', 'orange');
    over =1 ;

    $('#'+(category*1000+totalpoint)).removeClass('blue-grey').addClass('red');

   insertans(question_id,0)
}

function correctans(){
    $('#submit_btn').text('CLOSE');
    $('#your_points').text("Your Points:"+maxpoints);
    over =1;
    $('input[type=radio][name="group1"]').prop('disabled', true);
    console.log(category + "" + totalpoint);
    console.log(parseInt(category)*1000+parseInt(totalpoint));
    $('#'+(category*1000+totalpoint)).removeClass('blue-grey').addClass('green');

    insertans(question_id,maxpoints)


}

function insertans(q,p){
    var sdata = {quest_id: q , points : p};
    $.ajax({
        url: 'apis/submit_answer.php',
        type: 'GET',
        data: sdata,
        dataType: 'json',
        success: function(data, status) {
            console.log(data);

        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });
}


function formgrid(q) {
    console.log("Form Grid Called "+q);


    $.ajax({
        url: 'apis/load_quiz.php',
        type: 'GET',
        data: {quiz_id : q},
        dataType: 'json',
        success: function(data, status) {
            console.log(data);
            if(data.success == 1){
                for (i = 0 ; i < data.questions.length ; i++){
                    if(data.questions[i].p == 0){
                        cat = data.questions[i].category;
                        poi = data.questions[i].points; 
                        $('#'+(parseInt(cat*1000)+parseInt(poi))).removeClass('blue-grey').addClass('red');
                    }
                    else{
                        cat = data.questions[i].category;
                        poi = data.questions[i].points;
                        $('#'+(parseInt(cat*1000)+parseInt(poi))).removeClass('blue-grey').addClass('green');                    }
                }
            }

        },
        error: function(xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }
    });

}