<?php

declare(strict_types=1);

namespace MDS\Admin;

use MDS\Services\DomainService;

defined('ABSPATH') || exit;

final class DomainPage
{
    public function __construct(
        private readonly DomainService $service = new DomainService()
    ) {
    }

    public function render(): void
    {
        $domains = $this->service->all();

        require MDS_PLUGIN_PATH . 'templates/admin/domains.php';
    }
}
