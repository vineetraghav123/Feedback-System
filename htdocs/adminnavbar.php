<?php
echo "
<ul>
 <center> 
		<li><div style='border:2px solid red;color:red;font-size:20px;'>Admin:$adminname</div></li>
		<li><a href='student-info'  class='button'>Student's info.</a></li>
		<li><a href='student-search'  class='button'>Student Search</a></li>
		<li><a href='student-delete'  class='button'>Delete Record</a></li>
		<li><a href='teacher-info'  class='button'>Faculty info.</a></li>
		<li><a href='teacher-search'  class='button'>Faculty Search</a></li>
		<li><a href='add-faculty'  class='button'>Add Faculty</a></li>
		<li><a href='teacher-delete'  class='button'>Delete Faculty</a></li>
		<li><a href='addemail?a'  class='button'>Add Email</a></li>
		<li><a href='change-password'  class='button'>Change Password</a></li>
		<li><a href='admin-home'  class='button'>Refresh</a></li>
		<li><a href='logout'  class='button'>Logout</a></li>
  </center>
</ul>


";
?>