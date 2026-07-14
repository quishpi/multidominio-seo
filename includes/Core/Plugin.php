<?php

declare(strict_types=1);

namespace MDS\Core;

defined('ABSPATH') || exit;

/**
 * Clase principal del plugin.
 */
final class Plugin
{
    private static ?self $instance = null;

    private Loader $loader;

    /**
     * @var ProviderInterface[]
     */
    private array $providers = [];

    private function __construct()
    {
        $this->loader = new Loader();
    }

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Inicializa el plugin.
     */
    public function boot(): void
    {
        $this->loadTextDomain();

        $this->registerProviders();

        $this->loader->run();
    }

    /**
     * Activación del plugin.
     */
    public static function activate(): void
    {
        if (!get_option('mds_settings')) {

            add_option(
                'mds_settings',
                [
                    'version' => MDS_VERSION,
                    'domains' => [],
                ]
            );
        }

        flush_rewrite_rules();
    }

    /**
     * Desactivación del plugin.
     */
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }

    /**
     * Devuelve el Loader.
     */
    public function loader(): Loader
    {
        return $this->loader;
    }

    /**
     * Registra un proveedor.
     */
    public function registerProvider(ProviderInterface $provider): void
    {
        $this->providers[] = $provider;

        $provider->register();
    }

    /**
     * Carga todos los proveedores.
     */
    private function registerProviders(): void
    {
        /*
         * Próximamente:
         *
         * $this->registerProvider(
         *      new AdminProvider($this)
         * );
         *
         * $this->registerProvider(
         *      new DomainProvider($this)
         * );
         */
    }

    /**
     * Carga las traducciones.
     */
    private function loadTextDomain(): void
    {
        load_plugin_textdomain(
            'multidominio-seo',
            false,
            dirname(MDS_PLUGIN_BASENAME) . '/languages'
        );
    }
}
