<?php declare(strict_types=1);

namespace Swag\BaseClass;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollectionBuilder;

class BaseClass extends Plugin
{
    public function install(InstallContext $context): void
    {
        // your code you need to execute while installation
    }

    public function postInstall(InstallContext $context): void
    {
        // your code you need to execute after your plugin gets installed
    }

    public function update(UpdateContext $context): void
    {
        // your code you need to execute while your plugin gets updated
    }

    public function postUpdate(UpdateContext $context): void
    {
        // your code you need to execute after your plugin got updated
    }

    public function activate(ActivateContext $context): void
    {
        // your code you need to execute while your plugin gets activated
    }

    public function deactivate(DeactivateContext $context): void
    {
        // your code you need to run while your plugin gets deactivated
    }

    public function uninstall(UninstallContext $context): void
    {
        // your code you need to execute while your plugin gets uninstalled
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // your code you need to execute while the DI container is built
    }

    public function configureRoutes(RouteCollectionBuilder $routes, string $environment): void
    {
        $routes->import(__DIR__ . '/routes.xml');
    }

    public function getMigrationNamespace(): string
    {
        return 'Swag\BaseClass\MyMigrationNamespace';
    }

    public function getContainerPrefix(): string
    {
        return 'my_container_prefix';
    }

    public function getViewPaths(): array
    {
        return [
            '/Resources/views'
        ];
    }

    public function getServicesFilePath(): string
    {
        return '/Resources/config/custom_config.xml';
    }

    public function getRoutesPath(): string
    {
        return '/Resources/custom_routes/';
    }

    public function getContainerPath(): string
    {
        return '/Resources/custom_dependency_injection/services.xml';
    }

    public function getAdministrationEntryPath(): string
    {
        return '/Resources/custom_administration_path/';
    }

    public function boot(): void
    {
        parent::boot();
    }
}