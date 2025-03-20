<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     */

// filepath: /c:/Users/Hp/Downloads/PROJECT/supply/app/Http/Kernel.php
protected $routeMiddleware = [
    // ...existing middleware...
    'auth' => \App\Http\Middleware\Authenticate::class,
    // ...existing middleware...
];
    /**
     * The application's route middleware.
     */

}
// Compare this snippet from supply/app/Http/Middleware/Authenticate.php:
// <?php