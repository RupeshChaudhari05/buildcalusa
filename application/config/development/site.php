<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Local development overrides (merged over config/site.php by CodeIgniter).
// Preview every tool on localhost unless .env says otherwise.
$config['show_unpublished'] = env('SHOW_UNPUBLISHED', TRUE);
