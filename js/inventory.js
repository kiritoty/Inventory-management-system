window.onload = createTable;

function createTable() {
	var table = document.createElement("table");
	var row1 = table.insertRow(0);
	var row1col1 = row1.insertCell(0);
	row1col1.innerHTML = "id";
	var row1col2 = row1.insertCell(1);
	row1col2.innerHTML = "Item Name";
	var row1col3 = row1.insertCell(2);
	row1col3.innerHTML = "# In-Stock";
	var row1col4 = row1.insertCell(3);
	row1col4.innerHTML = "Unit Price";
	var row1col5 = row1.insertCell(4);
	row1col5.innerHTML = "Sell Price";
	var row1col6 = row1.insertCell(5);
	row1col6.innerHTML = "Date";
	var row1col7 = row1.insertCell(6);
	row1col7.innerHTML = "Month";
	var row1col8 = row1.insertCell(7);
	row1col8.innerHTML = "Year";
	for(var i = 0; i < products.length; i++) {
		var row = table.insertRow(i + 1);
		for(var j = 0; j < 8; j++) {
			var rowcol = row.insertCell(j);
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
				case 6:
					index = "itemMonth";
					break;
				case 7:
					index = "itemYear";
					break;
			}
			output.id = products[i][0] + "." + index;
			output.name = products[i][0] + index;
			output.value = products[i][j];
			output.readOnly = true;
			output.className = "haha";
			rowcol.appendChild(output);
		}
	}
	var div = document.getElementById("Product_Panel");
	div.appendChild(table);
}

function edit() {
	for(var i = 0; i < products.length; i++) {
		for(var j = 1; j < 8; j++) {
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
				case 6:
					index = "itemMonth";
					break;
				case 7:
					index = "itemYear";
					break;
			}
			var output = document.getElementById(products[i][0] + "." + index);
			output.removeAttribute("readonly");
		}
	}
}
