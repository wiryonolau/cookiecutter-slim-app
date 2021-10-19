<?php

declare(strict_types=1);

return [
    "database" => [
        "driver" => "PdoMysql",
        "hostname" => getenv("MYSQL_HOSTNAME") ? : "127.0.0.1",
        "port" => getenv("MYSQL_PORT") ? : 3306,
        "username" => getenv("MYSQ_USER") ? : "{{ cookiecutter.database_name }}",
        "password" => getenv("MYSQL_PASSWORD") ? : "888888",
        "database" => getenv("MYSQL_DATABASE") ? : "{{ cookiecutter.database_name }}",
        "driver_options" => [
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_EMULATE_PREPARES => true,
            \PDO::MYSQL_ATTR_LOCAL_INFILE => true
        ]
    ]
];
