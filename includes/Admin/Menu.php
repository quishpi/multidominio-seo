<?php

declare(strict_types=1);

namespace MDS\Admin;

defined('ABSPATH') || exit;

final class Menu
{
    private DashboardPage $dashboard;

    public function __construct()
    {
        $this->dashboard = new DashboardPage();
    }

    public function register(): void
    {
        add_menu_page(
            __('Multidominio SEO', 'multidominio-seo'),
            __('Multidominio SEO', 'multidominio-seo'),
            'manage_options',
            'multidominio-seo',
            [$this->dashboard, 'render'],
            'dashicons-admin-site',
            60
        );

        $controller = new DomainController();

        add_submenu_page(
            'multidominio-seo',
            __('Dominios', 'multidominio-seo'),
            __('Dominios', 'multidominio-seo'),
            'manage_options',
            'multidominio-seo-domains',
            [$controller, 'index']
        );
    }
}
