<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'expense');
define('DB_USER', 'root');
define('DB_PASS', '');

define('REGEX_NAME', '/^[a-zA-ZÀ-ÖØ-öø-ÿ\' -]+$/');
define('REGEX_EMAIL', '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/');
define('REGEX_PHONENUMBER', '/^(0|(\+[0-9]{2}[. -]?))[1-9]([. -]?[0-9][0-9]){4}$/');
define('REGEX_WEIGHT', '/^[0-9]+$/');


// Définition des paramètres d'upload de fichiers
define('UPLOAD_MAX_SIZE', 800000);
define('UPLOAD_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);