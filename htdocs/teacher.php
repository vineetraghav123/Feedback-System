<?php 


session_start();
	if(!isset($_SESSION['adminname']))
	{
		header("location:admin-login");
	}$adminname=$_SESSION['adminname'];


?>

<html>
	<head>
	
		<title>Teacher Info</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">	
		   <link rel="stylesheet" href="menu.css" />
	<script>
	
	
		function semselect(br)
			{
				
				

			
					if(window.XMLHttpRequest)
					{
						req=new XMLHttpRequest();
					}else
					{
						req=new ActiveXObject("Microsoft.XMLHTTP");
					}
					req.onreadystatechange=function()
					{
						if(this.readyState==4&&this.status==200)
						{
							document.getElementById("a").innerHTML=this.responseText;
						}
					};
					req.open("GET","tclass.php?branch="+br,true);
					req.send();
					
			}
			
			function classselect(sm)
			{
				
				

			
					if(window.XMLHttpRequest)
					{
						req=new XMLHttpRequest();
					}else
					{
						req=new ActiveXObject("Microsoft.XMLHTTP");
					}
					req.onreadystatechange=function()
					{
						if(this.readyState==4&&this.status==200)
						{
							document.getElementById("b").innerHTML=this.responseText;
						}
					};
					req.open("GET","tclass.php?semester="+sm,true);
					req.send();
					
			}
			
			
			
			function teacherdd(cl)
			{
				
				

			
					if(window.XMLHttpRequest)
					{
						req=new XMLHttpRequest();
					}else
					{
						req=new ActiveXObject("Microsoft.XMLHTTP");
					}
					req.onreadystatechange=function()
					{
						if(this.readyState==4&&this.status==200)
						{
							document.getElementById("c").innerHTML=this.responseText;
						}
					};
					req.open("GET","tclass.php?class="+cl,true);
					req.send();
					
			}
			
			function data(dt)
			{
				
				

			
					if(window.XMLHttpRequest)
					{
						req=new XMLHttpRequest();
					}else
					{
						req=new ActiveXObject("Microsoft.XMLHTTP");
					}
					req.onreadystatechange=function()
					{
						if(this.readyState==4&&this.status==200)
						{
							document.getElementById("d").innerHTML=this.responseText;
						}
					};
					req.open("GET","tclass.php?data="+dt,true);
					req.send();
					
			}
			
	</script>
	
	<style>
		


		.err{
		color: red;
		font-size:20px;
		background-color: white;
		width:20%;
		align:center;
		
		text-align:center;
}
		body{
		background-image:url(pics/heidi.jpg);
		background-attachment: fixed;
background-repeat: no-repeat;
	}
			table {
    border-collapse: collapse;
    width: 100%;
}

th, td ,caption{
	
    text-align: center;
    padding: 8px;
}

tr{background-color: #f2f2f2}/*:nth-child(even)*/

th,caption{
    background-color: #4CAF50;
    color: white;
text-transform:capitalize;
}
			
			select {
    width: 180px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
  
    font-size: 15px;
	text-transform: capitalize;
    background-color: white;
    padding: 5px 5px 5px 20px;
    
}
select:hover{
	background-color: #f5f5dc;
	border-color: red;
	
}
input[type=button], input[type=submit]{
    background-color: red;
    border: none;
	
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
input[type=submit]:hover{
	background-color: #cc0000;
	font-color: white;
}


		</style>
		
	</head>
	<body>
	<?php include 'adminnavbar.php';?>
<div style="margin-left:16%;">
	<form method="post" action="">
	<div class ="heading">Teacher's Information</div>
		<table>
		<tr> 
			<td>
					<select  id="branch" name="branch" onchange="semselect(this.value)" >
						<option value="">Branch</option>
						<option value="civil">Civil</option>
						<option value="mechanical">Mechanical</option>
						<option value="computer_science">Computer Science</option>
						<option value="electrical_and_electronics">Electrical and Electronics</option>
						<option value="electronics_and_communication">Electronics and Communication</option>
						
					</select>
			</td>
			
			<td id="a">
					<select name="semester">
						<option value="">Semester</option>
					</select>
			</td>
			
			<td id="b">
				<select name="class">
						<option value="">Class</option>
					</select>
			</td>
			
			<td id="c">
				<select name="teacher">
						<option value="">Teacher</option>
					</select>
				
			</td>
			
			
			
			
		
					
		
		
		</table>
	</form>
	


	<div class="err"></div>
	<div id="d"></div>
	</div>
	</body>
	</html>