<?php session_start();
      if(isset($_SESSION['username'])){
		  
      require('config.php'); ?>
<html>
<head>
<title>Home page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#searchby_name").keyup(function(){
                var search = $(this).val();
                if(search != ""){
                    $.ajax({
                        url: 'getSearch.php',
                        type: 'post',
                        data: {search:search, type:1},
                        dataType: 'json',
                        success:function(response){
                            var len = response.length;
                            $("#searchResult").empty();
                            for( var i = 0; i<len; i++){
                                var id = response[i]['id'];
                                var name = response[i]['name'];
                                $("#searchResult").append("<li value='"+id+"'>"+name+"</li>");
                            }
                            // binding click event to li
                            $("#searchResult li").bind("click",function(){
                                setText(this);
                            });
                        }
                    });
                }
            });
        });
        function setText(element){
            var value = $(element).text();
            var userid = $(element).val();
            $("#searchby_name").val(value);
            $("#searchResult").empty();
            // Request User Details
            $.ajax({
                url: 'getSearch.php',
                type: 'post',
                data: {userid:userid, type:2},
                dataType: 'json',
                success: function(response){
                    var len = response.length;
                    //$("#userDetail").empty();
                    if(len > 0){
                        document.getElementById("child_name").value = response[0]['child_name'];
                        document.getElementById("profile-image").src = response[0]['image'];
                        document.getElementById("case_id").value = response[0]['case_id'];
                        document.getElementById("call_number").value = response[0]['call_number'];
                        document.getElementById("case_datetime").value = response[0]['case_datetime'];
                        document.getElementById("agent_name").value = response[0]['agent_name'];
                        document.getElementById("ccc_category").value = response[0]['ccc_category'];
                        document.getElementById("subcategory").value = response[0]['subcategory'];
                        document.getElementById("category_reason").value = response[0]['category_reason'];
                        document.getElementById("child_name").value = response[0]['child_name'];
                        document.getElementById("child_dob").value = response[0]['child_dob'];
                        document.getElementById("father_name").value = response[0]['father_name'];
                        document.getElementById("contact_no").value = response[0]['contact_no'];
                        document.getElementById("address").value = response[0]['address'];
                        document.getElementById("fir_logged").value = response[0]['fir_logged'];
                        document.getElementById("cwc_order").value = response[0]['cwc_order'];
                        document.getElementById("fir_copy").value = response[0]['fir_copy'];
                        document.getElementById("intervation_call").value = response[0]['intervation_call'];
                        document.getElementById("user_id").value = userid;
                    }
                }
            });
        }
 function edit_form(userid){
	      $.ajax({
                url: 'getSearch.php',
                type: 'post',
                data: {userid:userid, type:2},
                dataType: 'json',
                success: function(response){
                    var len = response.length;
                    //$("#userDetail").empty();
                    if(len > 0){
                        document.getElementById("child_name").value = response[0]['child_name'];
                        document.getElementById("profile-image").src = response[0]['image'];
						document.getElementById("case_id").value = response[0]['case_id'];
                        document.getElementById("call_number").value = response[0]['call_number'];
                        document.getElementById("case_datetime").value = response[0]['case_datetime'];
                        document.getElementById("agent_name").value = response[0]['agent_name'];
                        document.getElementById("ccc_category").value = response[0]['ccc_category'];
                        document.getElementById("subcategory").value = response[0]['subcategory'];
                        document.getElementById("category_reason").value = response[0]['category_reason'];
                        document.getElementById("child_name").value = response[0]['child_name'];
                        document.getElementById("child_dob").value = response[0]['child_dob'];
                        document.getElementById("father_name").value = response[0]['father_name'];
                        document.getElementById("contact_no").value = response[0]['contact_no'];
                        document.getElementById("address").value = response[0]['address'];
                        document.getElementById("fir_logged").value = response[0]['fir_logged'];
                        document.getElementById("cwc_order").value = response[0]['cwc_order'];
                        document.getElementById("fir_copy").value = response[0]['fir_copy'];
                        document.getElementById("intervation_call").value = response[0]['intervation_call'];
                        document.getElementById("user_id").value = userid;
						$(window).scrollTop(30);
						
                    }
                }
            });
 }
	var loadFile = function(event) {
	var image = document.getElementById('profile-image');
	image.src = URL.createObjectURL(event.target.files[0]);
}
    </script>
<div class="container-fluid">
<br/>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:100px;">
  <a class="navbar-brand" href="#"><img src="doc/logo.jpg" class="rounded" /></a>
  <div class="" id="navbarTogglerDemo02" style="height:130px; background:url('doc/childline.gif'); width:700px;">
    <div class="navbar-nav mr-auto mt-2 mt-lg-0" >
    </div>
  </div>
  <img src="doc/img2.jpg" class="img-responsive" width="270" height="180" />
