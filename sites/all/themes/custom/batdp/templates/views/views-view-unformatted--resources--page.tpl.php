<<<<<<< HEAD
<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="api-logical-platforms row">
  <div>
    <div class="view-pd">
      <?php foreach ($rows as $id => $row): ?>
        <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
          <?php print $row; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
=======
<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="api-logical-platforms row">
  <div>
    <div class="view-pd">
      <?php foreach ($rows as $id => $row): ?>
        <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
          <?php print $row; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
>>>>>>> bb81adeab27a2aa53de7fc431a1be2f354b09d57
</div>