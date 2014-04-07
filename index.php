<?php
    $url=parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);

    mysql_connect($server, $username, $password);

    mysql_select_db($db);

    //Create tables
        //mysql_query("CREATE TABLE events(
        //    id INT NOT NULL AUTO_INCREMENT, 
        //    PRIMARY KEY(id),
        // name VARCHAR(30) )")
        // or die(mysql_error()); 
    //mysql_query("INSERT INTO events
    //    (name) VALUES('UA vs Auburn') ")
    //    or die(mysql_error());

    //$result = mysql_query("SELECT * FROM events")
    //    or die(mysql_error());
    //$row = mysql_fetch_array($result);
    //echo "ID: ".$row['id'];
    //echo "Name: ".$row['name'];
    //echo "Placeholder"


?>
