<?php
$flag="true";
$fname="";
if(isset($_POST["submit"])) {
$fname=$_FILES['myfile']['name'];
$ftmp=$_FILES['myfile']['tmp_name']	;
$type=$_FILES['myfile']['type']	;
echo $type;

$ext=strtolower(end(explode(".",$fname)));


  $store="PHP/".$fname;
  $type=pathinfo($store,PATHINFO_EXTENSION);
  
  
  /*if($ext!=="png"||$ext!=="jpg")
  {
	  echo "incorrect typpe";
  }*/
  
  if(file_exists($store))
  {
	  echo "already present";
	  $flag="false";
  }
  /*if($_FILES['myfile']['size']>500000)
  {
	  echo "size is large";
	  $flag="false";
  }*/
  if($flag=="true"){
	if(move_uploaded_file($ftmp,$store)){
			echo "uploaded";}
  }
}
?>
<html>


	<head>
	<style>
	[type=file]{
		background-color:red;
		
	}


	</style>
	
	</head>
		<body>
			<form action="" method="post" enctype="multipart/form-data">
			select file to upload:<br>
			<input type="file" name="myfile" id="fileup" >
			<input type="submit" value="Upload" name="submit">
						</form>
						
			<a href="PHP/<?php echo $fname;?>" download="">download</a>
		</body>
</html>
