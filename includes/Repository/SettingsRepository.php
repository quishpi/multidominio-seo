<?php

declare(strict_types=1);

namespace MDS\Repository;

defined('ABSPATH') || exit;

final class SettingsRepository
{
    private const OPTION_NAME = 'mds_settings';

    public function all(): array
    {
        $settings = get_option(self::OPTION_NAME, []);

        return is_array($settings) ? $settings : [];
    }

    public function save(array $settings): bool
    {
        return update_option(self::OPTION_NAME, $settings, false);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $settings = $this->all();

        return $settings[$key] ?? $default;
    }

    public function set(string $key, mixed $value): bool
    {
        $settings = $this->all();

        $settings[$key] = $value;

        return $this->save($settings);
    }

    public function has(string $key): bool
    {
        $settings = $this->all();

        return array_key_exists($key, $settings);
    }

    public function remove(string $key): bool
    {
        $settings = $this->all();

        if (!array_key_exists($key, $settings)) {
            return false;
        }

        unset($settings[$key]);

        return $this->save($settings);
    }

    public function reset(): bool
    {
        return update_option(
            self::OPTION_NAME,
            [
                'version' => MDS_VERSION,
                'domains' => [],
            ],
            false
        );
    }
}
