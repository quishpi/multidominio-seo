<?php
declare(strict_types=1);
/**
 * Plugin Name: Multidominio SEO
 * Plugin URI: https://webmarket.ec
 * Description: Gestión profesional de múltiples dominios utilizando una única instalación de WordPress.
 * Version: 1.0.0
 * Requires at least: 6.8
 * Requires PHP: 8.1
 * Author: Luis Quishpi
 * Text Domain: multidominio-seo
 */

defined('ABSPATH') || exit;

define('MDS_MINIMUM_WP_VERSION', '6.8');
define('MDS_MINIMUM_PHP_VERSION', '8.1');
define('MDS_VERSION', '1.0.0');
define('MDS_PLUGIN_FILE', __FILE__);
define('MDS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('MDS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MDS_PLUGIN_BASENAME', plugin_basename(__FILE__));

require_once MDS_PLUGIN_PATH . 'vendor/autoload.php';

use MDS\Core\Plugin;

register_activation_hook(
    __FILE__,
    [Plugin::class, 'activate']
);

register_deactivation_hook(
    __FILE__,
    [Plugin::class, 'deactivate']
);

Plugin::instance()->boot();
