<?php
get_header(
    null,
    array(
        'rootClasses' => '--transition-loader',
        'bodyClasses' => '--transition-loader',
    )
);
?>

<?php
get_template_part(
    'includes/section',
    'grain-bg',
);
?>

<?php
get_template_part(
    'includes/section',
    'loader',
    array(
        'classes' => 'c-loader--transition grain-bg grain-bg--feldgrau',
    )
);
?>

<?php
get_template_part(
    'includes/section',
    'navbar',
    array(
        'classes' => '--loader-nav',
    )
);
?>

<?php
get_template_part(
    'includes/section',
    'smoothscroll',
);
?>

<section class="c-404 --loader-prepare">
    <div class="container">
        <h1 class="--loader-big-headline">
            <?php the_field('title_404', 'option'); ?>
        </h1>
        <p class="--loader-fade-in">
            <?php the_field('text_404', 'option'); ?>
        </p>
        <?php $button_404 = get_field('button_404', 'option'); ?>
        <?php if ($button_404) { ?>
            <a class="btn btn--secondary --cursor-orange-small --loader-fade-in" href="<?php echo $button_404['url']; ?>"
                target="<?php echo $button_404['target']; ?>"><?php the_field('button_404_text', 'option'); ?></a>
        <?php } ?>
    </div>
    </div>
</section>


</div> <!-- smooth-content -->
</div> <!-- smooth-wrapper -->

<?php get_footer(); ?>