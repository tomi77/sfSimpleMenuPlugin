<ul class="sf_simple_menu">
  <?php foreach ($Menu as $Item): ?>
  <?php if ($Item->isSeparator()): ?>
  <li class="sf_simple_menu_separator">&nbsp;</li>
  <?php else: ?>
  <li class="sf_simple_menu_item">
    <?php echo $Item->hasURL() ? link_to($Item->getTitle(), $Item->getURL(), array('class' => 'sf_simple_menu_link')) : $Item->getTitle() ?>
    <?php if ($Item->hasSubmenu()): ?>
    <?php include_partial('sfSimpleMenu/ul', array('Menu' => $Item->getSubmenu())) ?>
    <?php endif; ?>
  </li>
  <?php endif; ?>
  <?php endforeach ?>
</ul>