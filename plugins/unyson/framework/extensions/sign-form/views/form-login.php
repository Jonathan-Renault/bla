<?php
/**
 * @var int $rand
 * @var string $redirect_to
 * @var string $redirect
 * @var string $forms
 * @var string $login_descr
 */
$can_register	 = get_option( 'users_can_register' );
$ext			 = fw_ext( 'sign-form' );

$classes	 = array( 'content' );
$classes[]	 = $ext->get_config( 'selectors/formLogin' );
$classes[]	 = $ext->get_config( 'selectors/form' );
?>
<div class="title h6"></div>
<form data-handler="<?php echo esc_attr( $ext->get_config( 'actions/signIn' ) ); ?>" class="<?php echo implode( ' ', $classes ); ?>" method="POST" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>">
    <input type="hidden" value="<?php echo wp_create_nonce( 'crumina-sign-form' ); ?>" name="_ajax_nonce" />

    <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>"/>
    <input type="hidden" name="redirect" value="<?php echo esc_attr( $redirect ); ?>"/>

	<?php echo apply_filters( 'login_form_top', '' ); ?>
	<?php do_action( 'logy_before_login_fields' ); ?>

    <ul class="crumina-sign-form-messages"></ul>

    <div class="row">
        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="form-group label-floating">
                <label class="control-label"><?php esc_html_e( 'E-mail', 'crum-ext-sign-form' ); ?></label>
                <input class="form-control" name="log" >
            </div>
            <div class="form-group label-floating password-eye-wrap">
                <label class="control-label"><?php esc_html_e( 'Mot de passe', 'crum-ext-sign-form' ); ?></label>
                <a href="#" class="fa fa-fw fa-eye password-eye" tabindex="-1"></a>
                <input class="form-control" name="pwd"  type="password">
            </div>

            <div class="remember">

                <div class="checkbox">
                    <label>
                        <input name="rememberme" value="forever" type="checkbox">
						<?php esc_html_e( 'Se souvenir de moi', 'crum-ext-sign-form' ); ?>
                    </label>
                </div>

				<?php $lostpswd	 = apply_filters( 'yz_lostpassword_url', wp_lostpassword_url() ); ?>

                <a href="<?php echo esc_url( $lostpswd ); ?>" class="forgot"><?php esc_html_e( 'Mot de passe oublié ?', 'crum-ext-sign-form' ); ?></a>
            </div>

            <?php echo do_shortcode('[miniorange_social_login shape="square" theme="default" space="4" size="35"]') ?>

            <button type="submit" class="btn btn-lg btn-primary full-width">
                <span><?php esc_html_e( 'Se connecter', 'crum-ext-sign-form' ); ?></span>
                <span class="icon-loader"></span>
            </button>


			<?php echo apply_filters( 'login_form_bottom', '' ); ?>

			<?php
			if ( $can_register ) {

				if ( $login_descr ) {
					echo wp_kses_post( wpautop( do_shortcode( $login_descr ) ) );
				} else {
					echo sprintf(
					        '<p>%s <a href="%s">%s</a> %s</p>',
                            esc_html__( 'Pas encore de compte ?', 'crum-ext-sign-form' ),
                            esc_url( wp_registration_url() ),
                            esc_html__( 'Rejoignez Bojelo maintenant !', 'crum-ext-sign-form' ),
                            esc_html__( '', 'crum-ext-sign-form' )
                    );
				}
			}
			?>
        </div>
    </div>
</form>