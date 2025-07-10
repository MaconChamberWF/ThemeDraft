<?php
  if(get_sub_field('eyebrow')) {
    $eyebrow = get_sub_field('eyebrow');
  } else {
    $eyebrow = 'Fast Facts';
  }

  if(get_sub_field('headline')) {
    $headline = get_sub_field('headline');
  } else {
    $headline = 'Macon By The Numbers';
  }

  $facts = get_sub_field('facts');
?>

<div class="o-section o-section--offWhiteBg">
  <div class="o-wrapper">
    <div class="o-facts">
      <div class="o-facts__intro">
        <?php if($eyebrow): ?><h2 class="c-eyebrow u-color--red"><?php echo $eyebrow; ?></h2><?php endif; ?>
        <?php if($headline): ?><div class="c-headline u-size--h2"><?php echo $headline; ?></div><?php endif; ?>
      </div>
      <?php if($facts): ?>
        <div class="o-facts__facts">
          <div class="o-grid o-grid--gutters-sm o-grid--facts">
            <?php foreach($facts as $fact): ?>
              <div class="o-grid__item u-width-1/2@sm">
                <?php include(locate_template('_components/fact.php')); ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?> 
    </div>
  </div>
</div>