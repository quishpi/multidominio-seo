<?php

declare(strict_types=1);

namespace MDS\Models;

defined('ABSPATH') || exit;

/**
 * Modelo que representa un dominio.
 */
final class Domain
{
    private string $id;

    private string $host;

    private string $language;

    private string $title;

    private string $description;

    private bool $primary;

    private bool $enabled;

    public function __construct(
        string $id,
        string $host,
        string $language,
        string $title,
        string $description = '',
        bool $primary = false,
        bool $enabled = true
    ) {
        $this->id = $id;
        $this->host = strtolower(trim($host));
        $this->language = trim($language);
        $this->title = trim($title);
        $this->description = trim($description);
        $this->primary = $primary;
        $this->enabled = $enabled;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isPrimary(): bool
    {
        return $this->primary;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'host'        => $this->host,
            'language'    => $this->language,
            'title'       => $this->title,
            'description' => $this->description,
            'primary'     => $this->primary,
            'enabled'     => $this->enabled,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            (string) ($data['id'] ?? ''),
            (string) ($data['host'] ?? ''),
            (string) ($data['language'] ?? ''),
            (string) ($data['title'] ?? ''),
            (string) ($data['description'] ?? ''),
            (bool) ($data['primary'] ?? false),
            (bool) ($data['enabled'] ?? true)
        );
    }
}
