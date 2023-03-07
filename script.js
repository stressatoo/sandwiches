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
      alert("Il tuo ordine è stato effettuato correttamente!"); // Scendi alle ore x o ore y
    } else if (xhr.readyState === 4 && xhr.status !== 200) {
      // There was an error saving the order to the database
      alert("Abbiamo riscontrato un errore, per favore, ritenta.");
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
    var tableHtml = "<table><thead><tr><th>Classe</th><th>Panino</th></tr></thead><tbody>";
    for (var i = 0; i < orders.length; i++) {
      tableHtml += "<tr><td>" + orders[i].class + "</td><td>" + orders[i].sandwich + "</td></tr>";
    }
    tableHtml += "</tbody></table>";

    // Display the HTML table on the page
    document.getElementById("orders-container").innerHTML = tableHtml;
  }
};
xhr.send();
// Get the order form
const orderForm = document.getElementById("order-form");

// Add event listener to the order form
orderForm.addEventListener("submit", (e) => {
  // Prevent the default form submission
  e.preventDefault();
  console.log("here's a test");
  // Get the values of the selected class and sandwich
  const selectedClass = document.getElementById("class-select").value;
  const selectedSandwich = document.getElementById("sandwich-select").value;

  // Send the order data to the server
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_order.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
      orderForm.reset();
    } else {
      console.log("Richiesta fallita. Status: " + xhr.status);
    }
  };
  xhr.send(`class=${selectedClass}&sandwich=${selectedSandwich}`);
});

// Get the orders list
const ordersList = document.getElementById("orders-list");
console.log("Got orders-list at line 72");

// Load the orders from the server
const loadOrders = () => {
  // Send an HTTP GET request to the server
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "get_orders.php");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
      const orders = JSON.parse(xhr.responseText);
      ordersList.innerHTML = "";

      // Loop through the orders and display them in the list
      orders.forEach((order) => {
        const li = document.createElement("li");
        li.appendChild(
          document.createTextNode(`Classe: ${order.class}, Panino: ${order.sandwich}`)
        );
        console.log("Got out of li.appendChild() at line 91");
        ordersList.appendChild(li);
      });
    } else {
      console.log("Richiesta fallita. Status: " + xhr.status);
    }
  };
  xhr.send();
};

// Load the orders initially and then poll the server every 5 seconds
loadOrders();
setInterval(loadOrders, 5000);
console.log("Success at script.js line 104 (EOF)");
/*
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
var_dump($data);
*/