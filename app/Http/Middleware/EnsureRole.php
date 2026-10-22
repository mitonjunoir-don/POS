<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Route middleware: role:admin or role:cashier (or role:admin,cashier).
 * Registered as an alias in bootstrap/app.php.
 */
class EnsureRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        abort_unless($user, 403);

        $allowed = array_map(fn (string $r) => Role::from($r), $roles);

        abort_unless(in_array($user->role, $allowed, true), 403);

        return $next($request);
    }
}
