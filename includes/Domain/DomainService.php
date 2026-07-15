<?php

declare(strict_types=1);

namespace MDS\Services;

use InvalidArgumentException;
use MDS\Models\Domain;
use MDS\Repository\DomainRepository;

defined('ABSPATH') || exit;

final class DomainService
{
    public function __construct(
        private readonly DomainRepository $repository = new DomainRepository()
    ) {
    }

    /**
     * @return Domain[]
     */
    public function all(): array
    {
        return $this->repository->all();
    }

    public function find(string $id): ?Domain
    {
        return $this->repository->find($id);
    }

    public function save(Domain $domain): bool
    {
        $this->validate($domain);

        if ($domain->isPrimary()) {
            $this->removePrimaryFlag();
        }

        return $this->repository->save($domain);
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }

    private function validate(Domain $domain): void
    {
        if ($domain->getHost() === '') {
            throw new InvalidArgumentException(
                'El dominio es obligatorio.'
            );
        }

        if (!filter_var(
            'https://' . $domain->getHost(),
            FILTER_VALIDATE_URL
        )) {
            throw new InvalidArgumentException(
                'Dominio inválido.'
            );
        }

        if ($domain->getTitle() === '') {
            throw new InvalidArgumentException(
                'El título es obligatorio.'
            );
        }

        if ($domain->getLanguage() === '') {
            throw new InvalidArgumentException(
                'El idioma es obligatorio.'
            );
        }
    }

    private function removePrimaryFlag(): void
    {
        foreach ($this->repository->all() as $domain) {

            if (!$domain->isPrimary()) {
                continue;
            }

            $updated = new Domain(
                id: $domain->getId(),
                host: $domain->getHost(),
                language: $domain->getLanguage(),
                title: $domain->getTitle(),
                description: $domain->getDescription(),
                primary: false,
                enabled: $domain->isEnabled()
            );

            $this->repository->save($updated);
        }
    }
}
