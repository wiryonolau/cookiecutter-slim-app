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
        print_r($value);
        echo '</pre>';
    }

    if ($halt) {
        die();
    }
}
