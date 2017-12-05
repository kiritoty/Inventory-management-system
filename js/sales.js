window.onload = createTable;

function createTable() {
	var table = document.createElement("table");
	table.className = "cinereousTable";
	//table.style.width = "50%";
	var head = table.createTHead();
	var row1 = document.createElement("tr");
	var row1col1 = document.createElement("th");
	row1col1.innerHTML = "ID";
	var row1col2 = document.createElement("th");
	row1col2.innerHTML = "Item Name";
	var row1col3 = document.createElement("th");
	row1col3.innerHTML = "Quantity";
	var row1col4 = document.createElement("th");
	row1col4.innerHTML = "Cost";
	var row1col5 = document.createElement("th");
	row1col5.innerHTML = "Revenue";
	var row1col6 = document.createElement("th");
	row1col6.innerHTML = "Profit";
	var row1col7 = document.createElement("th");
	row1col7.innerHTML = "Date";
	row1.appendChild(row1col1);
	row1.appendChild(row1col2);
	row1.appendChild(row1col3);
	row1.appendChild(row1col4);
	row1.appendChild(row1col5);
	row1.appendChild(row1col6);
	row1.appendChild(row1col7);
	head.appendChild(row1);
	table.appendChild(head);
	var tbody = table.createTBody();
	for(var i = 0; i < products.length; i++) {
		var row = document.createElement("tr");
		for(var j = 1; j < 8; j++) {
			var rowcol = document.createElement("td");
			row.appendChild(rowcol);
			var output = document.createElement("input");
			var index;
			switch(j) {
				case 1:
					index = "myId";
					break;
				case 2:
					index = "itemName";
					break;
				case 3:
					index = "quantity";
					break;
				case 4:
					index = "cost";
					break;
				case 5:
					index = "revenue";
					break;
				case 6:
					index = "profit";
					break;
				case 7:
					index = "date";
					break;
			}
			output.id = products[i][0] + index;
			output.name = products[i][0] + index;
			if(j<7){
				output.value = products[i][j];
			}else{
				output.value = products[i][j+1] + "/" + products[i][j] + "/" + products[i][j+2];
			}
			output.readOnly = true;
			output.className = "table";
			rowcol.appendChild(output);
		}
		tbody.appendChild(row);
	}
	var div = document.getElementById("Product_Panel");
	div.appendChild(table);
}