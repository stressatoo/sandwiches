const ordersTable = document.getElementById('orders');

fetch('get_orders.php')
  .then(response => response.json())
  .then(data => {
    console.log("Dato ricevuto:", data);
    data.forEach(order => {
      const row = document.createElement('tr');
      const classCell = document.createElement('td');
      const sandwichCell = document.createElement('td');

      classCell.textContent = order.class;
      sandwichCell.textContent = order.sandwich;

      row.appendChild(classCell);
      row.appendChild(sandwichCell);
      ordersTable.appendChild(row);
      console.log("Success at view_orders.js line 18");
    });
  })
  .catch(error => console.error(error));