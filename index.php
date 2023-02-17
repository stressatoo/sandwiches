<script src="index.js"></script>
<link rel="stylesheet" href="style.css"><form id="order-form">

  <label for="student-class">Classe:</label>
  <select id="student-class">
    <option value="">Seleziona una classe</option>
    <option value="1A">1A</option>
    <option value="1B">1B</option>
    <option value="1C">1A</option>
    <option value="1D">1D</option>
    <option value="1E">1E</option>
    <option value="1F">1F</option>
    <option value="1G">1G</option>
    <option value="2A">2A</option>
    <option value="2B">2B</option>
    <option value="2C">2C</option>
    <option value="2D">2D</option>
    <option value="2E">2E</option>
    <option value="2F">2F</option>
    <option value="2G">2G</option>
    <option value="3A">3A</option>
    <option value="3AP">3AP</option>
    <option value="3AT">3AT</option>
    <option value="3B">3B</option>
    <option value="3BP">3BP</option>
    <option value="3BT">3BT</option>
    <option value="3CT">3CT</option>
    <option value="4A">4A</option>
    <option value="4AP">4AP</option>
    <option value="4AT">4AT</option>
    <option value="4B">4B</option>
    <option value="4BP">4BP</option>
    <option value="4BT">4BT</option>
    <option value="4CT">4CT</option>
    <option value="5A">5A</option>
    <option value="5AP">5AP</option>
    <option value="5AT">5AT</option>
    <option value="5B">5B</option>
    <option value="5BP">5BP</option>
    <option value="5BT">5BT</option>
    <option value="5CT">5CT</option>
    <option value="5DT">5DT</option>
  </select>
  <br><br>
  <label for="student-sandwich">Panino:</label>
  <select id="student-sandwich">
    <option value="">Seleziona un panino</option>
    <option value="PB&J"></option>
    <option value="Ham and Cheese"></option>
    <option value="Turkey"></option>
  </select>
  <br><br>
  <input type="submit" value="Avanti">
</form>

<script>
const form = document.getElementById("order-form");

form.addEventListener("submit", function(event) {
  event.preventDefault();

  const studentClass = document.getElementById("student-class").value;
  const studentSandwich = document.getElementById("student-sandwich").value;

  if (!studentClass || !studentSandwich) {
    alert("Per favore, seleziona una classe e un panino");
    return;
  }

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_order.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      alert("Ordine salvato!");
    }
  };
  xhr.send(`student-class=${studentClass}&student-sandwich=${studentSandwich}`);
});
</script>