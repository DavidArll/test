<<<<<<< HEAD
    <?php if ($teaser): ?>
      <div class="col-md-4">
    <?php endif; ?>

    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($teaser): ?>
    <div class="row teaser node-body">
      
      <br/>
      <div class="col-sm-12 posted">
        <?php if (($display_submitted) && ($teaser)): ?>
          <div class="node-date">
            <div class="month"><?php print $submitted_month; ?></div>
            <div class="day"><?php print $submitted_day; ?></div>
          </div>
        <?php endif; ?>
     
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php print render($title_suffix); ?>
        
        <?php
        // Hide comments, tags, and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_tags']);
        //print render($content);
        echo('<div class="teaser-img">');
        print render($content['field_blog_image']);
        echo('</div>');
        echo('<div class="teaser-text">');
        print render($content['body']);
        echo('</div>');
        ?>


      </div>
    </div>
    <div class="row">
      <br/>
      <br/>
      <div class="col-sm-1"></div>
      <div class="col-sm-11">
        <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
          <footer>
            <?php print render($content['field_tags']); ?>
            <?php print render($content['links']); ?>
          </footer>

        <?php endif; ?>


      </div>
    </div>
    <hr/>
    <?php print render($content['comments']); ?>



  <?php else: ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    </header>
    <div class="blog_image">
      <?php print render($content['field_blog_image']); ?>
    </div>
    <?php //var_dump($node); ?>
    <div class="blog_meta">
      <ul class="list-inline">
        <li class="date"><i class="icon-calendar"></i> <?php echo date("M j, Y", $node->created); ?></li>
        <li class="category"><i class="fa fa-tag"></i> <?php print render($content['field_keywords']); ?></li>
        
      </ul>
    </div>
    <?php if (isset($posted)) { ?>
      <div class="posted"><?php print $posted; ?></div>
    <?php } ?>
    <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    hide($content['field_blog_image']);
    hide($content['field_keywords']);
    print render($content);
    ?>
    <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
      <footer>
        <?php print render($content['field_tags']); ?>
        <?php print render($content['links']); ?>
        <?php if (!empty($content['comments'])) { ?>
          <hr>
        <?php } ?>
      </footer>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  <?php endif; ?>

</article> <!-- /.node -->
<?php if ($teaser): ?>
  </div>
=======
    <?php if ($teaser): ?>
      <div class="col-md-4">
    <?php endif; ?>

    <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ($teaser): ?>
    <div class="row teaser node-body">
      
      <br/>
      <div class="col-sm-12 posted">
        <?php if (($display_submitted) && ($teaser)): ?>
          <div class="node-date">
            <div class="month"><?php print $submitted_month; ?></div>
            <div class="day"><?php print $submitted_day; ?></div>
          </div>
        <?php endif; ?>
     
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
        <?php print render($title_suffix); ?>
        
        <?php
        // Hide comments, tags, and links now so that we can render them later.
        hide($content['comments']);
        hide($content['links']);
        hide($content['field_tags']);
        //print render($content);
        echo('<div class="teaser-img">');
        print render($content['field_blog_image']);
        echo('</div>');
        echo('<div class="teaser-text">');
        print render($content['body']);
        echo('</div>');
        ?>


      </div>
    </div>
    <div class="row">
      <br/>
      <br/>
      <div class="col-sm-1"></div>
      <div class="col-sm-11">
        <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
          <footer>
            <?php print render($content['field_tags']); ?>
            <?php print render($content['links']); ?>
          </footer>

        <?php endif; ?>


      </div>
    </div>
    <hr/>
    <?php print render($content['comments']); ?>



  <?php else: ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
    </header>
    <div class="blog_image">
      <?php print render($content['field_blog_image']); ?>
    </div>
    <?php //var_dump($node); ?>
    <div class="blog_meta">
      <ul class="list-inline">
        <li class="date"><i class="icon-calendar"></i> <?php echo date("M j, Y", $node->created); ?></li>
        <li class="category"><i class="fa fa-tag"></i> <?php print render($content['field_keywords']); ?></li>
        
      </ul>
    </div>
    <?php if (isset($posted)) { ?>
      <div class="posted"><?php print $posted; ?></div>
    <?php } ?>
    <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    hide($content['field_blog_image']);
    hide($content['field_keywords']);
    print render($content);
    ?>
    <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
      <footer>
        <?php print render($content['field_tags']); ?>
        <?php print render($content['links']); ?>
        <?php if (!empty($content['comments'])) { ?>
          <hr>
        <?php } ?>
      </footer>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  <?php endif; ?>

</article> <!-- /.node -->
<?php if ($teaser): ?>
  </div>
>>>>>>> bb81adeab27a2aa53de7fc431a1be2f354b09d57
<?php endif; ?>