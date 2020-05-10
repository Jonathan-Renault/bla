<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package olympus
 */

get_header(); ?>
    <section class="padding40">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 m-auto col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-404-content">
                        <img src="<?php echo get_template_directory_uri() ?>/images/LOGO-bojelo-1.jpg" alt="<?php esc_attr_e( 'Not found', 'olympus' ); ?>" class="w-75 h-75">
                        <div class="crumina-module crumina-heading align-center">
                            <h2 class="h1 heading-title"><?php esc_html_e('La page que vous recherchez est indisponible', 'olympus' ); ?></h2>
                            <p class="heading-text">
	                            <?php esc_html_e( 'Désolé ! La page que vous recherchez a été déplacé ou n\'existes pas. Si vous voulez retourné à la page d\'acceuil cliquez sur le lien suivant', 'olympus' ); ?>
                            </p>
                        </div>

<!--	                    --><?php //get_search_form(); ?>

                        <div class="padding40">
                            <a href="<?php echo home_url();?>" class="btn btn-primary btn-lg"><?php esc_html_e( 'Retourner à l\'accueil', 'olympus' ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();