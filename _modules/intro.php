<?php
  $headline = get_sub_field('headline');
  $text = get_sub_field('text');
  $quickLinks = get_sub_field('quick_links');
  if(get_sub_field('image')) {
    $imageId = get_sub_field('image');
  } else {
    $imageId = get_post_thumbnail_id();
  }
?>

<div class="o-section o-section--blueBg u-padding-top-none-until-sm u-padding-top-md">
  <div class="o-wrapper">
    <div class="o-intro">
      <div class="o-intro__content">
        <?php if($headline): ?><h2 class="c-headline u-size--h2 u-color--white"><?php echo $headline; ?></h2><?php endif; ?>
        <?php if($text): ?><div class="c-rte c-rte--light"><?php echo $text; ?></div><?php endif; ?>
      </div>
      <div class="o-intro__image">
        <?php if($imageId): ?>
          <div class="c-image">
            <?php echo wp_get_attachment_image($imageId, 'intro'); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if($quickLinks): ?>
        <div class="o-intro__quick-links">
          <h3 class="c-eyebrow c-eyebrow--alt u-margin-top-md">Quick Links</h3>
          <div class="o-btn-group u-margin-top-xs">
            <?php foreach($quickLinks as $row): ?>
              <?php $button = $row['link']; ?>
              <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="c-btn c-btn--alt <?php if($button['target']): ?>c-btn--external<?php endif; ?>"><?php echo $button['title']; ?></a>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>