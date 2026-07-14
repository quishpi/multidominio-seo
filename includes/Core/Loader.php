<?php

declare(strict_types=1);

namespace MDS\Core;

defined('ABSPATH') || exit;

/**
 * Centraliza el registro de acciones y filtros.
 */
final class Loader
{
    /**
     * @var array<int,array<string,mixed>>
     */
    private array $hooks = [];

    public function add(
        string $type,
        string $hook,
        object $instance,
        string $method,
        int $priority = 10,
        int $acceptedArgs = 1
    ): void {

        $this->hooks[] = [
            'type'         => $type,
            'hook'         => $hook,
            'instance'     => $instance,
            'method'       => $method,
            'priority'     => $priority,
            'acceptedArgs' => $acceptedArgs,
        ];
    }

    public function run(): void
    {
        foreach ($this->hooks as $hook) {

            $callback = [
                $hook['instance'],
                $hook['method'],
            ];

            if ($hook['type'] === 'action') {

                add_action(
                    $hook['hook'],
                    $callback,
                    $hook['priority'],
                    $hook['acceptedArgs']
                );

                continue;
            }

            add_filter(
                $hook['hook'],
                $callback,
                $hook['priority'],
                $hook['acceptedArgs']
            );
        }
    }
}