</nav>
</div>
<br/>
<br/>
<hr/>
<div class="container-fluid">
<?php if(isset($_POST['submit'])){
	$data = array("call_number"=>$_POST['call_no'],
	              "case_id"=>$_POST['case_id'],
				  "case_datetime"=>$_POST['case_datetime'],
				  "agent_name"=>$_POST['agent_name'],
				  "ccc_category"=>$_POST['ccc_category'],
				  "subcategory"=>$_POST['subcategory'],
				  "category_reason"=>$_POST['category_reason'],
				  "child_name"=>$_POST['child_name'],
				  "child_dob"=>$_POST['child_dob'],
				  "father_name"=>$_POST['father_name'],
				  "contact_no"=>$_POST['contact_no'],
				  "address"=>$_POST['address'],
				  "fir_logged"=>$_POST['fir_logged'],
				  "cwc_order"=>$_POST['cwc_order'],
				  "fir_copy"=>$_POST['fir_copy'],
				  "intervation_call"=>$_POST['intervation_call'],
				  "image"=>'',
				  "submitted_by"=>$_SESSION['username'],
				  "status"=>'1');
	if($_FILES['image']['name'] !=''){
		$filename = $_FILES['image']['name'];
		$old_path = $_FILES['image']['tmp_name'];
		$new_path = "childimage/";
		$fileurl = $new_path.$filename;
		if(move_uploaded_file($old_path, $fileurl)){
		$data['image'] = $base_url.$fileurl;
		} else{
			echo "File Not Uploaded";
			$data['image'] = '';
		}
	} else{ if($_POST['user_id'] !=''){
		    $sql2 = mysqli_query($conn,"select image from child where id='".$_POST['user_id']."'");
			$fetch2 = mysqli_fetch_array($sql2);
			$data['image'] = $fetch2['image'];
	} else{ $data['image']=''; } }
	    if($_POST['user_id'] !=''){
			$i=0;
		  foreach($data as $key=>$val){
			  $column1[$i] = $key."='".$val."'";
			  //$val1[$i] = "'".$val."'";
		      $i=$i+1; }
		   $columndata = implode(",",$column1);
		   //$valuenew = implode(",",$val1);
		   $qry = "update child set ".$columndata." where id='".$_POST['user_id']."'";
		   $update = mysqli_query($conn,$qry);
		   if($update){
			   ?>
			   <span class="alert alert-success"><i class="fa fa-check"></i>Record Succesfully Updated </span>
			   <?php
		   } else{
			   ?>
			   <span class="alert alert-danger"><i class="fa fa-times"></i>Record Not Updated </span>
			   <?php 
		   }
		} else{
		 $i=0;
		  foreach($data as $key=>$val){
			  $key1[$i] = $key;
			  $val1[$i] = "'".$val."'";
		      $i=$i+1; }
		   $keynew = implode(",",$key1);
		   $valuenew = implode(",",$val1);
		   $qry = "insert into child(".$keynew.")values(".$valuenew.")";
		   $insert = mysqli_query($conn,$qry);
		   if($insert){
			   ?>
			   <span class="alert alert-success"><i class="fa fa-check"></i>Record Succesfully Inserted </span>
			   <?php 
		   } else{ ?>
			     <span class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i>Record Not Inserted </span>
		   <?php }		  			  
		   } 
} ?>
<form method='post' name='form1' id="form1" action='' enctype="multipart/form-data">
<input type="hidden" name="user_id" id="user_id" value='' />
<div class="row">
<div class="col-md-4 col-sm-3">
<input type="text" name="search" placeholder="Search" id="searchby_name" class="form-control" />
<ul id="searchResult"></ul>
    <div class="clear"></div>
    <div id="userDetail"></div>
