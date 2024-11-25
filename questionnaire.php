<?php

    session_start();
    require 'includes/dbh.inc.php';

    // function strip_bad_chars( $input ){
    //     $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
    //     return $output;
    // }

    // if (strlen($_SESSION['userUid'])==0) {
    //     header('location:../includes/logout.inc.php');
    //   } 
  
    //   else{
?>  
<?php
// Initialize page
$startpage = isset($_POST['page']) ? $_POST['page'] : 1;
$endpage = 11;

//Initialize score
$score = isset($_POST['score']) ? $_POST['score'] : 0;

if(isset($_POST['submit'])) {

    $questions = array('question1' => 'superglobal', 'question2' => 'formsubmission', 'question3' => 'declare', 'question4' => 'symbol', 'question5' => 'statement', 'question6' => 'division', 'question7' => 'codeans', 
                'question8' => 'email', 'question9' => 'super', 'question10' => 'switch');

    foreach($questions as $questionkey => $questionvalue) {
        $questionpost = isset($_POST[$questionvalue]) ? $_POST[$questionvalue] : '';

            if($questionkey == 'question'.$startpage && empty($questionpost)) {
                $errormsg = 'Please select an answer for '. $questionkey;
                echo $errormsg . '<br />';
            }
    }

    //Answers
    $answers = array('question1' => 'if', 'question2' => 'post', 'question3' => '$a', 'question4' => ';', 'question5' => '3', 'question6' => '%', 'question7' => 'infinite', 'question8' => 'mail', 
            'question9' => array('get', 'post', 'request'), 'question10' => array('break'));


    //Loop through post array
    foreach($questions as $questionkey => $questionvalue) {
        // echo $postkey. '=' .$postvalue;

    if(!empty($_POST[$questionvalue]) && $questionkey == 'question'.$startpage) {

    //Loop through answers
    foreach($answers as $key => $value) {

        if(is_array($value)) {
            foreach($value as $arraykey => $arrayvalue) {

                if($questionkey == $key && $_POST[$questionvalue][$arraykey] == $arrayvalue) {
                    // echo $key. '=' .$arrayvalue;
                    echo 'Your answer for '. $questionkey .' was correct';
                        $startpage = $startpage + 1;
                        $score = $score + 1;
                    break;
                }

                else if($questionkey == $key && $_POST[$questionvalue][$arraykey] != $arrayvalue) {
                    echo 'Your answer for '. $questionkey .' was incorrect';
                    echo $_POST[$questionvalue][$arraykey];
                    break;
                }
            }
        }

        else {
            if($questionkey == $key && $_POST[$questionvalue] == $value) {
                // echo $key. '=' .$value. '<br />'; 
                echo 'Your answer for '. $questionkey .' was correct';
                    $startpage = $startpage + 1;
                    $score = $score + 1;
                    // echo $questionkey;
                    // echo $key;
                break;
            }

            else if($questionkey == $key && $_POST[$questionvalue] != $value) {
                echo 'Your answer for '. $questionkey .' is incorrect';
                // echo $questionvalue;
                // echo $questionkey;
                // echo $key;
                break;
            }
        }

        }
    }

    }

    //Debug
    // print_r($_POST);

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
    <title>Questionnaire</title>
</head>
<body>

<h1>Questionnaire</h1>
<p>This is a sample questionnaire that you can take and evaluate your results. Below are some tips</p>
<ol>
    <li>This questionnaire has total of 10 questions</li>
    <li>Each question is worth 1 point totalling 10 points</li>
    <li>There are 8 multiple choice and 2 multi-select questions</li>
    <li>At the end of the questionnaire, you'll be presented with your score</li>
</ol>

<form name="questionnaire" method="post" action="questionnaire.php">

    <?php

    echo 
        '<input type="hidden" name="page" value="'. $startpage. '">';
    echo
        '<input type="hidden" name="score" value="' . $score .'">';


        switch($startpage) {

        case(1):
            echo
                '<div> Question 1. Which one of these is a super global? <br />

                    <input type="radio" name="superglobal" value="if">if
                    <input type="radio" name="superglobal" value="and">and
                    <input type="radio" name="superglobal" value="get">GET
                    <input type="radio" name="superglobal" value="array">array
                </div>';
        break;


        case(2):
            echo
                '<div> Question 2. Which one of these hides the values when submitting a form? <br />
                    <input type="radio" name="formsubmission" value="get">GET
                    <input type="radio" name="formsubmission" value="send">SEND
                    <input type="radio" name="formsubmission" value="parcel">PARCEL
                    <input type="radio" name="formsubmission" value="post">POST
                </div>';
        break;

        case(3):
            echo
                '<div> Question 3. Select which one these is the correct way of declaring a variable? <br />
                    <input type="radio" name="declare" value="a">a
                    <input type="radio" name="declare" value="$a">$a
                    <input type="radio" name="declare" value="%a">%a
                    <input type="radio" name="declare" value="%a">%a
                </div>';
        break;

        case(4):
            echo
                '<div> Question 4. Which symbol would you have at the end of a statemement <br />
                    <input type="radio" name="symbol" value=";">;
                    <input type="radio" name="symbol" value="#">#
                    <input type="radio" name="symbol" value="*">*
                    <input type="radio" name="symbol" value="/">/
                </div>';    
        break;

        case(5):
            echo
                '<div> Question 5. Select which one of these statements is true? <br />
                    <input type="radio" name="statement" value="2">a++ equals to 2 if a is 1
                    <input type="radio" name="statement" value="3">++a is equals to 3 if a is 2
                    <input type="radio" name="statement" value="divide">\ is the symbol for divisions
                    <input type="radio" name="statement" value="zero">0 is the value that represents true
                </div>';
        break;

        case(6):
            echo
                '<div> Question 6. Which symbol gives the remainder in a division? <br />
                    <input type="radio" name="division" value=")">)
                    <input type="radio" name="division" value="}">}
                    <input type="radio" name="division" value="%">%
                    <input type="radio" name="division" value=";")>;
                </div>';
        break;

        case(7):
            echo
                '<div> Question 7. What will the code below return <br />
                    <pre>
                        $a=1
                        while($a < 10) {
                            echo $a;
                        }
                    </pre>
                    <input type="radio" name="codeans" value="one">1
                    <input type="radio" name="codeans" value="zero">0
                    <input type="radio" name="codeans" value="infinite">infinite loop
                    <input type="radio" name="codeans" value="3">3
                </div>';
        break;

        case(8):
            echo
                '<div> Question 8. What function can you use to send an email <br />
                    <input type="radio" name="email" value="mail">mail
                    <input type="radio" name="email" value="email">email
                    <input type="radio" name="email" value="mailto">mailto
                    <input type="radio" name="email" value="send">send
                </div>';
        break;

        case(9):
            echo
                '<div> Question 9. Which of the following are super-globals?<br />
                    <input type="checkbox" name="super[]" value="get">GET
                    <input type="checkbox" name="super[]" value="post">POST
                    <input type="checkbox" name="super[]" value="request">REQUEST
                    <input type="checkbox" name="super[]" value="process">PROCESS
                </div>';
        break;

        case(10):
            echo
                '<div> Question 10. Which of the following are true to exit a switch statement? <br />
                    <input type="checkbox" name="switch[]" value="exit">exit
                    <input type="checkbox" name="switch[]" value="die">die
                    <input type="checkbox" name="switch[]" value="drop">drop
                    <input type="checkbox" name="switch[]" value="break">break
                </div>';
        break;

        case(11):
            echo 'Congratulations, you have completed the test and you scored.'. $score;
        break;
    }
    ?>

    <?php

    if($startpage < $endpage) {
        echo '<div><input type="submit" name="submit" value="submit"></div>';
    }

    ?>
</form>

</body>
</html>