<?php

namespace {{cookiecutter.project_namespace}}\View\Helper\Factory;

use Psr\Container\ContainerInterface;
use {{cookiecutter.project_namespace}}\View\Helper\NavigationHelper;
use Itseasy\Navigation\Navigation;

class NavigationHelperFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $navigation = $container->get(Navigation::class);
        return new NavigationHelper($navigation);
    }
}
