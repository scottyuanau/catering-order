<?php if (!empty($errors)): ?>

<div class="error-summary">
  <p>Please fix the following errors:</p>
  <ul>
    <?php foreach ($errors as $error): ?>
      <li><?= $error ?></li>
    <?php endforeach ?>
  </ul>
</div>

<?php endif ?>
<?php if (!empty($_SESSION['errors'])): ?>

<div class="error-summary">
  <p>Please fix the following errors:</p>
  <ul>
    <?php foreach ($_SESSION['errors'] as $error): ?>
      <li><?= $error ?></li>
    <?php endforeach ?>
    <!-- clear errors after displaying it -->
    <?php $_SESSION['errors'] = []?>
  </ul>
</div>

<?php endif ?>