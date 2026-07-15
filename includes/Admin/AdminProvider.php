<?php

declare(strict_types=1);

namespace MDS\Admin;

use MDS\Core\AbstractProvider;
use MDS\Admin\DomainActions;

defined('ABSPATH') || exit;

final class AdminProvider extends AbstractProvider
{
    public function register(): void
    {
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
    }
}
