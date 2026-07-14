<?php

declare(strict_types=1);

namespace MDS\Core;

defined('ABSPATH') || exit;

/**
 * Contrato para todos los proveedores del plugin.
 */
interface ProviderInterface
{
    /**
     * Registra hooks, servicios o dependencias.
     */
    public function register(): void;
}
