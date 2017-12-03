<?php
	/***** This section is responsible for insearting the data into the db *******/
	$conn = new mysqli('localhost', 'root', '', 'products');
	// check connection 
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    } 
	
	$name = $_POST['pdt_name'];
	$category =$_POST['pdt_category'];
	$price =$_POST['pdt_price'];
	$quantity = $_POST['pdt_qty'];
	
	
	// now, we try to upload image into the database product
	// this secion is to handle the image file that the user has submitted.
	// So we can use it directly
    if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      // the line below is trying to check if we have uploaded the same file into the server
      $value = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($value));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"upload_img/".$file_name);
         echo "Success";
         
      }else{
         print_r($errors);
      }
      
      
   }
 $path = "./upload_img/".$file_name;
 echo $path;
 
 //debug: avoiding to enter the same item
 
 $sql = "INSERT INTO product(pdt_name, pdt_category,pdt_price,pdt_qty,pdt_img)
	        VALUE('$name','$category','$price','$quantity','$path')";
 
 if($conn->query($sql) === TRUE)
	{
		echo "product name: ", $_POST["pdt_name"],"created successfully";
	}
	else
	{
		echo "Error: ". $sql ."<br>" .$conn -> error;
	} 
 
 // This section is for list the images of the product.
 // success 
 $dirname = "./upload_img/";
 $images = glob($dirname. "*.*");
 // directory will have more images, how do you save them?
 echo "how many images do we have?", count($images);
