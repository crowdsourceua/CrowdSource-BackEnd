<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    mysql_connect($server, $username, $password);
    mysql_select_db($db);
    

    //return a JSON object with all the rows from events
    $sth = mysql_query("SELECT name FROM events");
    $rows = array();
    while($r = mysql_fetch_assoc($sth)) {
        $rows[] = $r;
    }

    header('Content-Type: application/json');
    echo json_encode($rows);


?>
