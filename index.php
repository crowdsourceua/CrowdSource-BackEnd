<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($db);



    //JSON object for events table
    $eventData = array();
    $result = mysql_query("SELECT * FROM event")
        or die(mysql_error());
    //$row = mysql_fetch_array($result);
    while($row = mysql_fetch_assoc($result)){
        $eventData[] = $row;
    }
    
    echo json_encode($eventData);
?>
