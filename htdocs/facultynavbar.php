<?php
echo "
<ul>
 <center> 
		<li><div style='border:2px solid red;color:red;font-size:20px;'>$facultyname</div></li>
		<li><a href='faculty-feedback?number'  class='button'>Feedback</a></li>
		<li><a href='faculty-feedback?total'  class='button'>Total</a></li>
		<li><a href='faculty-changepassword'  class='button'>Change Password</a></li>
		<li><a href='addemail?f'  class='button'>Add Email</a></li>
		<li><a href='pdfdownload'  class='button'>Download PDF</a></li>
		<li><a href='faculty-home' class='button'>Refresh</a></li>
		<li><a href='logout?faculty'  class='button'>Logout</a></li>
		
  </center>
</ul>


";
?>