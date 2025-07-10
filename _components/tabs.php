<?php 
  $tabs = $tabs ?? get_sub_field('tabs') ?? null;
?>

<div class="c-tabs" data-tabs>
  <div class="c-tabs__nav-wrap">
    <ul class="c-tabs__nav">
      <?php $count = 0; ?>
      <?php foreach($tabs as $tab): ?>
        <li class="c-tabs__nav-item <?php if($count == 0): ?>is-active<?php endif; ?>" data-tab="<?php echo 'tab-' . $count++; ?>"><?php echo $tab['tab_label']; ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="c-tabs__content-wrap">
    <?php $count = 0; ?>
    <?php foreach($tabs as $tab): ?>
      <section class="c-tabs__panel <?php if($count == 0): ?>is-active<?php endif; ?>" data-tabpanel="<?php echo 'tab-' . $count++; ?>" >
        <div class="c-tabs__panel-image">
          <?php if($tab['image']): ?>
            <div class="c-image">
              <?php echo wp_get_attachment_image($tab['image'], 'intro'); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="c-tabs__panel-body">
          <?php if($tab['eyebrow']): ?><h3 class="c-eyebrow u-color--offWhite"><?php echo $tab['eyebrow']; ?></h3><?php endif; ?>
          <?php if($tab['headline']): ?><div class="c-headline u-size--h4 u-color--white"><?php echo $tab['headline']; ?></div><?php endif; ?>
          <?php if($tab['text']): ?><div class="c-rte c-rte--light"><?php echo $tab['text']; ?></div><?php endif; ?>
        </div>
      </section>
    <?php endforeach; ?>
  </div>
</div>