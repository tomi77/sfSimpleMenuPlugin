<ul class="sf_simple_menu">
  <?php foreach ($Menu as $Item): ?>
  <li class="sf_simple_menu_item">
    <?php if ($Item->hasURL()): ?>
    <a href="<?php echo url_for($Item->getURL()) ?>" class="sf_simple_menu_link"><?php echo $Item->getTitle() ?></a>
    <?php else: ?>
    <?php echo $Item->getTitle() ?>
    <?php endif; ?>
    <?php if ($Item->hasSubmenu()): ?>
    <?php include_partial('sfSimpleMenu/ul', array('Menu' => $Item->getSubmenu())) ?>
    <?php endif; ?>
  </li>
  <?php endforeach ?>
</ul>