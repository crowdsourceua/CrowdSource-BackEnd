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
    //$query = "SELECT * FROM Questions WHERE 1 = eventID"; 
    

    //$retval = mysql_query($query) or trigger_error(mysql_error()." in ".$query);
    //$row = mysql_fetch_row($retval);
    //echo json_encode($row);

    $questionData = array();
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_assoc($result)){
        $questionData[] = $row;
    }
    echo json_encode($questionData);


?>
