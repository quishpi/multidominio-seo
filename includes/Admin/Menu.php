<?php

declare(strict_types=1);

namespace MDS\Admin;

defined('ABSPATH') || exit;

final class Menu
{
    public function register(): void
    {
        add_menu_page(
            __('Multidominio SEO', 'multidominio-seo'),
            __('Multidominio SEO', 'multidominio-seo'),
            'manage_options',
            'multidominio-seo',
            [$this, 'render'],
            'dashicons-admin-site',
            80
        );
    }

    public function render(): void
    {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Multidominio SEO', 'multidominio-seo'); ?></h1>

            <p><?php esc_html_e('Versión 1.0.0', 'multidominio-seo'); ?></p>
        </div>
        <?php
    }
}
