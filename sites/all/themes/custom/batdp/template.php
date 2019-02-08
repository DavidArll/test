<?php

function pg_preprocess_page(&$variables)
{

  $path = current_path();

  if (preg_match('/^apis\/list\//', $path)) {
    $taxomony = taxonomy_get_term_by_name(arg(2));
    $title = null;

    foreach ($taxomony as $tid => $value) {
      if ($value->vocabulary_machine_name == 'smartdocs_models') {
        $title = $value->field_model_display_name['und'][0]['value'];
      }
    }

    if (!is_null($title)) {
      $variables['title'] = $title;
    }

  }

  $variables['is_blog_article'] = false; 

  if(node_is_page($variables['node']) && $variables['node']->type == 'article'){
      $variables['is_blog_article'] = true; 

      $node_wrapper = entity_metadata_wrapper('node', $node);
      $variables['keyword'] = taxonomy_term_load($node->field_keywords['und'][0]['tid']);
      //$keyword = $node_wrapper->field_keywords->value();
      $published_date = date("M j, Y", $node->created);

      $variables['article_data_box'] = '<div class="article_meta">
        <ul class="list-inline list-unstyled">
          <li><span>Published on:</span> '.$published_date.'</li>
          <li><span>Category:</span> '.$keyword->name.'</li>
        </ul>
      </div>'; 
  }

}

function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    $title = drupal_get_title();
    if (!empty($title)) {
      $breadcrumb[] = '<div class="breadcrumb-current">'. $title .'</div>';
    }
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}