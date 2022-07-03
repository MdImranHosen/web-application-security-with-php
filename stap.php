<?php
$db_connect;
// Stripcslashes - Remove the backslash in front of "word"

#example 1: 

$key1 = "  \ Test keyword Stripcslashes ";
$output1 = stripcslashes($key1); //Remove the backslas
#output: Test keyword Stripcslashes
//------------------- 

// mysqli_real_escape_string - function is used to escape characters in a string, making it legal to use in an SQL statement.

$my_escape_string = ' Test Keyword <script>alert("hack");</script> ';

// SQL query for login 1' OR '1 = 1

$my_escape_string = mysqli_real_escape_string($db_connect, $my_escape_string);
// $db_connect  - Database connection
echo $my_escape_string;
#--------------------------

// Trim in php

$ver_trim = "  Test Keyword    ";

$ver_trim = trim($ver_trim);
echo $ver_trim;

#Output is: Test Keyword // without whitespace    
#---------------------------


// htmlentities() and htmlspecialchars()

$test_key = ' Test Keyword <script>alert("hack");</script> ';

//preg_replace() 

$username = "user@nameisone&two"
$username = preg_replace('/[^-a-zA-Z0-9]/','', $username); // Allow only letter and numbers
$username = preg_replace('/[^-a-zA-Z0-9_]/','', $username); // Allow only letter and numbers with under score

echo $username; 

// preg_match in PHP 

$var_preg_m = "imran@gmail.com";

if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $var_preg_m)) {

    $output = $var_preg_m." Invalid email format ";
}else{
     $output = $var_preg_m." Valid email format ";
}
echo $output;

#Output: imran@gmail.com Valid email format


# after login 

# http://localhost/vub/index.php?action= 6' UNION SELECT * FROM posts WHERE id = '4 &submit=Read+More+%3E%3E

# SELECT * FROM posts WHERE id = '6' UNION SELECT * FROM posts WHERE id = '4'


' UNION SELECT * FROM posts WHERE id = '4' UNION SELECT * FROM posts WHERE id = '3