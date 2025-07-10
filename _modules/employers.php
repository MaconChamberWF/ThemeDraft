<?php 
  $headline = get_sub_field('headline') ?? null;
  $text = get_sub_field('text') ?? null;
  $employers = get_sub_field('employers') ?? null;
?>
<?php if($employers): ?>
<?php shuffle($employers); ?>
<div class="o-section o-section--offWhiteBg">
  <div class="o-wrapper">
    <?php if($headline): ?>
      <h2 class="c-headline u-size--h2 u-align--center u-margin-bottom-md"><?php echo $headline; ?></h2>
    <?php endif; ?>
    <div class="o-grid o-grid--gutters-sm o-grid--justifyCenter">
      <?php foreach($employers as $employer): ?>
        <div class="o-grid__item u-width-1/1 u-width-1/2@xs u-width-1/4@lg">
          <?php include(locate_template('_components/employer.php')); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>