<?php

namespace App\Listeners;
use  Cache;
class UserEventSubscriber
{
    /**
     * 处理用户登录事件。 每次登陆重置权限缓存
     */
    public function onUserLogin($event) {
        $key = getPermissionCacheKey($event->user->id);
        Cache::forget($key);
    }

    /**
     * 处理用户注销事件。
     */
    public function onUserLogout($event) {}

    /**
     * 为订阅者注册监听器。
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}
