<h1 class="homepage-h1">Welcome</h1>
<p>Select your meal & coffee, and we will serve to you.</p>
<form action="thanks.php" method="post" class="order-form">
<lable for="name">Your Name*</lable>
<input name="name" type="text" placeholder="enter your name..."  required>
<label for="meal">Select Meal*</label>
<select name="meal" id="foodDropdown" required>

    <option value="1" <?=$meal1Quantity ===0 ? "disabled":"" ?>>Salmon & Avocado Bagel (<?=$meal1Quantity?>/10)</option>
    <option value="2" <?=$meal2Quantity ===0 ? "disabled":"" ?>>Grilled Halloumi Burger (<?=$meal2Quantity?>/10)</option>
    <option value="3" <?=$meal3Quantity ===0 ? "disabled":"" ?>>Brioche French Toast (<?=$meal3Quantity?>/10)</option>
  </select>
  <div id="paragraphContainer"><p>Smoked salmon, avocado, cream cheese, cucumber, capers, red onion, dill sliced boiled egg, spinach</p></div>
  <lable for="coffee">Your Drink:*</lable>
<input name="coffee" type="text" placeholder="e.g. soy flat white, cap, almond latte, etc" required>

<button type="submit" name="order">Order Now</button>
</form>