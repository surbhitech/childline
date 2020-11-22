<?php
include "config.php";
$type = 0;
if(isset($_POST['type'])){
    $type = $_POST['type'];
}
// Search result
if($type == 1){
    $searchText = mysqli_real_escape_string($conn,$_POST['search']);

    $sql = "SELECT id,child_name FROM child where child_name like '%".$searchText."%' order by child_name asc";

    $result = mysqli_query($conn,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['id'];
        $name = $fetch['child_name'];

        $search_arr[] = array("id" => $id, "name" => $name);
    }

    echo json_encode($search_arr);
}

// get User data
if($type == 2){
    $userid = mysqli_real_escape_string($conn,$_POST['userid']);

    $sql = "SELECT * FROM child where id=".$userid;

    $result = mysqli_query($conn,$sql);

    $return_arr = array();
    while($fetch = mysqli_fetch_assoc($result)){
        $return_arr[] = array("child_name"=>$fetch['child_name'],
                        	  "image"=> $fetch['image'],
							  "call_number"=>$fetch['call_number'],
							   "case_id"=>$fetch['case_id'],
							   "case_datetime"=>$fetch['case_datetime'],
							   "agent_name"=>$fetch['agent_name'],
							   "ccc_category"=>$fetch['ccc_category'],
							   "subcategory"=>$fetch['subcategory'],
							    "category_reason"=>$fetch['category_reason'],
								"child_name"=>$fetch['child_name'],
								"child_dob"=>$fetch['child_dob'],
								"father_name"=>$fetch['father_name'],
								"contact_no"=>$fetch['contact_no'],
								"address"=>$fetch['address'],
								"fir_logged"=>$fetch['fir_logged'],
								"cwc_order"=>$fetch['cwc_order'],
								"fir_copy"=>$fetch['fir_copy'],
								"intervation_call"=>$fetch['intervation_call']);
    }

    echo json_encode($return_arr);
}