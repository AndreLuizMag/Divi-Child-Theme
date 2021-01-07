<?php

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action('et_after_main_content');

if ('on' === et_get_option('divi_back_to_top', 'false')) : ?>

    <span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if (!is_page_template('page-template-blank.php')) : ?>
    <a href="https://api.whatsapp.com/send?phone=5511999866682" target="_blank" rel="noopener noreferrer" class="wf-whatsappbuttom">
        <div class="icon whatsapp"></div>
    </a>
    <footer class="am-main-footer">

    </footer>

<?php endif;
?>

</div> <!-- #page-container -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/script/script.js"></script>
<?php wp_footer(); ?>
</body>

</html>