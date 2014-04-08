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
    $sth = mysql_query("SELECT name FROM events");
    $rows = array();
    while($r = mysql_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    //$sql = "SELECT * FROM Event"
    //$retval = mysql_query($sql, $conn);
    //if(! $retval )
    //{
     //   die('Error: ' . mysql_error());
    //}
    
    
    header('Content-Type: application/json');
    echo json_encode($rows);
    //
    mysql_close($conn);
?>
