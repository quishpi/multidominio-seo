<?php

declare(strict_types=1);

namespace MDS\Admin;

defined('ABSPATH') || exit;

final class DomainController
{
    public function index(): void
    {
        $action = sanitize_key($_GET['action'] ?? 'list');

        switch ($action) {

            case 'new':
            case 'edit':
                (new DomainFormPage())->render();
                break;

            default:
                (new DomainPage())->render();
                break;
        }
    }
}