?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Importing Font Awesome to help improving user experience-->
		<script src="https://use.fontawesome.com/eeba79bb96.js"></script>
		<!-- Self Using Css-->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/trans.css">
		<script src="js/trans.js"></script>
		<script>
			submitForms = function()
			{
		    document.getElementById("form1").submit();
		    }
		</script>
		<style>
	    .vertical-menu
	    {
	    	height:auto;
	    	width:100%;
	    }
		.vertical-menu a {
			    background-color: #eee;
			    color: black;
			    display: block;
			    padding: 12px;
			    text-decoration: none;
			    
			}

			.vertical-menu a:hover {
			    background-color: #ccc;
			}
			
			.vertical-menu a.active {
			    background-color: #4CAF50;
			    color: white;
			}

		</style>
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Inventory Sale System</h3>
                </div>

                <ul class="list-unstyled components">
                    
                    <li class="active">
                        <a href="#homeSubmenu">Dash Board</a>
                        
                    </li>
                    <li>
                        <a href="#">About</a>
                        <a href="#pageSubmenu" >Sell</a>
                        
                    </li>
                    <li>
                        <a href="#">Inventory</a>
                    </li>
                    <li>
                        <a href="#">Administration</a>
                    </li>
                </ul>

               
            </nav>

           <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">Sell</a></li>
                                <li><a href="#">Inventory</a></li>
                                <li><a href="#">Administration</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
		  <div class="container-fluid text-center">    
		  <div class="row content">  
		    <div class="col-sm-2 sidenav">
		    	
					<div class="vertical-menu">
					  <a href="#" class="active">Sell</a>
					  <a href="saleDB.php">Sale History Database</a>
					  <a href="productDB.php">Product Database</a>		  
					</div>    
			   		
		    </div>
		    <div class="col-sm-6 text-left">
		    	<!--这个部分负责查找的逻辑 --> 
		    	<div class="row">
		      <div class="form-group">
		      	<label for="search product">Search For Products</label>
		        <i class="fa fa-search" aria-hidden="true"></i>
		        <input type="text"  class="form-control"  placeholder="The name of product" id="search">    
		        <button type="button"  class="btn btn-info">Search</button>	  
		      </div>
		      </div>
		      <hr>
		      <!--这个部分负责展示产品 -->
		      
		      <div class="container">    
		  <div class="row">
		 <?php 		   
				   $sql = "SELECT pdt_name,pdt_img FROM product";
				   $result = $conn->query($sql);
				   if ($result->num_rows > 0) {
					    // output data of each row
					while($row = $result->fetch_assoc()) {
						  echo' <div class="col-sm-3">';
				          echo'   <div class="panel panel-primary">  ';   
				          echo'    <div class="panel-body">';
						  echo'	<img src="'.$row["pdt_img"].'"; class="img-responsive" data-toggle="modal" data-target="#saleModal" style="width:100%; height:100px;" alt="Image">';	
					      echo' <div class="panel-footer">';
					      echo'<p style="text-align:center;">';			     	
					      echo $row["pdt_name"];
					      echo'</p>';
					      echo' 	</div>';
					      echo'   </div>';
				          echo' </div> ';
				          echo' </div> ';
				          
					    }
					} else {
					    echo "0 results";
					}
		  ?>  
		  </div>
		  <button type="button" class="btn btn-labeled btn-success"  data-toggle="modal" data-target="#myModal"><span class="btn-label">
		      <i class="fa fa-plus-circle" aria-hidden="true"></i></span>Add New Product</button>
		  </br>
		  </br>
		  <a href="productDB.php"class="btn btn-labeled btn-default"><span class="btn-label">
		      <i class="fa fa-database" aria-hidden="true"></i></span>View Product Database</a>
		  
		  </div>
		  </div>
		  
		  </div> 
		  </div>
  
   <!-- Modal for adding product -->
      <!-- Modal -->
     <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog modal-lg">
        <div class="modal-content">
         
         <!-- modal head-->
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Product</h4>
         </div>
          	<!-- body -->
         <div class="modal-body">
          <div class="row content">
          	<div class="col-sm-8" id="border">
          		<!-- Creating the form for filling out product information-->
          	   <form id="form1"class="form-inline" action="addproduct.php" method="POST" enctype = "multipart/form-data">  
          	   <table class="table table-striped">    
							    <thead>
							      <tr>
							        <th>
							        	<label>Product name</label>
							        	<input type="text"  class="form-control" name="pdt_name" style="margin-left: 36px;">							        	      							       
							        </th>					        
							      </tr>
							    </thead>
							    <tbody>					    	    
							      </tr>
							      <tr>
							        <td>
							        	<label>Product Category </label>
							        	<input type="text"  class="form-control" list="defaultCategories" name="pdt_category">      			          
							          <datalist id="defaultCategories">
												  <option value="Top">
												  <option value="Bottom">
												  <option value="Shoes">
												  <option value="Accessories">									  
												</datalist>							        
							       </td>			       
							      </tr>
							      <tr>
							        <td>
							        	<label>Product price</label>
							        	<input type="number" step="0.01"  class="form-control" name="pdt_price" style="margin-left: 42px;">
							        </td>     
							      </tr>
							      <tr>
							        <td>
							        	<label>Product quantity</label>
							        	<input type="number"  class="form-control" name="pdt_qty" style="margin-left:15px">;
							        </td>     
							      </tr>
							    </tbody>
							  </table>
							   <!-- if you don't change the button type to submit, the data inside of the form will not be submitted--> 
          	</div>
          	<!--先只管图片的呈现，然后再处理产品内容的呈现 -->
          	<!--warning: The formating was not complete -->
          	<div class="col-sm-4">
          		<!-- Uploading image-->
			           
                 <label for="image">Product image: </label>
                  <input type = "file" name = "image" />
                  <label for="avatar">Image preview: </label>
                 </br>
                  <img src="" alt="" name="avatar" id="preview">
                 	
                </form>         		
          	</div>
         
           <div class="modal-footer">
			    <button type="button" class="btn btn-default" onclick="submitForms()" >Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
            
          </div>
         </div>
         
         
         
       </div>
       </div>
      </div>
      
      <!-- the above div is the end of the div for the modal -->
      
      
      <!-- *********** This modal is for sale -->
      <div id="saleModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title" style="text-align: center;">Sale</h2>
		      </div>
			<div class="modal-body">
		       <form action="saleDB.php" class="form-inline" method="POST">

		        <table class="table table-bordered">
							    
				   
				   <tbody>
				   	  
				   	    <tr>
							<td>
							     <label>Product name: </label>	
							     <input type="text"  class="form-control" name="pdt_name">	
							</td>
							       
						</tr>
				   	    <tr>
							<td>
							     <label>Product price: </label>	
							     <input type="number"  class="form-control" name="sale_price">	
							</td>
							       
						</tr>
					
						<tr>
							<td>
							     <label>Qantity: </label>	
							      <input type="number"  class="form-control" name="sale_qty">								  
							</td>     
					  </tr>	
					  <tr>
							<td>
							     <label>Date: </label>	
							      <input id="date" type="date"  class="form-control" name="sale_date">								  
							</td>     
					  </tr>					   
				  </tbody>				
				</table>    
		      </div>
		      <div class="modal-footer">
			    <button type="submit" class="btn btn-default" >Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		</form>    
		</div>
		
		  </div>
	 </div>
 <!-- This above div is used for the new modal-->
  <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script> 
</body>
</html> 
	



		
	
	