window.onload = createTable;

function createTable() {
	var table = document.createElement("table");
	table.className = "pureTable";
	var head = table.createTHead();
	var row1 = document.createElement("tr");
	var row1col1 = document.createElement("th");
	row1col1.innerHTML = "id";
	var row1col2 = document.createElement("th");
	row1col2.innerHTML = "Item Name";
	var row1col3 = document.createElement("th");
	row1col3.innerHTML = "#In-Stock";
	var row1col4 = document.createElement("th");
	row1col4.innerHTML = "Unit Price";
	var row1col5 = document.createElement("th");
	row1col5.innerHTML = "Sell Price";
	var row1col6 = document.createElement("th");
	row1col6.innerHTML = "Date";
	row1.appendChild(row1col1);
	row1.appendChild(row1col2);
	row1.appendChild(row1col3);
	row1.appendChild(row1col4);
	row1.appendChild(row1col5);
	row1.appendChild(row1col6);
	head.appendChild(row1);
	table.appendChild(head);
	var tbody = table.createTBody();
	for(var i = 0; i < products.length; i++) {
		var row = document.createElement("tr");
		for(var j = 0; j < 6; j++) {
			var rowcol = document.createElement("td");
			row.appendChild(rowcol);
			var output = document.createElement("input");
			var index;
			switch(j) {
				case 0:
					index = "myId";
					break;
				case 1:
					index = "itemName";
					break;
				case 2:
					index = "itemStorage";
					break;
				case 3:
					index = "itemUnitPrice";
					break;
				case 4:
					index = "itemSellPrice";
					break;
				case 5:
					index = "itemDate";
					break;
			}
			output.id = products[i][0] + index;
			output.name = products[i][0] + index;
			if(j<5){
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

function edit() {
	for(var i = 0; i < products.length; i++) {
		for(var j = 1; j < 6; j++) {
			var index;
			switch(j) {
				case 1:
					index = "itemName";
					break;
				case 2:
					index = "itemStorage";
					break;
				case 3:
					index = "itemUnitPrice";
					break;
				case 4:
					index = "itemSellPrice";
					break;
				case 5:
					index = "itemDate";
					break;
			}
			var output = document.getElementById(products[i][0] + index);
			output.style.backgroundColor = "lightyellow";
			output.removeAttribute("readonly");
		}
	}
}
