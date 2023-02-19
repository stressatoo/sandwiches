<table id="orders-table">
  <thead>
    <tr>
      <th>Class</th>
      <th>Sandwich</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

<script>
const tableBody = document.querySelector("#orders-table tbody");

fetch("get_orders.php")
  .then(response => response.json())
  .then(data => {
    data.forEach(order => {
      const row = document.createElement("tr");
      const classCell = document.createElement("td");
      classCell.textContent = order.student_class;
      row.appendChild(classCell);
      const sandwichCell = document.createElement("td");
      sandwichCell.textContent = order.sandwich;
      row.appendChild(sandwichCell);
      tableBody.appendChild(row);
    });
  });
</script>
