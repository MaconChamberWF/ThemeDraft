<?php
  if(!$pageLink['imageId']) {
    $pageLink['imageId'] = get_field('default_hero_image', 'option');
  }
?>

<?php if($pageLink['url']): ?>
<a href="<?php echo $pageLink['url']; ?>" class="c-page-link" <?php if($pageLink['target']): ?>target="<?php echo $pageLink['target']; ?>"<?php endif; ?>>
<?php else: ?>
<div class="c-page-link">
<?php endif; ?>

  <div class="c-page-link__header">
    <div class="c-page-link__image">
      <div class="o-ratio o-ratio--pageLink o-ratio--image">
        <?php echo wp_get_attachment_image($pageLink['imageId'], 'intro'); ?>
      </div>
    </div>
    <?php if($pageLink['headline']): ?><h3 class="c-page-link__headline"><?php echo $pageLink['headline']; ?></h3><?php endif; ?>
  </div>
  <?php if($pageLink['text']): ?>
    <div class="c-page-link__body">
      <div class="c-rte"><?php echo $pageLink['text']; ?></div>
    </div>
  <?php endif; ?>

<?php if($pageLink['url']): ?>
</a>
<?php else: ?>
</div>
<?php endif; ?>

<?php $pageLink = []; ?>