<?php global $travel; ?>  
    <!-- footer -->
		<footer class="footer">
            <div class="footer__wrapper _anim-item">
                <div class="footer__body">
                    <ul class="footer__contacts">
                        <h3 class="footer__subtitle">Контакты:</h3>
                        <li><a href="tel:<?php echo $travel['phone_digits'];?>" class="footer__link"><?php echo $travel['phone']; ?></a></li>
                        <li><a href="mailto:<?php echo $travel['mail']; ?>" class="footer__link"><?php echo $travel['mail']; ?></a></li>
                    </ul>
                    <div class="footer__partners">
                        <h3 class="footer__subtitle">Партнеры:</h3>
                        <img data-src="<?php echo wp_get_attachment_image_url(carbon_get_theme_option('footer_image'), 'full'); ?>" class="lazy" alt="" src="<?php echo get_template_directory_uri(); ?>/img/icons/loading.gif">
                    </div>
                </div>
                <p class="footer__text"><?php echo carbon_get_theme_option('footer_text'); ?></p>
            </div>
		</footer>
		<!-- /footer -->

	</div>
	<!-- /wrapper -->

<?php wp_footer(); ?>

</body>
</html>