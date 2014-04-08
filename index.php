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
    

    //return a JSON object with all the rows from events
    //$sth = mysql_query("SELECT * FROM Event");
    //$rows = array();
    //while($r = mysql_fetch_assoc($sth)) {
    //    $rows[] = $r;
    //}
    $sql = "SELECT * FROM Event"
    $retval = mysql_query($sql, $conn);
    if(! $retval )
    {
       die('Error: ' . mysql_error());
    }
    $eventData = array();
    $result = mysql_query("SELECT * FROM event")
        or die(mysql_error());
    //$row = mysql_fetch_array($result);
    while($row = mysql_fetch_assoc($result)){
        echo "Got row: \n";
        print_r($row);
        $eventData[] = $row;
    }
    
    //header('Content-Type: application/json');
    //echo json_encode($result);
    echo json_encode($eventData);
    //
    //mysql_close($conn);
?>
