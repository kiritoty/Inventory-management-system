window.onload = createTable;

function createTable() {
	var table = document.createElement("table");
	table.className = "cinereousTable";
	table.style.width = "50%";
	var head = table.createTHead();
	var row1 = document.createElement("tr");
	var row1col1 = document.createElement("th");
	row1col1.innerHTML = "id";
	var row1col2 = document.createElement("th");
	row1col2.innerHTML = "Item Name";
	var row1col3 = document.createElement("th");
	row1col3.innerHTML = "quantity";
	var row1col4 = document.createElement("th");
	row1col4.innerHTML = "cost";
	var row1col5 = document.createElement("th");
	row1col5.innerHTML = "revenue";
	var row1col6 = document.createElement("th");
	row1col6.innerHTML = "profit";
	var row1col7 = document.createElement("th");
	row1col7.innerHTML = "date";
	var row1col8 = document.createElement("th");
	row1col8.innerHTML = "month";
	var row1col9 = document.createElement("th");
	row1col9.innerHTML = "year";
	row1.appendChild(row1col1);
	row1.appendChild(row1col2);
	row1.appendChild(row1col3);
	row1.appendChild(row1col4);
	row1.appendChild(row1col5);
	row1.appendChild(row1col6);
	row1.appendChild(row1col7);
	row1.appendChild(row1col8);
	row1.appendChild(row1col9);
	head.appendChild(row1);
	table.appendChild(head);
	var tbody = table.createTBody();
	for(var i = 0; i < products.length; i++) {
		var row = document.createElement("tr");
		for(var j = 1; j < 10; j++) {
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
		tbody.appendChild(row);
	}
	var div = document.getElementById("Product_Panel");
	div.appendChild(table);
}