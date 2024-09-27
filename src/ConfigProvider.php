<?php

declare(strict_types=1);

namespace EasyAdmin\Admin;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'The config of easy-admin.',
                    'source' => __DIR__ . '/../publish/easy-admin.php',
                    'destination' => BASE_PATH . '/config/autoload/easy-admin.php',
                ],
            ],
        ];
    }
}
