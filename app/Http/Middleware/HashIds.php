<?php

namespace App\Http\Middleware;

use Log;
use Closure;

class HashIds
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, ...$ids)
    {
        $nonParametersRoutes = ['index', 'create', 'store', 'delete', 'deactivate'];

        // Algumas ações do resource não precisam passar por
        // troca de parametros.
        $method = explode('.', $request->route()->action['as'])[1];
        if (in_array($method, $nonParametersRoutes)) {
            return $next($request);
        }

        try {
            foreach ($ids as $requestKey) {
                $decoded = \Hashids::decode($request->route($requestKey));
                $request->route()->setParameter($requestKey, $decoded[0]);
            }
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Índice não encontrado.',
                ]);
            }

            Log::warning('Invalid ID. Method: '.$request->route()->action['as']);

            return abort(404);
        }

        return $next($request);
    }
}
