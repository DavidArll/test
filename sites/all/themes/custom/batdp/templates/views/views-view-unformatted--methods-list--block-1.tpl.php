<<<<<<< HEAD
<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

$n = rand();
$product = mb_strtolower(str_replace(array(" ", "_"), '-', $title));
?>
<div class="panel-group" class="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading product-headline" role="tab" id="heading-<?php echo $n; ?>">
      <h4 class="panel-title">
        <a class="panel-smartdocs" data-id="#collapse-<?php echo $n; ?>" role="button" data-toggle="collapse" data-parent=".accordion" href="#xcollapse-<?php echo $n; ?>" aria-expanded="true" aria-controls="collapseOne">
        <?php if (!empty($title)): ?>
          <h3><?php print $title; ?></h3>
        <?php endif; ?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $n; ?>" class="panel-sidebar collapse" role="tabpanel" aria-labelledby="heading-<?php echo $n; ?>">
      <div class="panel-body">
        <button type="button" name="search_product_api" class="btn btn-success" onclick="selectProduct('<?php echo $product; ?>');">Select</button>
        <div class="clearfix method_details">
          <div class="method_data title-header">Method</div>
        </div>
        <?php foreach ($rows as $id => $row): ?>
          <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
            <?php print $row; ?>
          </div>
        <?php endforeach; ?>
      </div>
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

$n = rand();
$product = mb_strtolower(str_replace(array(" ", "_"), '-', $title));
?>
<div class="panel-group" class="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading product-headline" role="tab" id="heading-<?php echo $n; ?>">
      <h4 class="panel-title">
        <a class="panel-smartdocs" data-id="#collapse-<?php echo $n; ?>" role="button" data-toggle="collapse" data-parent=".accordion" href="#xcollapse-<?php echo $n; ?>" aria-expanded="true" aria-controls="collapseOne">
        <?php if (!empty($title)): ?>
          <h3><?php print $title; ?></h3>
        <?php endif; ?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $n; ?>" class="panel-sidebar collapse" role="tabpanel" aria-labelledby="heading-<?php echo $n; ?>">
      <div class="panel-body">
        <button type="button" name="search_product_api" class="btn btn-success" onclick="selectProduct('<?php echo $product; ?>');">Select</button>
        <div class="clearfix method_details">
          <div class="method_data title-header">Method</div>
        </div>
        <?php foreach ($rows as $id => $row): ?>
          <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
            <?php print $row; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
>>>>>>> bb81adeab27a2aa53de7fc431a1be2f354b09d57
