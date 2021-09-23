<?php
declare(strict_types=1);

namespace {{ cookiecutter.project_namespace }}\Database\Factory;

use Laminas\Db\Adapter\Adapter;
use Psr\Container\ContainerInterface;
use Itseasy\Database\Database;

class DatabaseFactory {
    public function __invoke(ContainerInterface $container) {
        $config = $container->get("Config")->getConfig()["database"];

        $adapter = new Adapter([
            'driver' => 'PdoMysql',
            'hostname' => $config["hostname"],
            'port' => $config["port"] ? : 3306,
            'database' => $config["database"],
            'username' => $config["username"],
            'password' => $config["password"],
            'driver_options' => $config["driver_options"]
        ]);

        $logger = $container->get("Logger");

        return new Database($adapter, $logger);
    }
}
