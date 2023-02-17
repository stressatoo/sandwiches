<!DOCTYPE html>
<html>
  <head>
    <title>Paninaro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Lista visibile al paninaro</h1>
    <table id="orders">
      <thead>
        <tr>
          <th>Classe</th>
          <th>Panino</th>
        </tr>
      </thead>
      <tbody id="order-list">
      </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.4.0/sql-wasm.js"></script>
    <script>
      const db = new SQL.Database();
      db.run("CREATE TABLE IF NOT EXISTS orders (class TEXT, sandwich TEXT)");
      const results = db.exec("SELECT * FROM orders");

      const orderList = document.getElementById("order-list");
      results[0].values.forEach(function(order) {
        const row = document.createElement("tr");
        const classCell = document.createElement("td");
        classCell.textContent = order[0];
        row.appendChild(classCell);
        const sandwichCell = document.createElement("td");
        sandwichCell.textContent = order[1];
        row.appendChild(sandwichCell);
        orderList.appendChild(row);
      });
    </script>
  </body>
</html>
