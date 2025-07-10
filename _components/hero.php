<?php
$pageHeadline = $pageHeadline ?? 'Default Headline';
$imageId = $imageId ?? null;
?>

<?php
  if($pageHeadline) {
    $pageHeadline = $pageHeadline;
  } elseif(get_field('page_headline')) {
    $pageHeadline = get_field('page_headline');
  } else {
    $pageHeadline = get_the_title();
  }
  
  if(!$imageId) {
    if(get_post_thumbnail_id()) {
      $imageId = get_post_thumbnail_id();
    } else {
      $imageId = get_field('default_hero_image', 'options');
    }
  }
?>

<div class="o-section o-section--hero">
  <div class="o-wrapper">
    <h1 class="c-headline c-headline--pageHeadline u-color--offWhite u-margin-bottom-sm"><?php echo $pageHeadline; ?></h1>
    <div class="o-ratio o-ratio--image o-ratio--hero">
      <?php echo wp_get_attachment_image($imageId, 'hero');  ?>
    </div>
  </div>
</div>