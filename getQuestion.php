<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn){ die('Could not connect: ' . mysql_error()); }
    mysql_select_db($db);

    $query = "SELECT question, choiceA, choiceB, choiceC, choiceD, correctAnswer FROM Questions WHERE '$_GET[eventID]' = eventID Limit 1";
    //$query = "SELECT question, choiceA, choiceB, choiceC, choiceD, correctAnswer FROM Questions WHERE '$_GET[eventID]' = eventID AND alive > 0 AND '$_GET[questionType]' = questionType Limit 1";

    //"Kill" question to prevent it being used again 
    //$sql = "UPDATE questions SET alive = 0 WHERE '$_GET[eventID]' = eventID";
    //mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);

    //Return 1 row as result for getQuestion()
    $res = mysql_query($query) or trigger_error(mysql_error()." in ".$query);
    //echo json_encode($retval); 
    //echo $retval
    $fields = array();
    while($x = mysql_fetch_assoc($res)){
        $fields[] = $x['Field']
    } 
    echo $fields


?>
