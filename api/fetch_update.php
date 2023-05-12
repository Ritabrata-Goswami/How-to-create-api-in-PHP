<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: GET");

include('../function.php');
include('../connection.php');

$get_json = file_get_contents('php://input');
$parsing_json = json_decode($get_json);

$id=$parsing_json->id;
$select = $api_obj->fetch_update_data("CALL customer_details_update_fetch('$id')");

$data = mysqli_fetch_array($select);
$new_arr = array();

$all_details = array(
                    "id"=>$data["id"],
                    "name"=>$data["name"],
                    "age"=>$data["age"],
                    "address"=>$data["address"],
                    "phone"=>$data["phone"]
                );
array_push($new_arr,$all_details);
print(json_encode($new_arr));
?>