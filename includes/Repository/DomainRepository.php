<?php

declare(strict_types=1);

namespace MDS\Repository;

use MDS\Models\Domain;

defined('ABSPATH') || exit;

final class DomainRepository
{
    public function __construct(
        private readonly SettingsRepository $settingsRepository = new SettingsRepository()
    ) {
    }

    /**
     * @return Domain[]
     */
    public function all(): array
    {
        $domains = $this->settingsRepository->get('domains', []);

        $result = [];

        foreach ($domains as $domain) {
            $result[] = Domain::fromArray($domain);
        }

        return $result;
    }

    public function find(string $id): ?Domain
    {
        foreach ($this->all() as $domain) {

            if ($domain->getId() === $id) {
                return $domain;
            }

        }

        return null;
    }

    public function save(Domain $domain): bool
    {
        $domains = $this->settingsRepository->get('domains', []);

        $saved = false;

        foreach ($domains as $index => $item) {

            if (($item['id'] ?? '') === $domain->getId()) {

                $domains[$index] = $domain->toArray();

                $saved = true;

                break;
            }

        }

        if (!$saved) {
            $domains[] = $domain->toArray();
        }

        return $this->settingsRepository->set(
            'domains',
            $domains
        );
    }

    public function delete(string $id): bool
    {
        $domains = $this->settingsRepository->get('domains', []);

        foreach ($domains as $index => $item) {

            if (($item['id'] ?? '') === $id) {

                unset($domains[$index]);

                return $this->settingsRepository->set(
                    'domains',
                    array_values($domains)
                );

            }

        }

        return false;
    }

    public function exists(string $id): bool
    {
        return $this->find($id) !== null;
    }
}
