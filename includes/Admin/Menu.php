<?php

declare(strict_types=1);

namespace MDS\Admin;

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
            __('Dashboard', 'multidominio-seo'),
            __('Dashboard', 'multidominio-seo'),
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

        $form = new DomainFormPage();

        add_submenu_page(
            'multidominio-seo',
            __('Dominio', 'multidominio-seo'),
            __('Dominio', 'multidominio-seo'),
            'manage_options',
            'multidominio-seo-domain',
            [$form, 'render']
        );

        remove_submenu_page(
            'multidominio-seo',
            'multidominio-seo-domain'
        );
    }

    public function hideSubmenus(): void
    {
        remove_submenu_page(
            'multidominio-seo',
            'multidominio-seo-domain'
        );
    }
}

