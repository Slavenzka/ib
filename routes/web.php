<?php

use Illuminate\Support\Facades\Auth;

require_once(base_path('routes/web.admin.php'));
require_once(base_path('routes/web.app.php'));

Auth::routes();
