<?php
/**
 * The template for displaying the footer
 * @package ridgeway
 */
?>

</main>

<footer class="footer mt1">

    <div class="container">
        <div class="section section__extranarrow footer-contact">
            <h4 class="light-text">Contact Us</h4>
            <p class="light-text"><a
                    href="tel:<?php the_field('phone_number', 'options');?>"><?php the_field('phone_number', 'options');?></a>
            </p>
            <p>www.theridgewaybarns.co.uk
            </p>

            <?php get_template_part("template-parts/socials");?>


        </div>

    </div>


    <div class="container">
        <div class="section section__narrow mandatory">
            <p>© The Ridgeway Barns <?php echo date('Y');?> All Rights Reserved
                <span class="no-wrap">
                    <a href="/privacy-policy/">Privacy policy</a> |
                    <a href="/terms-conditions/">Terms & Conditions</a>
                </span>
            </p>
        </div>
    </div>

</footer>
<div class="silverless">
    <div class="container">
        <div class="section section__extranarrow createdby"><a href="https://silverless.co.uk">

                <?php get_template_part('inc/img/silverless', 'logo');?>

            </a></div>
    </div>
</div>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>