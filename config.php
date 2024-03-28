<?php
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === '127.0.0.1' || substr($_SERVER['SERVER_NAME'], 0, 7) === '192.168') {
    define('SERVER_NAME', 'htttp://localhost:8888');
} else {
    define('SERVER_NAME', $_SERVER['SERVER_ADDR']);
}
