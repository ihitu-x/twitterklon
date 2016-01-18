<h1>Popis Postova!</h1>

<?php foreach ($postovi as $post) { ?>
  <div class="row">
    <div class="col-md-6">
      <?php echo $post->tekst; ?> <?php echo $this->tag->linkTo(array('post/delete/' . $post->id, 'Obrisi')); ?>
    </div>
  </div>
<?php } ?>

<p>
  <?php echo $this->tag->linkTo(array('post/add/', 'Dodaj Post')); ?>
</p>
