<?php

declare(strict_types=1);

namespace MDS\Admin;

defined('ABSPATH') || exit;

final class DashboardPage
{
    public function render(): void
    {
        require MDS_PLUGIN_PATH . 'templates/admin/dashboard.php';
    }
}
