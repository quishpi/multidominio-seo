<?php

declare(strict_types=1);

namespace MDS\Admin;

use MDS\Core\AbstractProvider;

defined('ABSPATH') || exit;

final class AdminProvider extends AbstractProvider
{
    public function register(): void
    {
        /*
         * Registrar el menú principal del plugin.
         */
        $menu = new Menu();

        $this->loader->add(
            'action',
            'admin_menu',
            $menu,
            'register'
        );

        /*
         * Registrar las acciones POST.
         */
        $actions = new DomainActions();

        $this->loader->add(
            'action',
            'admin_post_mds_save_domain',
            $actions,
            'save'
        );

        $this->loader->add(
            'action',
            'admin_post_mds_delete_domain',
            $actions,
            'delete'
        );

        $this->loader->add(
            'action',
            'admin_menu',
            $menu,
            'hideSubmenus',
            999
        );
    }
}
