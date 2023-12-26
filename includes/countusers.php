<?php

// Query to count the number of users
// Execute the query
$result = $DB->query("SELECT COUNT(*) as total_users FROM `users`");

 // Get the total number of users
 $row = $result->fetch(PDO::FETCH_ASSOC);
 $total_users = $row["total_users"];

 // Display the result on the page
echo $total_users;

?>