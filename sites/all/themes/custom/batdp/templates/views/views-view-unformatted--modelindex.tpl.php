<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

$n = rand();
$taxonomy = taxonomy_get_term_by_name($title);
$product = mb_strtolower(str_replace(array(" ", "_"), '-', $title));
?>
<div class="panel-group" class="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php echo $n; ?>">
      <h4 class="panel-title pos-left">
        <a class="panel-smartdocs" data-id="#collapse-<?php echo $n; ?>" role="button" data-toggle="collapse" data-parent=".accordion" href="#xcollapse-<?php echo $n; ?>" aria-expanded="true" aria-controls="collapseOne">
        <?php if (!empty($title)): ?>
          <?php print $title; ?>
        <?php endif; ?>
        </a>
      </h4>
      <a href="/user/<?php echo $user->uid; ?>/apps/add?product=<?php echo $product; ?>" name="add_product" class="btn btn-product pos-right"><i class="glyphicon glyphicon-plus"></i> Add product</a>
      <div class="clearfix"></div>
    </div>
    <?php foreach ($taxonomy as $key => $value): ?>
      <?php if(!empty($value->description)): ?>
        <div class="smartdocs-description">
          <?php echo $value->description; ?>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
    <div id="collapse-<?php echo $n; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $n; ?>">
      <div class="panel-body">
        <div class="clearfix method_details">
          <div class="method_data title-header">Method</div>
          <div class="method_data description-header">Description</div>
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
