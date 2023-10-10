<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.Admin.{adminId}', function ($user, int $adminId) {
    return (int)Request::user('admin')->id === $adminId;
});
