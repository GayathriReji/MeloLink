
<?php
   include("../Assets/Connections/Connection.php");
           
                if(isset($_POST["btnsave"]))
				 {
		             $categoryname=$_POST["txtcatname"];
					
		            $insQry="insert into tbl_category(category_name)values('".$categoryname."')";
					if($con->query($insQry))
					{
						$message="Record inserted";
					}
					else
					
				    {
					 $message="Insertion failed";
				    }



				  }
				  
				  
				  
				if(isset($_GET['did']))
				 {
					 $delQry="delete from tbl_category where category_id=".$_GET['did'];
					if($con->query($delQry))
					{
		?>				
						<script>
						     alert('DELETED')
					    </script>
                         
				 
         <?php
				 }
				 else
				 {
		 ?>
                     <script>
						     alert('FAILED')
					    </script>
                         
        <?php
				 }
				 }
		 ?>
























<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="282" border="1">
    <tr>
      <td width="145">Category name</td>
      <td width="114"><label for="txtcatname"></label>
      <input type="text" name="txtcatname" id="txtcatname" /></td>
     
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnsave" id="btnsave" value="Submit" />
     <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    
    </tr>
   
  </table>
 
  <table width="437" border="1">
    <tr>
      <td width="63">Sl No.</td>
      <td width="174">Category Name</td>
      <td width="178">Action</td>
    </tr>
    <?php
           $selQry="select*from tbl_category";
		   $res=$con->query($selQry) ;
		   $i=0;
		   while($row=$res->fetch_assoc())
		   { 
		          $i++;
			  
	?>
    <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['category_name'];?></td>
    <td><a href="Category.php?did=<?php echo $row ['category_id'] ?>">Delete</a>
         
         <?php
		   }?>
		   
		  </table> 
</form>
</body>
</html>