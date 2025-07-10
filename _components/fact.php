<div class="c-fact">
  <?php if($fact['figure']): ?><div class="c-fact__figure"><?php echo $fact['figure']; ?></div><?php endif; ?>
  <?php if($fact['text']): ?><div class="c-fact__text"><?php echo $fact['text']; ?></div><?php endif; ?>
  <?php if($fact['source']): ?>
    <div class="c-fact__source">
      <a href="<?php echo $fact['source']['url']; ?>" target="_blank"><?php echo $fact['source']['title']; ?></a>
    </div>
  <?php endif; ?>
</div>