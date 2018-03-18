<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'db' => require 'db.php',
        'web' => require 'web.php'
    ],
];