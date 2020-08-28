<?php declare(strict_types=1);

namespace Swag\BaseClassTests;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;
use Swag\BaseClass\BaseClass;

class MethodTest extends TestCase
{
    public function testMethods(): void
    {
        $class = new ReflectionClass(BaseClass::class);

        $expectedMethods = [
            'install',
            'postInstall',
            'update',
            'postUpdate',
            'activate',
            'deactivate',
            'uninstall',
            'build',
            'getMigrationNamespace',
            'getViewPaths',
            'boot',
        ];

        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);
        $methods = array_filter($methods, function ($item) {
            if ($item->class === BaseClass::class) {
                return $item;
            }
        });

        foreach ($expectedMethods as $expectedMethod) {
            $isInArray = false;
            foreach ($methods as $method) {
                if ($method->name === $expectedMethod) {
                    $isInArray = true;
                    break;
                }
            }

            if (!$isInArray) {
                static::fail(sprintf('Method "%s" not found', $expectedMethod));
            }
        }

        static::assertCount(count($expectedMethods), $methods);
    }
}
