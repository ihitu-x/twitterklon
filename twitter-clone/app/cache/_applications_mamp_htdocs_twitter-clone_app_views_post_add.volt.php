<h1>Unesi novi postic!</h1>

<?php if (isset($errors)) { ?>
    <?php foreach ($errors as $error) { ?>
      <p><?php echo $error; ?></p>
    <?php } ?>
<?php } ?>

<form method="post">
<div class="form-group">
  <label for="email">Email</label>
  <?php echo $this->tag->textField(array('email')); ?>
</div>
<div class="form-group">
  <label for="tekst">Tekst</label>
   <?php echo $this->tag->textArea(array('tekst', 'aaa', 'ccc', 'cols' => '50', 'rows' => 20)); ?>

    <?php echo $this->tag->submitButton(array('Unesi')); ?>
    <?php echo $this->tag->linkTo(array('post/', 'Nazad')); ?>

</form>
