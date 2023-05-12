<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: POST");

include('../function.php');
include('../connection.php');

$get_json = file_get_contents('php://input');
$parsing_json = json_decode($get_json);

$id=$parsing_json->id;
$name = $parsing_json->name;
$age = $parsing_json->age;
$address = $parsing_json->addr;
$ph_no = $parsing_json->phone;


$update = $api_obj->save_update_data("CALL customer_details_update_save('$id','$name','$age','$address','$ph_no')");
if($update)
{
    print(json_encode(array("message"=>"Update successful!")));
}
else
{
    print(json_encode(array("message"=>"Update failed! ".mysqli_error($this->conn))));
}
?>