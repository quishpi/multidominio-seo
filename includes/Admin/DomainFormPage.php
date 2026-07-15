<?php

declare(strict_types=1);

namespace MDS\Admin;

use MDS\Models\Domain;
use MDS\Services\DomainService;

defined('ABSPATH') || exit;

final class DomainFormPage
{
    private DomainService $service;

    public function __construct()
    {
        $this->service = new DomainService();
    }

    public function render(): void
    {
        $id = sanitize_text_field($_GET['id'] ?? '');

        $domain = $id !== ''
            ? $this->service->find($id)
            : null;

        require MDS_PLUGIN_PATH . 'templates/admin/domain-form.php';
    }
}
