// let table = document.getElementById("admin-order-table");

// table.addEventListener("click", function (event) {
//   let target = event.target;

//   if (
//     target.classList.contains("food-name") ||
//     target.classList.contains("coffee-name")
//   ) {
//     target.classList.toggle("completed");
//   }

//   // Save the updated class status to localStorage
//   let itemId = target.dataset.itemId; // Assuming you have a unique identifier for each item
//   let completedItems = JSON.parse(localStorage.getItem("completedItems")) || [];
//   if (target.classList.contains("completed")) {
//     completedItems.push(itemId);
//   } else {
//     completedItems = completedItems.filter((id) => id !== itemId);
//   }
//   localStorage.setItem("completedItems", JSON.stringify(completedItems));
// });

// // Restore the class status from localStorage on page load
// window.addEventListener("load", function () {
//   let completedItems = JSON.parse(localStorage.getItem("completedItems")) || [];
//   let tableItems = document.querySelectorAll(".food-name, .coffee-name");

//   tableItems.forEach((item) => {
//     let itemId = item.dataset.itemId; // Assuming you have a unique identifier for each item
//     if (completedItems.includes(itemId)) {
//       item.classList.add("completed");
//     }
//   });
// });

//add content to the paragraph if a dropdown is selected
const dropdown = document.getElementById("foodDropdown");
const paragraphContainer = document.getElementById("paragraphContainer");

// Add event listener for the change event
dropdown.addEventListener("change", function () {
  // Clear the previous content
  paragraphContainer.innerHTML = "";

  // Get the selected option value
  const selectedValue = dropdown.value;

  // Insert the paragraph based on the selected value
  if (selectedValue === "1") {
    paragraphContainer.innerHTML =
      "<p>Smoked salmon, avocado, cream cheese, cucumber, capers, red onion, dill sliced boiled egg, spinach</p>";
  } else if (selectedValue === "2") {
    paragraphContainer.innerHTML =
      "<p>Halloumi, mushroom, tomato, lettuce, zucchini, fried egg with grilled vegetable relish</p>";
  } else if (selectedValue === "3") {
    paragraphContainer.innerHTML =
      "<p>Serve with berry compote, maple syrup, cream cheese, caramelise banana and fresh fruit</p>";
  }
});
