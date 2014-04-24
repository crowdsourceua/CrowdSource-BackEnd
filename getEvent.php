<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn){ die('Could not connect: ' . mysql_error()); }
    mysql_select_db($db);

    //Event details:
    $query = "SELECT eventName, opponent, location, eventVenue, eventTime,description, date FROM Questions WHERE '$_GET[eventID]' = eventID";
    
    $retval = mysql_query($query) or trigger_error(mysql_error()." in ".$query);
    echo json_encode($retval); 

?>
