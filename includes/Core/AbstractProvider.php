<?php

declare(strict_types=1);

namespace MDS\Core;

defined('ABSPATH') || exit;

/**
 * Clase base para todos los proveedores.
 */
abstract class AbstractProvider implements ProviderInterface
{
    protected readonly Plugin $plugin;

    protected readonly Loader $loader;

    public function __construct(Plugin $plugin)
    {
        $this->plugin = $plugin;
        $this->loader = $plugin->loader();
    }
}
