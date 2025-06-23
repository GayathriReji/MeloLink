<?php
   include("../Assets/Connections/Connection.php");
           
                if(isset($_POST["btnsave"]))
				 {
		             $subcategory=$_POST["txtsubcategory"];
					 $category=$_POST["sel_category"];
					
					
		            $insQry="insert into tbl_subcategory(subcategory_name,category_id)values('".$subcategory."','".$category."')";
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
					 $delQry="delete from tbl_subcategory where subcategory_id=".$_GET['did'];
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
<table width="200" border="1">
  <tr>
  <td>Category Name</td>
  <td><label for="sel_category"></label>
  <select name="sel_category" id="sel_category">
  
      <?php
           $selQry="select*from tbl_category";
		   $res=$con->query($selQry);
		   while($row=$res->fetch_assoc())
		   { 
		          
	?>
    <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
    <?php
		   }
		   ?>
</select> </td>
</tr>
          
           <tr>
  
    <td width="145">Subcategory Name</td>
    <td width="29"><label for="txtsubcategory"></label>
    <input type="text" name="txtsubcategory" id="txtsubcategory" /></td>
    
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Submit" />
    <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
  </tr>
  

</table>

</form>
<form>
<table border="1">

<tr>
 <td>Sl No.</td>
 <td>Subcategory Name</td>
 <td>Category Name</td>
 <td>Action</td>
 </tr>
 
<?php
	$selQry="select  * from tbl_subcategory fc inner join tbl_category c on fc.category_id=c.category_id";
	$res=$con->query($selQry) ;
		   $i=0;
		   while($row=$res->fetch_assoc())
		   { 
		          $i++;	   
		   ?>
		   <tr>
           <td><?php echo $i ?></td>
    <td><?php echo $row['subcategory_name'];?></td>
    <td><?php echo $row['category_name'];?></td>
    <td><a href="Subcategory.php?did=<?php echo $row ['subcategory_id'] ?>">Delete</a></td></tr>
         
         <?php
		   }
		 
		   ?>
		   
		  </table>
</body>
</html>
