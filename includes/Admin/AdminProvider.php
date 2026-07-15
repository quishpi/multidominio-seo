<?php

declare(strict_types=1);

namespace MDS\Admin;

use MDS\Core\AbstractProvider;

defined('ABSPATH') || exit;

final class AdminProvider extends AbstractProvider
{
    public function register(): void
    {
        $adminMenu = new Menu();

        $this->loader->add(
            'action',
            'admin_menu',
            $adminMenu,
            'register'
        );
    }
}
