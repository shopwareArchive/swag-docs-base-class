<?php declare(strict_types=1);

namespace BaseClass;

use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
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

    public function boot(): void
    {
        parent::boot();
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/DependencyInjection/'));
        $loader->load('services.xml');
    }

    public function configureRoutes(RouteCollectionBuilder $routes, string $environment): void
    {
        $routes->import(__DIR__ . '/routes.xml');
    }

    public function getMigrationNamespace(): string
    {
        return 'BaseClass\MyMigrationNamespace';
    }

    public function getContainerPrefix(): string
    {
        return 'my_container_prefix';
    }
}