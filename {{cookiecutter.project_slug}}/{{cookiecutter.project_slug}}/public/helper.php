<?php
declare(strict_types=1);

function debug($value, bool $halt = false, ?string $label = null)
{
    if ($label) {
        echo "<p>$label</p>";
    }

    if (php_sapi_name() === 'cli') {
        print_r($value);
        echo "\n";
    } else {
        echo '<pre>';
        echo htmlspecialchars(print_r($value, true));
        echo '</pre>';
    }

    if ($halt) {
        die();
    }
}

function get_docker_secret($path, $default = "", bool $path_from_env = false)
{
    if ($path_from_env) {
        $path = getenv($path);
    }

    if (is_string($path) === false) {
        return $default;
    }

    if (file_exists($path) === false) {
        return $default;
    }

    $secret = file_get_contents($path);
    if ($secret === false) {
        return $default;
    }

    return trim($secret);
}

function get_env(string $name, $default = "", bool $local_only = false)
{
    $env = getenv($name, $local_only);
    if ($env === false || is_null($env)) {
        $env = $default;
    }

    return $env;
}
