<?php
declare(strict_types=1);

/*
 * ---------------------------------------------------------------------------------------
 * | Create the application
 * ---------------------------------------------------------------------------------------
 */
require_once "vendor/autoload.php";

use Dotenv\Dotenv;
use App\Core\Database\DB;

require_once "App/functions_common.php";

/*
 * ---------------------------------------------------------------------------------------
 * | Loading the env variables
 * ---------------------------------------------------------------------------------------
 */
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Defining the base path for accessing assets and other resources
 * from root path
 */
define('BASE_PATH', __DIR__);

/*
 * ---------------------------------------------------------------------------------------
 * | Init database connection
 * ---------------------------------------------------------------------------------------
 */

$db_config = [
    'HOST' => $_ENV['DB_HOST'],
    'DATABASE' => $_ENV['DB_DATABASE'],
    'USERNAME' => $_ENV['DB_USERNAME'],
    'PASSWORD' => $_ENV['DB_PASSWORD'],
];

DB::init($db_config);

/*
 * ---------------------------------------------------------------------------------------
 * | Load routes
 * ---------------------------------------------------------------------------------------
 */


require_once "routes/web.php";