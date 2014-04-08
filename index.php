<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    echo "BLAH1";
    $conn = mysql_connect($server, $username, $password);
    if(!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($db);

    $eventData = array();
    $result = mysql_query("SELECT * FROM event")
        or die(mysql_error());
    //$row = mysql_fetch_array($result);
    while($row = mysql_fetch_assoc($result)){
        echo "Got row: \n";
        print_r($row);
        $eventData[] = $row;
    }
    echo "BLAH"; 
    //header('Content-Type: application/json');
    //echo json_encode($result);
    echo json_encode($eventData);
    //
    //mysql_close($conn);
?>
