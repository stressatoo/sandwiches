const form = document.getElementById("order-form");
const studentClass = document.getElementById("student-class");
const studentSandwich = document.getElementById("student-sandwich");

form.addEventListener("submit", function(event) {
  event.preventDefault();

  const selectedClass = studentClass.value;
  const selectedSandwich = studentSandwich.value;

  if (!selectedClass || !selectedSandwich) {
    alert("Per favore, seleziona una classe e un panino");
    return;
  }

  const db = new SQL.Database();
  db.run("CREATE TABLE IF NOT EXISTS orders (class TEXT, sandwich TEXT)");
  db.run("INSERT INTO orders (class, sandwich) VALUES (?, ?)", [selectedClass, selectedSandwich]);

  alert("Ordine salvato!");
});
