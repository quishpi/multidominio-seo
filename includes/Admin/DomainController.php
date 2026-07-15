<?php

declare(strict_types=1);

namespace MDS\Admin;

defined('ABSPATH') || exit;

final class DomainController
{
    public function index(): void
    {
        $page = new DomainPage();

        $page->render();
    }
}
