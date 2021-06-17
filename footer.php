<?php
/**
 * The template for displaying the footer
 * @package messels
 */
?>

</main>
<?php

$footerImage = get_field('footer_image', 'options');
$footerBG = get_field('footer_bg', 'options');

?>
<footer class="footer" style="background-image: url(<?php echo $footerBG;?>">
    <div class="row mb0">
        <div class="container">
            <div class="footer__logo-box narrow upper-footer" style="background-image: url(<?php echo $footerImage;?>">

                <?php get_template_part("inc/img/headerlogo");?>

                <a href="" class=" btn btn--darkblue">Join Now</a>

            </div>
        </div>
    </div>
    <div class="row mb0">
        <div class="container">
            <div class="lower-footer narrow">
                <div class="contact-block">
                    <h4 class="light-text">Support</h4>
                    <div class="footer__support">
                        <p>Phone: <a
                                href="tel:<?php the_field('phone_number', 'options');?>"><?php the_field('phone_number', 'options');?></a>
                        </p>
                        <p>Email: <a
                                href="mailto:<?php the_field('email_general', 'options');?>"><?php the_field('email_general', 'options');?></a>
                        </p>
                        <?php get_template_part("template-parts/socials");?>
                    </div>
                </div>
                <div class="site-links">
                    <h4 class="light-text">Links</h4>
                    <div class="footer__navigation">
                        <ul class="footer__list">
                            <li class="footer__item"><a href="#" class="footer__link">Company</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Contact us</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Carrers</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Privacy policy</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Terms</a></li>
                        </ul>
                    </div>

                </div>
                <div class="account-links">
                    <h4 class="light-text">My Account</h4>
                    <p class="footer__copyright">

                        Copyright &copy;
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="footer-bar narrow">
                <div class="copyright">
                    © Messels <?php echo date('Y');?> All Rights Reserved
                </div>
                <div class="terms-links">
                    <a href="/privacy-policy/">Privacy policy</a> |
                    <a href="/terms-conditions/">Terms & Conditions</a>
                </div>
                <div class="silverless">

                    <a href="https://silverless.co.uk">

                        <?php get_template_part('inc/img/silverless', 'logo');?>

                    </a>

                </div>
            </div>
        </div>
    </div>
</footer>


</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>