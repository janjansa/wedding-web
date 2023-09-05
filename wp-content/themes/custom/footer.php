<div class="cursor cursor--follower cursor--pre-load"></div>
<div class="cursor cursor--main cursor--pre-load">
	<div class="dot">
		<div class="dot__orange-bg"></div>
		<svg class="dot__arrow" width="36" height="36" viewBox="0 0 36 36" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path
				d="M27.7071 18.7071C28.0976 18.3166 28.0976 17.6834 27.7071 17.2929L21.3431 10.9289C20.9526 10.5384 20.3195 10.5384 19.9289 10.9289C19.5384 11.3195 19.5384 11.9526 19.9289 12.3431L25.5858 18L19.9289 23.6569C19.5384 24.0474 19.5384 24.6805 19.9289 25.0711C20.3195 25.4616 20.9526 25.4616 21.3431 25.0711L27.7071 18.7071ZM9 19H27V17H9V19Z"
				fill="white" />
		</svg>
		<svg class="dot__arrow-double" width="42" height="12" viewBox="0 0 42 12" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path
				d="M0.469669 5.46967C0.176776 5.76256 0.176776 6.23744 0.469669 6.53033L5.24264 11.3033C5.53553 11.5962 6.01041 11.5962 6.3033 11.3033C6.59619 11.0104 6.59619 10.5355 6.3033 10.2426L2.06066 6L6.3033 1.75736C6.59619 1.46447 6.59619 0.989592 6.3033 0.696698C6.01041 0.403805 5.53553 0.403805 5.24264 0.696698L0.469669 5.46967ZM13 5.25L1 5.25L1 6.75L13 6.75L13 5.25Z"
				fill="white" />
			<path
				d="M41.5303 6.53033C41.8232 6.23744 41.8232 5.76256 41.5303 5.46967L36.7574 0.696698C36.4645 0.403805 35.9896 0.403805 35.6967 0.696698C35.4038 0.989592 35.4038 1.46447 35.6967 1.75736L39.9393 6L35.6967 10.2426C35.4038 10.5355 35.4038 11.0104 35.6967 11.3033C35.9896 11.5962 36.4645 11.5962 36.7574 11.3033L41.5303 6.53033ZM29 6.75L41 6.75L41 5.25L29 5.25L29 6.75Z"
				fill="white" />
		</svg>
		<div class="dot__play">
			<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
				<path
					d="M29.5 15.4019C31.5 16.5566 31.5 19.4434 29.5 20.5981L14.5 29.2583C12.5 30.413 10 28.9697 10 26.6603L10 9.33974C10 7.03034 12.5 5.58697 14.5 6.74167L29.5 15.4019Z"
					stroke="white" stroke-width="2" />
			</svg>
			
			<!-- <dotlottie-player autoplay loop mode="normal"
				src="<?php echo get_template_directory_uri(); ?>/images/content/waves.lottie">
			</dotlottie-player> -->
		</div>
	</div>
</div>

<script id="__bs_script__">//<![CDATA[
	// document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.27.10'><\/script>".replace("HOST", location.hostname));
//]]></script>

<?php the_field( 'scripts_in_footer', 'option' ); ?>

<?php wp_footer(); ?>
<script type="module" src="<?php echo get_template_directory_uri(); ?>/js/homepageStuff.js"></script>

</body>

</html>