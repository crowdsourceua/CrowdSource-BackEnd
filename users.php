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

    //JSON object for user table
    $userData = array();
    $result = mysql_query("SELECT * FROM users")
        or die(mysql_error());
    while($row = mysql_fetch_assoc($result)){
        $userData[] = $row;
    }
    echo json_encode($userData);
    //
    //mysql_close($conn);
?>
