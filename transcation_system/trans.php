<?php
       include("dbhelper/db_create.php");
	   include("dbhelper/db_table.php");
	   // Create product database and table for adding more products
        createProductDB();
        createProductTB();	
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
                        <a href="#homeSubmenu">Dashboard</a>              
                    </li>
                    <li>  
                        <a href="#pageSubmenu">Sell</a>       
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
        <input type="text"  class="form-control" id="product" placeholder="which product?">      
      </div>
      </div>
      <hr>
      <!--这个部分负责展示产品 -->	
      <div class="row">	
      <h3>You have not add any product yet.</h3>
      <h3>Would you like to start adding your first product?</h3>
      <button type="button" class="btn btn-labeled btn-success"  data-toggle="modal" data-target="#myModal"><span class="btn-label">
      <i class="fa fa-plus-circle" aria-hidden="true"></i></span>Add New Product</button>
      </div>
      </div>
         <!-- when customer click the add a product, 
      	we want to create a small window for the customer to fill out the product information.
        This part is intended to increase user experience
      	-->      	
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
      <!-- The above div is the end of the  -->    
  </div>
  </div>
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
