<h1>Welcome</h1>
<p>Select your meal & coffee, and we will serve to you.</p>
<form action="thanks.php" method="post" class="order-form">
<lable for="name">Your Name*</lable>
<input name="name" type="text" required>
<label for="meal">Select Meal*</label>
<select name="meal" required>
    <option value="1">Salmon & Avocado Bagel (10/10)</option>
    <option value="2">Grilled Halloumi Burger (10/10)</option>
    <option value="3">Brioche French Toast (10/10)</option>
  </select>

  <lable for="coffee">Your Drink:*</lable>
<input name="coffee" type="text" required>

<button type="submit" name="order">Order Now</button>
</form>