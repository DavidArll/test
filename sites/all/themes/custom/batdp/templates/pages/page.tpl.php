<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in the ../system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * CUSTOMIZATIONS:
 * - $myappslink: provides a link for the users my apps page (with glyphicon)
 * - $profilelink: provides a link for the user profile page (with glyphicon)
 * - $logoutlink: provides a link for the user to log out (with glyphicon)
 * - $company_switcher: Provides the dropdown to switch companies if
 *   apigee_company module is enabled.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */


$theme_path = '/' . drupal_get_path('theme', 'batdp');
$path_api = preg_match('/^apis/', $current_path);
$path_api_list = preg_match('/^apis\/list/', $current_path);
$path_api_match = ($current_path == 'apis');
$path_api_found = preg_match('#apis#', $_SERVER['REQUEST_URI']);
$api_view = ($path_api_match) ? false : $path_api_list || $path_api_found;
$can_register = (variable_get('user_register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL) != USER_REGISTER_ADMINISTRATORS_ONLY);
list($root, $link_logical_platform) = explode('/', $_SERVER['REQUEST_URI']);
?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="top-menu">
    <?php if (!empty($page['top'])): ?>
      <?php print render($page['top']); ?>
    <?php endif; ?>
  </div>
  <div class="container">
    <div class="navbar-header">
      <?php if ($logo): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <div class="logo-pg">
            <img src="<?php echo $theme_path . '/logo.png'; ?>" alt="<?php print $site_name; ?>" height="57" width="95" />
            <img src="<?php echo $theme_path . '/logo2.png'; ?>" class="logo2" alt="<?php print $site_name; ?>" height="54" width="95" />
          </div>            
        </a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

      <div class="navbar-collapse collapse">
        <nav role="navigation">
          <?php if (!empty($primary_nav)): print render($primary_nav); endif; ?>
          <ul class="menu nav navbar-nav pull-right account-menu"  >
            <?php if (user_is_anonymous()): ?>
              <?php if ($can_register): ?><li class="<?php echo (($current_path == 'user/register') ? 'active' : ''); ?>"><?php echo l(t('Register'), 'user/register'); ?></li><?php endif; ?>
              <li class="<?php echo (($current_path == 'user') ? 'active' : ''); ?>" data-step="1" data-intro="Login with your credentials"><?php echo l(t('Login'), 'user'); ?></li>
            <?php else: ?>
              <li class="first expanded dropdown" data-step="1" data-intro="Make sure you're logged in with the correct credentials.">
                <a data-toggle="dropdown" class="dropdown-toggle" data-target="#" title="" href="/user">
                  <span class="username"><?php print $user_mail_clipped; ?></span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu"><?php print $dropdown_links; ?></ul>
              </li>
              <li class="last">
            <img class="icon1" src="<?php echo $theme_path . '/images/Group115(2).png';?>" height:"25" width="25"/></li>
            <?php endif; ?>
          </ul>
          <?php if (!empty($page['navigation'])): print render($page['navigation']); endif; ?>
        </nav>
      </div>
  </div>
</header>


<div class="master-container<?php echo (!drupal_is_front_page()) ? ' page-inner ' : ''; echo $current_path; ?>">
  <?php if (drupal_is_front_page()): ?>
    <section class="_page-header ">
      <div class="_container">
        <div class="page-header-content">
          <?php print render($page['homepage_header']); ?>
        </div>
        <div class="slider-line"></div>
        <div class="api-category-container">
          <div class="api-category-inner">
            <div class="api-category-pd">

              <?php if ($messages): ?>
                <div class="alert">
                  <?php print $messages; ?>
                </div>
              <?php endif; ?>
              <?php print render($page['apis_categories']); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php else: ?>
    <div class="page-inner-bg"><?php print render($page['help_header']); ?></div>
    <div class="slider-line"></div>
    <?php /*if ($breadcrumb): ?>
    <div class="container" id="breadcrumb-navbar">
      <div class="row">
        <br/>
        <div class="col-md-12">
          <?php print $breadcrumb;?>
        </div>
      </div>
    </div>
    <?php endif;*/ ?>

    <?php if($path_api || $path_api_match): ?>
      <?php print render($title_suffix); ?>
    <?php elseif((!$path_api && $path_api_found) || $current_path == 'blog'):
      // Don't print title
    else: ?>
      <section class="page-header">
        <div class="container">
          <div class="row_">
            <div class="col-md-12_">
                <!-- Title Prefix -->
                <?php print render($title_prefix); ?>
                <!-- Title -->
                <h1><?php print render($title); ?></h1>
                <!-- SubTitle -->
                <?php if (!empty($subtitle)): ?>
                  <br/>
                  <p class="subtitle">
                    <span class="text-muted">
                      <span class="glyphicon glyphicon-info-sign"></span>
                      <?php print render($subtitle); ?>
                    </span>
                  </p>
                <?php endif; ?>
              <!-- Title Suffix -->
              <?php print render($title_suffix); ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

  <?php endif; ?>
  <?php if(!drupal_is_front_page()): ?>
  <div class="<?php echo ($path_api || $path_api_found || $current_path == 'blog' || $current_path == 'resources') ? 'api-page-content clearfix' : 'page-content ';  ?>">
    <div class="main-container <?php echo (!$path_api && !$path_api_found && $current_path != 'blog' && $current_path != 'resources' ) ? 'container' : ''; ?>">

      <header role="banner" id="page-header">
        <?php print render($page['header']); ?>
      </header> <!-- /#page-header -->

      <div class="row_">

        <?php if (!empty($page['sidebar_first']) && !$path_api && !$path_api_found): ?>
          <aside class="col-sm-3" role="complementary">
            <?php print render($page['sidebar_first']); ?>
          </aside>  <!-- /#sidebar-first -->
        <?php endif; ?>


        <section<?php if ($path_api || $path_api_found || $current_path == 'resources') { echo ' class="col-md-12_"'; } elseif ($is_blog_article) {
          echo ' class="col-md-8 "';
        } elseif ($page['sidebar_first'] || $page['sidebar_second']) { /* echo $content_column_class; */ echo ' class="col-sm-9" '; } ?>>

          <?php if($api_view): ?>
          <div class="view view-smartdocs-models view-id-smartdocs_models view-display-id-page">
            <div class="view-filters">
              <div class="view-pd">
                <?php if (!$path_api && $path_api_found): ?>
                  <a href="/apis/list/<?php echo $link_logical_platform; ?>" class="back-to-apis"><i class="glyphicon glyphicon-chevron-left"></i> Back to Logical Platforms</a>
                <?php else: ?>
                  <a href="/apis" class="back-to-apis"><i class="glyphicon glyphicon-chevron-left"></i> Back to Platforms</a>
                <?php endif; ?>

                <?php if (!empty($page['sidebar_apis'])): ?>
                  <aside role="complementary">
                    <?php print render($page['sidebar_apis']); ?>
                  </aside><!-- /#sidebar-second -->
                <?php endif; ?>
              </div>
              &nbsp;
            </div>
            <div class="view-content">
              <div class="api-logical-platforms">
                <?php if (!empty($tabs) && !drupal_is_front_page()): ?>
                  <?php print render($tabs); ?>
                <?php endif; ?>
                <?php if (!empty($page['help'])): ?>
                  <?php print render($page['help']); ?>
                <?php endif; ?>
                <?php if (!empty($action_links)): ?>
                  <ul class="action-links"><?php print render($action_links); ?></ul>
                <?php endif; ?>

                <?php if($path_api): ?>
                <h1>Logical Platform: <?php print render($title); ?></h1>
                <br>
                <?php endif; ?>
                <div class="api-container">
                  <div class="<?php echo ($api_view) ? 'view-pd' : ''; ?>">
                    <?php print render($page['content']); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php else: ?>

            <?php if (!empty($page['highlighted'])): ?>
              <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
            <?php endif; ?>
            <?php if ($messages): ?>
              <div class="row">
                <div class="col-md-12_">
                  <?php print $messages; ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if (!empty($tabs) && !drupal_is_front_page()): ?>
              <?php print render($tabs); ?>
            <?php endif; ?>
            <?php if (!empty($page['help'])): ?>
              <?php print render($page['help']); ?>
            <?php endif; ?>
            <?php if (!empty($action_links)): ?>
              <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>

            <?php print render($page['content']);
            print_r($content); ?>

          <?php endif; ?>

        </section>

        <?php if (!empty($page['sidebar_second']) && !$path_api && !$path_api_found): ?>
          <aside class="<?php echo ($is_blog_article) ? 'col-md-4' : 'col-sm-3'; ?>" role="complementary">
            <?php print render($page['sidebar_second']); ?>
          </aside>  <!-- /#sidebar-second -->
        <?php endif; ?>
        <?php if (!empty($page['page_middle'])): ?>
        <div class="clearfix"></div>
        <section id="page-middle" class="clearfix">
          <?php print render($page['page_middle']); ?>
        </section>
        <?php endif; ?>

      </div>
      <?php if (drupal_is_front_page()): ?>
        <?php if (!empty($page['frontpage_panel_left']) || !empty($page['frontpage_panel_center']) || !empty($page['frontpage_panel_right'])): ?>
          <div class="row">
            <div class="col-sm-4">
              <?php if (!empty($page['frontpage_panel_left'])): ?>
                <?php print render($page['frontpage_panel_left']); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-4">
              <?php if (!empty($page['frontpage_panel_center'])): ?>
                <?php print render($page['frontpage_panel_center']); ?>
              <?php endif; ?>
            </div>
            <div class="col-sm-4">
              <?php if (!empty($page['frontpage_panel_right'])): ?>
                <?php print render($page['frontpage_panel_right']); ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>
  <div id="push"></div>

  <!--FOOTER-->

  <footer class="pg-footer">
      <?php if(drupal_is_front_page()): ?>
      <div class="pg-footer-secondary">
          <div class="footer-container">
              <div class="container">
                <div class="row">
                  <?php print render($page['footer_bottom']); ?>
                </div>
              </div>
          </div>
      </div>
      <?php endif; ?>
      <div class="pg-footer-primary">
          <div class="footer-primary left">

          </div>
          <div class="footer-primary right">

          </div>
          <div class="footer-primary links">
                <?php print render($page['footer']); ?>
          </div>
      </div>
  </footer>
  <!--END-FOOTER-->

</div>
