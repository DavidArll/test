<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

$n = rand();
$taxonomy = taxonomy_get_term_by_name($title);
?>
<div class="panel-group" class="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php echo $n; ?>">
      <h4 class="panel-title">
        <a class="panel-smartdocs" data-id="#collapse-<?php echo $n; ?>" role="button" data-toggle="collapse" data-parent=".accordion" href="#xcollapse-<?php echo $n; ?>" aria-expanded="true" aria-controls="collapseOne">
        <?php if (!empty($title)): ?>
          <h3><?php print $title; ?></h3>
        <?php endif; ?>
        </a>
      </h4>
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
