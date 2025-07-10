<?php $fullMenu = wp_get_nav_menu_items('main-menu'); ?>

<div class="c-full-menu" data-full-menu>
  <button class="c-full-menu__toggle" data-full-menu-toggle>
    <span class="u-hide-visually">Close nav</span>
    <div class="c-full-menu__toggle-icon">
      <?php 
      $closeIcon = locate_template('_assets/icon-close.svg');
      if ($closeIcon) {
          include($closeIcon);
      } else {
          echo '<!-- Icon file not found: icon-close.svg -->';
      }
      ?>
    </div>
  </button>
  <div class="c-full-menu__logo">
    <?php 
    $logoMonogram = locate_template('_assets/logo-monogram.svg');
    if ($logoMonogram) {
        include($logoMonogram);
    } else {
        echo '<!-- Logo file not found: logo-monogram.svg -->';
      }
    ?>
  </div>
  <div class="c-full-menu__wrapper">
    <div class="c-full-menu__nav">
      <?php foreach($fullMenu as $item): ?>
        <?php $curNavItemID = $item->ID; ?>
        <?php if($item->menu_item_parent == 0): ?>
          <div class="c-full-menu__group">
            <div class="c-full-menu__headline">
              <?php if($item->classes): ?>
                <a href="<?php echo $item->url; ?>" class="c-full-menu__headline-link c-full-menu__headline-link--withIcon">
                  <span class="c-full-menu__headline-link-icon">
                    <?php 
                    $iconClass = locate_template('_assets/icon-' . $item->classes[0] . '.svg');
                    if ($iconClass) {
                        include($iconClass);
                    } else {
                        echo '<!-- Icon file not found: icon-' . $item->classes[0] . '.svg -->';
                    }
                    ?>
                  </span>
                  <?php echo $item->title; ?>
                </a>
              <?php else: ?>
                <a href="<?php echo $item->url; ?>" class="c-full-menu__headline-link"><?php echo $item->title; ?></a>
              <?php endif; ?>
            </div>
            <ul class="c-full-menu__items">
              <?php foreach($fullMenu as $group): ?>
                <?php if($group->menu_item_parent == $curNavItemID): ?>
                  <li class="c-full-menu__item">
                    <a href="<?php echo $group->url; ?>" target="<?php echo $group->target; ?>" class="c-full-menu__link <?php if($group->target == "_blank"): ?>c-full-menu__link--withIcon<?php endif; ?>">
                      <?php echo $group->title; ?>
                      <?php if($group->target == "_blank"): ?>
                        <span class="c-full-menu__link-icon">
                          <?php 
                          $iconExternal = locate_template('_assets/icon-external.svg');
                          if ($iconExternal) {
                              include($iconExternal);
                          } else {
                              echo '<!-- External icon file not found: icon-external.svg -->';
                          }
                          ?>
                        </span>
                      <?php endif; ?>
                    </a>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
