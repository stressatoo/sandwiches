var dl = console.log.bind(console, "DEBUG: ");
// controlla se siamo sulla pagina view_orders.php
if (window.location.pathname.includes("view_orders.php")) {
  const ordersTable = document.getElementById("ordersTable");

  // effettua una richiesta AJAX per ottenere gli ordini
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // parse come JSON
        const orders = JSON.parse(xhr.responseText);

        // cicla tra gli ordini e inserisce su ordersTable
        for (const order of orders) {
          if (ordersTable) {
            const row = ordersTable.insertRow();
            row.insertCell().textContent = order.id;
            row.insertCell().textContent = order.student_class;
            row.insertCell().textContent = order.sandwich;
          } else {
            console.error("ordersTable == null");
          }
        }
      } else {
        console.error("Errore nell'ottenimento degli ordini: " + xhr.status);
      }
    }
  };
  xhr.open("GET", "get_orders.php");
  xhr.send();
} else {
  // esegue l'ordine
  const orderForm = document.getElementById("order-form");
  orderForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const formData = new FormData(orderForm);
    // effettua una richiesta AJAX per salvare l'ordine
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          alert("Ordine effettuato!");
          dl("Ordine effettuato!");
          orderForm.reset();
        } else {
          console.error("Errore nel salvataggio dell'ordine: " + xhr.status);
        }
      }
    };
    dl("50");
    xhr.open("POST", "save_order.php");
    xhr.send(formData);
  });
}
dl("EOF");
