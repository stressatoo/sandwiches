var dl = console.log.bind(console, "DEBUG: ");
// check if we're on the view orders page
if (window.location.pathname.includes("view_orders.php")) {
  const ordersTable = document.getElementById("ordersTable");

  // make an AJAX request to get the orders
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // parse the response as JSON
        const orders = JSON.parse(xhr.responseText);

        // loop through the orders and add them to the table
        for (const order of orders) {
          if (ordersTable) {
            const row = ordersTable.insertRow();
            row.insertCell().textContent = order.id;
            row.insertCell().textContent = order.student_class;
            row.insertCell().textContent = order.sandwich;
          } else {
            console.error("ordersTable is null");
          }
        }
      } else {
        console.error("Error getting orders: " + xhr.status);
      }
    }
  };
  xhr.open("GET", "get_orders.php");
  xhr.send();
} else {
  // submit order form
  const orderForm = document.getElementById("order-form");
  orderForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(orderForm);
    // make an AJAX request to save the order
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          alert("Order submitted successfully!");
          dl("Order submitted successfully!");
          orderForm.reset();
        } else {
          console.error("Error saving order: " + xhr.status);
        }
      }
    };
    dl("50");
    xhr.open("POST", "save_order.php");
    xhr.send(formData);
  });
}
dl("EOF");
