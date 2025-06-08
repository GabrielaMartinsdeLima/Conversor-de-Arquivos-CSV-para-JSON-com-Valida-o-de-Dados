<?php
require 'vendor/autoload.php';

use App\App;
use League\CLImate\CLImate;

$climate = new CLImate;
$app = new App($climate);
$app->run();
