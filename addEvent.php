<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);
    $conn = mysql_connect($server, $username, $password);
    if(!$conn){ die('Could not connect: ' . mysql_error()); }
    mysql_select_db($db);

    
    $query = "INSERT INTO event (eventName, opponent, location, eventVenue, eventTime, eventType, description, date, user) VALUES ('$_GET[eventName]', '$_GET[opponent]', '$_GET[eventLocation]', '$_GET[eventVenue]', '$_GET[eventTime]', '$_GET[eventType]', '$_GET[description]', '$_GET[eventDate]', '$_GET[user]')";
    
    mysql_query($query) or trigger_error(mysql_error()." in ".$query);

    if (mysql_error() == "") {
        echo "1"
    }
    else {
        echo "0"
    }
?>
