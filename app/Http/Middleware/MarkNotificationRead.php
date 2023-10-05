<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MarkNotificationRead
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $notification = $request->query('notification_id');
        if ($notification) {
            $user = $request->user();
            if ($user) {
                $notification = $user->unreadNotifications()->find($notification);
                if ($notification) {
                    $notification->markAsRead();
                }
            }
        }
        return $next($request);
    }
}
