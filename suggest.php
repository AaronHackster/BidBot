<?php

include_once("connect_to_mysql.php");
// Array with name
$a=array();
$sq=mysqli_query($conn,"select Pname from products"); 
	 $productCount=mysqli_num_rows($sq);
	 $i=0;
	while($row=mysqli_fetch_array($sq,MYSQLI_ASSOC))
	{
		array_push($a,$row["Pname"]);
	}
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint ="<option>".$name;
            } else {
                $hint .=  "<option>".$name;
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>