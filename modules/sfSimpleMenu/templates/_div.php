<div class="sf_simple_menu">
  <?php foreach ($Menu as $Item): ?>
  <?php if ($Item->isSeparator()): ?>
  <div class="sf_simple_menu_separator">&nbsp;</div>
  <?php else: ?>
  <div class="sf_simple_menu_item">
    <?php echo $Item->hasURL() ? link_to($Item->getTitle(), $Item->getURL(), array('class' => 'sf_simple_menu_link')) : $Item->getTitle() ?>
    <?php if ($Item->hasSubmenu()): ?>
    <?php include_partial('sfSimpleMenu/div', array('Menu' => $Item->getSubmenu())) ?>
    <?php endif; ?>
  </div>
  <?php endif; ?>
  <?php endforeach ?>
</div>