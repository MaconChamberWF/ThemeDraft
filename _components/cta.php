<?php
  if($cta['image']) {
    $imageId = $cta['image'];
  } else {
    $imageId = get_field('default_hero_image', 'option');
  }

  $imageArray = wp_get_attachment_image_src($imageId, 'large');
  $imageUrl = $imageArray[0];
?>

<div class="c-cta" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(<?php echo $imageUrl; ?>)">
  <?php if($cta['button']): ?>
    <a href="<?php echo $cta['button']['url']; ?>" target="<?php echo $cta['button']['target']; ?>" class="c-btn"><?php echo $cta['button']['title']; ?></a>
  <?php endif; ?>
</div>