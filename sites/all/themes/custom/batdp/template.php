<?php
function batdp_form_alter(&$form, &$form_state, $form_id) {
  // print_r($form_id);
  $form['keys']['#field_prefix'] = '<i class="glyphicon glyphicon-search"></i>';
}