</div>
<div class="col-md-4">
<!--<span class="btn btn-success" class="form-control" onclick="view_record()">Search</span>
<!--<input type="submit" name="submit" class="btn btn-success" class="form-control" value="Save Record" />
&nbsp;&nbsp;&nbsp;&nbsp;
<!--<button class="btn btn-primary" onclick="email_send()">Email</button>-->
</div>
<div class="col-md-4">
<span class="my-2 my-sm-0 pull-right"><b><?php echo $_SESSION['username'];  ?></b>&nbsp;
<a href="<?php echo $base_url; ?>logout.php"><span class="btn btn-danger my-2 my-sm-0"> Logout</span></a></span>
</div>
</div>
<table class="table bordared">
  <tr>
     <td rowspan='6' width="230"><img src="doc/img1.jpg" id="profile-image" style="width:180px; height:180px; border:1px solid #000" class="rounded" /> <br/>
	 <input type="file" class="form-control" name="image" id="profile_img" accept="image/*" onchange="loadFile(event)" ></td>
	 </tr>
	 <tr>
		   <td><span><b>Call Number :</b> <input type='text' name='call_no' id="call_number" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Case Id :</b> <input type='text' name='case_id' id="case_id" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Datetime :</b> <input type='datetime-local' name='case_datetime' id="case_datetime" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Agent Name :</b> <input type='text' name='agent_name' id="agent_name" class="form-control" style="border:1px solid #000;" /></span></td>
		 </tr>
		 <tr>
		   <td><span><b>Ccc Category : </b><input type='text' name='ccc_category' id="ccc_category" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Subcategory : </b><input type='text' name='subcategory' id="subcategory" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Category For Reason :</b> <input type='text' name='category_reason' id="category_reason" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Child Name :</b> <input type='text' name='child_name' id="child_name" class="form-control" style="border:1px solid #000;" /></span></td>
		 </tr>
		 <tr>
		   <td style="width:120px"><span><b>Child Age : </b><input type='text' name='child_dob' id="child_dob" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Father/Parent Name :</b> <input type='text' name='father_name' id="father_name" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Contact No : </b><input type='text' name='contact_no' id="contact_no" class="form-control" style="border:1px solid #000;" /></span></td>
		   <td><span><b>Address : </b><textarea name='address' class="form-control" id="address" style="border:1px solid #000;" colspan="4" rowspan="4"></textarea></span></td>
		 </tr>
		 <tr>
		   <td><span><b>Fir Logged : </b>
		   <select name='fir_logged' id="fir_logged" class="form-control" style="border:1px solid #000;">
		   <option value='Yes'>Yes</option>
		   <option value='No'>No</option>
		   </select>
		   </span></td>
		   <td><span><b>CWC Order : </b>
		   <select name='cwc_order' id="cwc_order" class="form-control" style="border:1px solid #000;">
		   <option value='Yes'>Yes</option>
		   <option value='No'>No</option>
		   </select>
		   </span></td>
		   <td><span><b>Fir Copy : </b><input type='text' name='fir_copy' id="fir_copy" class="form-control" style="border:1px solid #000;" /></span></td>
		   <!--<td><span><b>Cwc Order : </b><input type='text' name='cwc_order' id="cwc_order" class="form-control" style="border:1px solid #000;" /></span></td>
		 --></tr>
		 <tr>
		 <td colspan="3">
		  <span><b>Intervation Call :</b><textarea name='intervation_call' id="intervation_call" class="form-control" style="border:1px solid #000;" colspan="4" rowspan="4"></textarea></span>
		  </td>
		  <td><span><b>Save Record :</b><br/><br/><input type="submit" name="submit" value="Save Record" class="btn btn-success" /></td>
		 </tr>
</table>
</form>
<hr/>
<table id="dtBasicExample" class="table" width="100%">
  <thead>
   <tr>
   <th>Call No</th>
   <th>Case Id</th>
   <th>Datetime</th>
   <th>Agent Name</th>
   <th>CCC Category</th>
   <th>Subcategory</th>
   <th>Category Reason</th>
   <th>Child Name</th>
   <th>Child Dob</th>
   <th>Father/Parent</th>
   <th>Submitted By</th>
   <th>Submitted On</th>
   <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php $select = "select * from child where status='1' order by id desc"; 
        $qry = mysqli_query($conn,$select);
        while($row = mysqli_fetch_array($qry)){		?>
   <tr>
   <td><?php echo $row['call_number'];   ?></td>
   <td><?php echo $row['case_id']; ?></td>
   <td><?php echo $row['case_datetime']; ?></td>
   <td><?php echo $row['agent_name']; ?></td>
   <td><?php echo $row['ccc_category']; ?></td>
   <td><?php echo $row['subcategory']; ?></td>
   <td><?php echo $row['category_reason']; ?></td>
   <td><?php echo $row['child_name']; ?></td>
   <td><?php echo $row['child_dob']; ?></td>
   <td><?php echo $row['father_name']; ?></td>
   <td><?php echo $row['submitted_by']; ?></td>
   <td><?php echo $row['submitted_datetime']; ?></td>
   <td><a href="javascript:edit_form('<?php echo $row['id']; ?>')" class="btn btn-primary">
   <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;
   <a  href="<?php echo $base_url."delete.php?id=".$row['id']; ?>" onclick="return confirm('Are You Sure Delete This Record..??')" class="btn btn-danger">
   <i class="fa fa-trash" aria-hidden="true"></i></a></td>
  </tr>
  <?php } ?>
</table>
</div>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#dtBasicExample').DataTable({
        aaSorting: [[0, 'desc']]
    });
});
</script>
</body>
</html>
	  <?php } else{ header("location:index.php"); } ?>