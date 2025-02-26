protected $middlewareAliases = [
    // ... 其他中间件
    'auth' => \App\Http\Middleware\Authenticate::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    // ... 其他中间件
];