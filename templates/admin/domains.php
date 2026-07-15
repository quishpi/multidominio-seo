<?php

declare(strict_types=1);

defined('ABSPATH') || exit;
?>

<div class="wrap">

    <h1 class="wp-heading-inline">
        <?php esc_html_e('Dominios', 'multidominio-seo'); ?>
    </h1>

    <a href="#" class="page-title-action">
        <?php esc_html_e('Agregar dominio', 'multidominio-seo'); ?>
    </a>

    <hr class="wp-header-end">

    <?php if (empty($domains)) : ?>

        <div class="notice notice-info inline">

            <p>

                <?php esc_html_e(
                    'Todavía no existen dominios configurados.',
                    'multidominio-seo'
                ); ?>

            </p>

        </div>

    <?php else : ?>

        <table class="widefat striped">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Host</th>

                    <th>Idioma</th>

                    <th>Título</th>

                    <th>Principal</th>

                    <th>Activo</th>

                </tr>

            </thead>

            <tbody>

            <?php foreach ($domains as $domain) : ?>

                <tr>

                    <td><?= esc_html($domain->getId()); ?></td>

                    <td><?= esc_html($domain->getHost()); ?></td>

                    <td><?= esc_html($domain->getLanguage()); ?></td>

                    <td><?= esc_html($domain->getTitle()); ?></td>

                    <td><?= $domain->isPrimary() ? 'Sí' : 'No'; ?></td>

                    <td><?= $domain->isEnabled() ? 'Sí' : 'No'; ?></td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

</div>
