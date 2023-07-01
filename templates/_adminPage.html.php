<h1>Admin Page</h1>
<section class="admin-section">
<h2>Manage Orders</h2>
<table id="admin-order-table">
    <tr>
        <th>Customer Name</th>
        <th>Order Item</th>
        <th>Coffee</th>
        <th>Action</th>
    </tr>
<?php foreach($orders as $order):?>
    <tr>
<td><?=$order["customerName"]?></td>
<td class="food-name" data-item-id=<?= $dataItemId+$order["orderId"];?>><?=$ordersObj->getItemName($order["itemId"])["itemName"]?></td>
<td class="coffee-name" data-item-id=<?= $dataItemId+$order["orderId"]+1;?>><?=$order["coffee"]?></td>
<td>
    <form action="admin.php" method="post">
    <input type="hidden" name="orderId" value="<?=$order["orderId"]?>">
    <button type="submit" name="completed">Done</button></form>
</td>
</tr>
<?php endforeach ?>

</table>
</section>

<section class="admin-section">
<h2>Manage Inventory</h2>
<form action="admin.php" method="post" class="manage-inventory-form">

<?php foreach($inventories as $inventory):?>
<div class="form-row">
<label for="item<?=$inventory["itemId"]?>"><?=$inventory["itemName"]?>: </label>
<input type="hidden" value="<?=$inventory["itemId"]?>" name="item<?=$inventory["itemId"]?>">
<input type="text" value="" name="itemQuantity<?=$inventory["itemId"]?>">
<button type="submit" name="setQuantity<?=$inventory["itemId"]?>">Set Quantity</button>
</div>
<div class="form-row-current">
Current Quantity: <?=$ordersObj->getInventoryQuantity($inventory["itemId"])["inventory"]?>
</div>

<?php endforeach?>

</form>
</section>
<script src="./js/admin.js"></script>