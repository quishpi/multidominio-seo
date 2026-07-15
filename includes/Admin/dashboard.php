<?php

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<div class="wrap">

    <h1 class="wp-heading-inline">
        <?php esc_html_e('Multidominio SEO', 'multidominio-seo'); ?>
    </h1>

    <hr class="wp-header-end">

    <div class="notice notice-success inline">

        <p>

            <?php esc_html_e(
                'El plugin se ha instalado correctamente.',
                'multidominio-seo'
            ); ?>

        </p>

    </div>

    <table class="widefat striped">

        <tbody>

            <tr>

                <td width="220">

                    <strong><?php esc_html_e('Versión', 'multidominio-seo'); ?>

                </td>

                <td>

                    <?php echo esc_html(MDS_VERSION); ?>

                </td>

            </tr>

            <tr>

                <td>

                    <strong><?php esc_html_e('PHP', 'multidominio-seo'); ?>

                </td>

                <td>

                    <?php echo esc_html(PHP_VERSION); ?>

                </td>

            </tr>

            <tr>

                <td>

                    <strong><?php esc_html_e('WordPress', 'multidominio-seo'); ?>

                </td>

                <td>

                    <?php echo esc_html(get_bloginfo('version')); ?>

                </td>

            </tr>

            <tr>

                <td>

                    <strong><?php esc_html_e('Sitio principal', 'multidominio-seo'); ?>

                </td>

                <td>

                    <?php echo esc_html(home_url()); ?>

                </td>

            </tr>

        </tbody>

    </table>

</div>
