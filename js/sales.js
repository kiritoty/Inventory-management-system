window.onload = createTable;

function createTable() {
	var table = document.createElement("table");
	var row1 = table.insertRow(0);
	var row1col1 = row1.insertCell(0);
	row1col1.innerHTML = "itemId";
	var row1col2 = row1.insertCell(1);
	row1col2.innerHTML = "Item Name";
	var row1col3 = row1.insertCell(2);
	row1col3.innerHTML = "quantity";
	var row1col4 = row1.insertCell(3);
	row1col4.innerHTML = "cost";
	var row1col5 = row1.insertCell(4);
	row1col5.innerHTML = "revenue";
	var row1col6 = row1.insertCell(5);
	row1col6.innerHTML = "profit";
	var row1col7 = row1.insertCell(6);
	row1col7.innerHTML = "Date";
	var row1col8 = row1.insertCell(7);
	row1col8.innerHTML = "Month";
	var row1col9 = row1.insertCell(8);
	row1col9.innerHTML = "Year";
	for(var i = 0; i < products.length; i++) {
		var row = table.insertRow(i + 1);
		for(var j = 1; j < 10; j++) {
			var rowcol = row.insertCell(j-1);
			var output = document.createElement("input");
			var index;
			switch(j) {
				case 1:
					index = "itemId";
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
				case 8:
					index = "month";
					break;
				case 9:
					index = "year";
					break;
			}
			output.id = products[i][0] + index;
			output.name = products[i][0] + index;
			output.value = products[i][j];
			output.readOnly = true;
			output.className = "table";
			rowcol.appendChild(output);
		}
	}
	var div = document.getElementById("Product_Panel");
	div.appendChild(table);
}