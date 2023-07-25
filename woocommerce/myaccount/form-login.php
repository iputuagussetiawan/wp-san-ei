<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$currentLang = pll_current_language();
do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="u-columns col2-set row <?php if ( is_page('my-account') ) echo "my-account-form"; ?>" id="customer_login">

<?php endif; ?>
	<div class="col-md-10 offset-md-1">
		<div class="row">
			<div class="u-column1 col-6 image-holder">
				<img class="img-fit" src="<?php echo get_stylesheet_directory_uri() . '/images/login.jpg'?>" alt="Login and register image">
			</div>
			<div class="u-column1 col-6 form-holder">
				<form class="woocommerce-form woocommerce-form-login login" method="post">
					<h3 class="section-title"><?php echo pll__('Login')?></h3>
					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>
					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<span class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
						</span>
						<input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" />
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="form-row">
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme checkbox container-checkbox">
							<?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span class="checkmark"></span>
						</label>
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					</p>
					
					<button type="submit" class="woocommerce-button button woocommerce-form-login__submit btn btn-login" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
					<?php do_action( 'woocommerce_login_form_end' ); ?>

					<p class="register-link"><span><?php echo pll__('Dont Have an Account?')?></span> 
						<a href="<?php if ($currentLang=='en') {?>
			              		<?php echo get_option("siteurl"); ?>/register
			              	<?php } elseif ($currentLang=='id') { ?>
			              	   	<?php echo get_option("siteurl"); ?>/id/daftar
			              	<?php } ?>"><?php echo pll__('Sign up')?></a>
					</p>
				</form>
			</div>
		</div>
	</div>
	
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>


	<div class="col-md-10 offset-md-1">
		<div class="row">
			<div class="u-column2 col-6 image-holder">
				<img class="img-fit" src="<?php echo get_stylesheet_directory_uri() . '/images/login.jpg'?>" alt="Login and register image">
			</div>
			<div class="u-column2 col-6 form-holder">
				<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
					<h3 class="section-title"><?php echo pll__('Register')?></h3>
					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" minlength="5" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php echo pll__('Please input min 5 character')?>"/><?php // @codingStandardsIgnoreLine ?>
						</p>

					<?php endif; ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="email" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</p>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="password" class="woocommerce-Input woocommerce-Input--text inpu
							t-text" name="password" id="reg_password" autocomplete="new-password" />
						</p>

					<?php else : ?>

						<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>
					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit btn btn-login" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
					</p>

					<p class="register-link mb-50px"><span><?php echo pll__('Already have an account?')?></span> 
						<a href="<?php if ($currentLang=='en') {?>
			              		<?php echo get_option("siteurl"); ?>/login
			              	<?php } elseif ($currentLang=='id') { ?>
			              	   	<?php echo get_option("siteurl"); ?>/id/masuk
			              	<?php } ?>"><?php echo pll__('Sign In')?></a>
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
