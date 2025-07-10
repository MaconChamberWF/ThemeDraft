<?php if($employer['link']): ?>
<a href="<?php echo $employer['link']; ?>" target="_blank" class="c-employer">
<?php else: ?>
<div class="c-employer">
<?php endif; ?>

  <?php if($employer['logo']): ?>
    <div class="c-employer__image">
      <?php echo wp_get_attachment_image($employer['logo'], 'medium'); ?>
    </div>
  <?php endif; ?>

<?php if($employer['link']): ?>
</a>
<?php else: ?>
</div>
<?php endif; ?>