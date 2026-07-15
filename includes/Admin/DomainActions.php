<?php

declare(strict_types=1);

namespace MDS\Admin;

use MDS\Models\Domain;
use MDS\Services\DomainService;

defined('ABSPATH') || exit;

final class DomainActions
{
    private DomainService $service;

    public function __construct()
    {
        $this->service = new DomainService();
    }

    public function save(): void
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('No autorizado.', 'multidominio-seo'));
        }

        check_admin_referer('mds_save_domain');

        $domain = new Domain(
            id: sanitize_text_field($_POST['id'] ?: uniqid('domain_', true)),
            host: sanitize_text_field($_POST['host']),
            language: sanitize_text_field($_POST['language']),
            title: sanitize_text_field($_POST['title']),
            description: sanitize_textarea_field($_POST['description']),
            primary: isset($_POST['primary']),
            enabled: isset($_POST['enabled'])
        );

        $this->service->save($domain);

        wp_safe_redirect(
            admin_url('admin.php?page=multidominio-seo-domains&success=1')
        );

        exit;
    }

    public function delete(): void
    {
        if (!current_user_can('manage_options')) {
            wp_die(__('No autorizado.', 'multidominio-seo'));
        }

        check_admin_referer('mds_delete_domain');

        $id = sanitize_text_field($_GET['id']);

        $this->service->delete($id);

        wp_safe_redirect(
            admin_url('admin.php?page=multidominio-seo-domains&deleted=1')
        );

        exit;
    }
}
