<?php
  if($block['image']) {
    $imageId = $block['image'];
  } else {
    $imageId = get_field('default_hero_image', 'option');
  }
?>

<div class="c-message">
  <div class="o-ratio o-ratio--pageLink o-ratio--image">
    <?php echo wp_get_attachment_image($imageId, 'intro'); ?>
  </div>
  <h3 class="c-headline"><?php echo $block['headline']; ?></h3>
  <div class="c-rte"><?php echo $block['text']; ?></div>
</div>