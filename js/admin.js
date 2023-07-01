let table = document.getElementById("admin-order-table");

table.addEventListener("click", function (event) {
  let target = event.target;

  if (
    target.classList.contains("food-name") ||
    target.classList.contains("coffee-name")
  ) {
    target.classList.toggle("completed");
  }

  // Save the updated class status to localStorage
  let itemId = target.dataset.itemId; // Assuming you have a unique identifier for each item
  let completedItems = JSON.parse(localStorage.getItem("completedItems")) || [];
  if (target.classList.contains("completed")) {
    completedItems.push(itemId);
  } else {
    completedItems = completedItems.filter((id) => id !== itemId);
  }
  localStorage.setItem("completedItems", JSON.stringify(completedItems));
});

// Restore the class status from localStorage on page load
window.addEventListener("load", function () {
  let completedItems = JSON.parse(localStorage.getItem("completedItems")) || [];
  let tableItems = document.querySelectorAll(".food-name, .coffee-name");

  tableItems.forEach((item) => {
    let itemId = item.dataset.itemId; // Assuming you have a unique identifier for each item
    if (completedItems.includes(itemId)) {
      item.classList.add("completed");
    }
  });
});
