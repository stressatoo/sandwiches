// Add an event listener to the order button
document.getElementById("order-btn").addEventListener("click", function() {
  // Get the values of the selected class and sandwich
  var classSelected = document.getElementById("class-select").value;
  var sandwichSelected = document.getElementById("sandwich-select").value;

  // Send an HTTP POST request to save_order.php to save the order to the database
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "save_order.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // The order was successfully saved to the database
      alert("Your order has been placed!");
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      // There was an error saving the order to the database
      alert("There was an error placing your order. Please try again.");
    }
  };
  xhr.send("class=" + classSelected + "&sandwich=" + sandwichSelected);
});

// Send an HTTP GET request to get_orders.php to retrieve the orders from the database
var xhr = new XMLHttpRequest();
xhr.open("GET", "get_orders.php", true);
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    // The response from the server is a JSON object with the order data
    var orders = JSON.parse(xhr.responseText);

    // Build the HTML table to display the orders
    var tableHtml = "<table><thead><tr><th>Class</th><th>Sandwich</th></tr></thead><tbody>";
    for (var i = 0; i < orders.length; i++) {
      tableHtml += "<tr><td>" + orders[i].class + "</td><td>" + orders[i].sandwich + "</td></tr>";
    }
    tableHtml += "</tbody></table>";

    // Display the HTML table on the page
    document.getElementById("orders-container").innerHTML = tableHtml;
  }
};
xhr.send();
