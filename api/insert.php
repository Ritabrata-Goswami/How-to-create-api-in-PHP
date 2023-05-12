<?php
header("Content-Type:application/json");
header("Access-Control-Allow-Methods: POST");

include('../function.php');
include('../connection.php');


$get_json = file_get_contents('php://input');
$parsing_json = json_decode($get_json);

$name = $parsing_json->name;
$age = $parsing_json->age;
$address = $parsing_json->addr;
$ph_no = $parsing_json->phone;

if($name==" " || $age==" " || $address==" " || $ph_no==" ")
{
    print(json_encode(array("message"=>"Field empty not allowed!")));
}
else
{
    $insert = $api_obj->insert("CALL customer_details_insert('$name',$age,'$address',$ph_no)");

    if($insert)
    {
        print(json_encode(array("message"=>"Data Inserted Successfully!")));
    }
    else
    {
        print(json_encode(array("message"=>"Failed to insert ".mysqli_error($this->conn))));
    }
}
?>