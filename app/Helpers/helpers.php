<?php

function response($data, $status = 200, $headers = [])
{
    http_response_code($status);

    foreach ($headers as $key => $value) {
        header("$key: $value");
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}

if (!function_exists('env')) {
    /**
     * Get the value of the environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $path = dirname(__DIR__, 2) . '/.env';

        if (file_exists($path)) {
            $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                [$name, $value] = explode('=', $line, 2);
                if (trim($name) === $key) {
                    return trim($value);
                }
            }
        }

        return $default;
    }
}