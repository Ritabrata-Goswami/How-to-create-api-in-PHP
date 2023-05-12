<?php
header('content-type:application/json');
header("Access-Control-Allow-Methods: GET");

include('../function.php');
include('../connection.php');

$select = $api_obj->select('CALL customer_details_fetch');
$new_arr = array();

if(mysqli_num_rows($select) > 0)
{
    while($data = mysqli_fetch_array($select))
    {
        $all_details = array("id"=>$data["id"],"name"=>$data["name"],"age"=>$data["age"],"address"=>$data["address"],"phone"=>$data["phone"]);
        array_push($new_arr,$all_details);
    }
    print(json_encode($new_arr));
}
else
{
    print(json_encode(array("message"=>"No record available!")));
}
?>