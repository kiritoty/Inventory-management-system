<?php
	include('session.php');
    $sql = 'SELECT * FROM product';
	$result = mysqli_query($db,$sql); 
	$rows = array();
	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;
	}
	
	$sql = 'SELECT * FROM comment';
	$CommentResult = mysqli_query($db,$sql); 
	$CommentRows = array();
	while($row = mysqli_fetch_array($CommentResult)){
    	$CommentRows[] = $row;
	}
	
	$sql = 'SELECT * FROM sales';
	$salesResult = mysqli_query($db,$sql); 
	$salesRows = array();
	while($row = mysqli_fetch_array($salesResult)){
    	$salesRows[] = $row;
	}
?>


<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="css/dashboard.css">
		<script src="js/dashboard.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
		<script>
			var comments = <?php echo json_encode( $CommentRows ) ?>;
			var products = <?php echo json_encode( $rows ) ?>;
			var sales = <?php echo json_encode( $salesRows ) ?>;
		</script>

	</head>
	<body>

		<div id="top-bar">
			<nav>
				<ul>
					<li><a href="dashboard.php">Home</a></li>
					<li><a href="comment.php">Message</a></li>
					<li><a href="reference.php" target="_blank">About</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
				
				
			</nav>
		</div>	
			
	
		<div id = "side-navagate-bar">
			<div class = "toggle-btn" onclick="toggleSideBar()">
				<span></span>
				<span></span>
				<span></span>
			</div>
			
			<ul>
				<li><h2 id="logo">Inventory Sales Management</h2></li>
				<li><a href="sales.php">Sales</a></li>
				<li><a href="inventory.php">Inventory</a></li>
			</ul>
			
		</div>
	
	
		<div id="block">
	
			<div id="main-area">
				
				<div id="welcome">
					<h1>Welcome <?php echo $login_session; ?></h1>	
				</div>
				
				<div id="mini_nav">
					<div id="mini_board">
						<div class = "mini_font"><a href="sales.php">Sales</a></div>
						<img src="img/sales.png"/>
					</div>
					
					<div id="mini_board">
						<div class = "mini_font"><a href="inventory.php">Income</a></div>
						<img src="img/income.png"/>
					</div>
					
					<div id="mini_board">
						<div class = "mini_font"><a href="comment.php">OnBoard</a></div>
						<img src="img/chat.png" />
					</div>
					
					<div id="mini_board">
						<div class = "mini_font"><a href="#">Profile</a></div>
						<?php echo '<img src="' . $avatar . '"/>';?>
					</div>
				</div>
				
				<div id="first_row">
					<div id="linechar">
						<canvas id="canvas" ></canvas>
					</div>
					<div id="barchar">
						<canvas id="canvas1" ></canvas>
					</div>
				</div>
				
				
				<div id="second_row">
					<div id="Tasks_Panel">
						<h4>Tasks Panel</h4>
						<h4>     </h4>
						<div id="message"> </div>
					</div>
				</div>
				
			</div>	
		</div>
			
		<script>
			var myDate = new Date();
			var month=new Array('Jan','Feb', 'Mar', 'April', 'May', 'Jun', 'Jul', 'Aug','Sep', 'Oct', 'Nov','Dec');
			var monthNumber=new Array(1,2,3,4,5,6,7,8,9,10,11,12);
			var setMonth = myDate.getMonth();
			setMonth += 12;
			var valueMonth=monthNumber[myDate.getMonth()];
		
		
			var one = 0, two = 0, three = 0, four = 0, five = 0, six = 0, seven = 0, eight = 0, nine = 0, ten = 0, elev = 0, twel = 0;
		
		// get cost
			for(var i = sales.length-1; i >= 0 ; i--) {

				if(sales[i][8] == monthNumber[(setMonth % 12)] ) {
					if(valueMonth - monthNumber[(setMonth % 12)] >= 0 && sales[i][9] == myDate.getFullYear()) {
						twel+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth % 12)] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						twel+= parseFloat(sales[i][4]);
					}
				}
				
				if(sales[i][8] == monthNumber[((setMonth - 1) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 1) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						elev+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 1) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						elev+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 2) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 2) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						ten+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 2) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						ten+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 3) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 3) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						nine+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 3) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						nine+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 4) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 4) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						eight+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 4) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						eight+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 5) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 5) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						seven+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 5) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						seven+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 6) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 6) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						six+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 6) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						six+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 7) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 7) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						five+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 7) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						five+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 8) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 8) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						four+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 8) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						four+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 9) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 9) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						three+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 9) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						three+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 10) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 10) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						two+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 10) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						two+= parseFloat(sales[i][4]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 11) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 11) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						one+= parseFloat(sales[i][4]);
					}
					if(valueMonth - monthNumber[(setMonth - 11) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						one+= parseFloat(sales[i][4]);
					}
				}
				
				
			}
			
			var oneP = 0, twoP = 0, threeP = 0, fourP = 0, fiveP = 0, sixP = 0, sevenP = 0, eightP = 0, nineP = 0, tenP = 0, elevP = 0, twelP = 0;
			
			
			for(var i = sales.length-1; i >= 0 ; i--) {

				if(sales[i][8] == monthNumber[(setMonth % 12)] ) {
					if(valueMonth - monthNumber[(setMonth % 12)] >= 0 && sales[i][9] == myDate.getFullYear()) {
						twelP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth % 12)] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						twelP+= parseFloat(sales[i][6]);
					}
				}
				
				if(sales[i][8] == monthNumber[((setMonth - 1) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 1) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						elevP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 1) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						elevP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 2) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 2) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						tenP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 2) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						tenP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 3) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 3) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						nineP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 3) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						nineP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 4) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 4) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						eightP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 4) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						eightP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 5) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 5) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						sevenP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 5) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						sevenP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 6) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 6) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						sixP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 6) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						sixP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 7) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 7) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						fiveP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 7) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						fiveP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 8) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 8) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						fourP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 8) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						fourP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 9) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 9) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						threeP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 9) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						threeP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 10) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 10) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						twoP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 10) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						twoP+= parseFloat(sales[i][6]);
					}
				}
				if(sales[i][8] == monthNumber[((setMonth - 11) % 12)] ) {
					if(valueMonth - monthNumber[(setMonth - 11) % 12] >= 0 && sales[i][9] == myDate.getFullYear()) {
						oneP+= parseFloat(sales[i][6]);
					}
					if(valueMonth - monthNumber[(setMonth - 11) % 12] < 0 && sales[i][9] == myDate.getFullYear()-1) {
						oneP+= parseFloat(sales[i][6]);
					}
				}
				
				
			}

		var myChart = {
		  type: 'line',
		  data: {
		    labels: [month[(setMonth-11) % 12], month[(setMonth-10) % 12], month[(setMonth-9) % 12], month[(setMonth-8) % 12], month[(setMonth-7) % 12], month[(setMonth-6) % 12], month[(setMonth-5) % 12], month[(setMonth-4) % 12],month[(setMonth-3) % 12], month[(setMonth-2) % 12], month[(setMonth-1) % 12], month[setMonth % 12]],
		    datasets: [{
		      label: 'Profit',
		      data: [oneP, twoP, threeP, fourP, fiveP, sixP, sevenP, eightP, nineP, tenP, elevP, twelP],
		     
		      backgroundColor: "rgba(104, 163, 221, 0.5)"
		      
		    }, {
		      label: 'Cost',
		      data: [one, two, three, four, five, six, seven, eight, nine, ten, elev, twel],
		      backgroundColor: "rgba(245, 0, 0, 0.5)"
		    }]
		  },
		
		  options: {
			responsive: true,
            title:{
                display:true,
                text:'Product Revenue and Expend'
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            }
		  }
		};
		
		var ctx = document.getElementById('canvas').getContext('2d');
		var index = new Chart(ctx, myChart);
		
		var myBarChart = {
				  type: 'bar',
				  data: {
		    labels: [month[(setMonth-11) % 12], month[(setMonth-10) % 12], month[(setMonth-9) % 12], month[(setMonth-8) % 12], month[(setMonth-7) % 12], month[(setMonth-6) % 12], month[(setMonth-5) % 12], month[(setMonth-4) % 12],month[(setMonth-3) % 12], month[(setMonth-2) % 12], month[(setMonth-1) % 12], month[setMonth % 12]],
				    datasets: [{
				      label: 'Profit',
				      data: [oneP, twoP, threeP, fourP, fiveP, sixP, sevenP, eightP, nineP, tenP, elevP, twelP],
				     
				      backgroundColor: "rgba(104, 163, 221, 0.5)"
				      
				    }, {
				      label: 'Cost',
				      data: [one, two, three, four, five, six, seven, eight, nine, ten, elev, twel],
				      backgroundColor: "rgba(245, 0, 0, 0.5)"
				    }]
				  },
				  options: {
						responsive: true,
			            title:{
			                display:true,
			                text:'Product Revenue and Expend'
			            },
			            tooltips: {
			                mode: 'index',
			                intersect: false,
			            },
			            hover: {
			                mode: 'nearest',
			                intersect: true
			            },
			            scales: {
			                xAxes: [{
			                    display: true,
			                    scaleLabel: {
			                        display: true,
			                        labelString: 'Month'
			                    }
			                }],
			                yAxes: [{
			                    display: true,
			                    scaleLabel: {
			                        display: true,
			                        labelString: 'Value'
			                    }
			                }]
			            }
					  }
				  
				};
				
				var ctx = document.getElementById('canvas1').getContext('2d');
				var index = new Chart(ctx, myBarChart);

		</script>
	</body>
</html>