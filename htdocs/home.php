

<html>
	<head>

		   <title>Home</title>
		   <link rel="icon" type="image/gif/png" href="pics/logo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
	<style>
	.capital{
			text-transform: capitalize;
		}
	.err{
	color: red;
	 font-size:20px;
	background-color: white;
	width:35%;
	 
	 align:center;
	
}
	body{
		background-image:url(pics/backg.jpg);
		
		background-attachment: fixed;
background-repeat: no-repeat;
	
	}
	.name{
		font-size:20px;
		box-sizing: border-box;
		border: 2px solid #5cb85c;
		background-color: #5cb85c;
		color: white;
		padding:5px;
		
		
	}
	input[type=text],[type=password],select {
    width: 300px;
	height: 47px;
    box-sizing: border-box;
    border: 2px solid #ccc;
   
    font-size: 15px;
	text-align:center;
    background-color: white;
    
    padding: 5px 5px 5px 20px;
    
}
[type=password]:hover{
	background-color: #f5f5dc;
	border-color: red;
}
input[type=text]:hover{
	background-color: #f5f5dc;
	border-color: red;
}
	input[type=submit], input[type=reset] {
    background-color: red;
    border: none;

    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 6px 2px;
    cursor: pointer;
	height: 50px;
	
}
input[type=submit]:hover{
	background-color: #cc0000;
	font-color: white;
}
input[type=button]:hover{
	background-color: #cc0000;
	font-color: white;
}

	.button{
		
	text-decoration:none;
   
    font-size: 15px;
	text-align:center;
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 16px 73px;
    margin: 4px 2px;
    cursor: pointer;
	
	width: 20%;
	height: 45px;
	
 
	}
	
	.button:hover{
	
		background-color:green;
		
	}
		.marg{
			margin:10px;
			
		}
	
	.adminbutton{
		text-decoration:none;
		margin:10px;
		height:7px;
		font-size:18px;
		
    
	text-align:center;
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 14px 50px;
	}.adminbutton:hover{background-color:green;color:white;
	
	text-decoration:none;
	}
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
}
.header{
	margin: 20px;
	
	
}
	</style>

	</head>
	
	<body>
<div class="container-fluid header">

<p align="right"><a href="student-login" class="adminbutton">Student</a><a href="faculty-login" class="adminbutton">Faculty</a><a href="admin-login" class="adminbutton">Admin</a></p>

</div>

</div>
	
	

  <div class="container-fluid">
  
  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators"> 
      <li class="item1 active"></li>
      <li class="item2"></li>
      <li class="item3"></li>
      <li class="item4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="width:100%;height:80%;" role="listbox">
      <div class="item active">
        <img src="pics/clg3.jpeg"  width="440" height="325">
      </div>

      <div class="item">
        <img src="pics/clg2.jpeg"  width="440" height="325">
      </div>
    
      

      <div class="item">
        <img src="pics/clg1.jpeg"  width="440" height="325">
      </div>
	  <div class="item">
        <img src="pics/clg4.jpg"  width="440" height="325">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel({interval: 2500});
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>
<p align="bottom">
  	<div class="container-fluid footer">
		<u>Vineet Raghav</u>
	</div>
	</p>	
	</body>
</html>