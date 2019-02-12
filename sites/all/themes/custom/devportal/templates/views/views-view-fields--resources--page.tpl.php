<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

?>

<?php foreach ($fields as $id => $field): ?>
  <?php $item[$id] = $field->content; ?>
<?php endforeach; ?>

<div class="card">
	<h3 class="card-heading"><?php print $item['title']; ?></h3>
	<div class="card-left icon <?php print $item['extension']; ?>"><i class="fas fa-file"></i></div>
	<div class="card-body">
		<div class="lang pull-left"><?php print $item['field_rating']; ?></div>
		<div class="date pull-right"><?php print $item['created']; ?></div>
		<div class="description"><?php print $item['body']; ?></div>
	</div>
	<div class="card-footer">
		<ul class="categorization list-inline">
			<li class="rating"><span>Language:</span> <?php print $item['field_language']; ?></li>
			<li class="cat"><span>Category:</span> <div class="label label-primary"><?php print $item['field_category']; ?></div></li>
		</ul>
	</div>
</div>