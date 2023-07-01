<h1>Admin Page</h1>

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
    <button type="submit" name="completed">Completed</button></form>
</td>
</tr>
<?php endforeach ?>

</table>