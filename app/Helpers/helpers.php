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
