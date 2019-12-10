<?php

namespace App\Providers;

use App\Models\Brief;
use App\Models\Contact;
use Auth;
use Illuminate\Support\ServiceProvider;
use View;

class NavServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        View::composer(['app.*', 'auth.*'], function () {
            View::share('nav', [
                [
                    'route' => 'app.about',
                    'compare' => 'app.about',
                    'name' => trans('page.title.about'),
                ],
                [
                    'route' => 'app.work.index',
                    'compare' => 'app.work.*',
                    'name' => trans('page.title.works'),
                ],
                [
                    'route' => 'app.brief.index',
                    'compare' => 'app.brief.index',
                    'name' => trans('page.title.brief'),
                ],
                //                [
                //                    'route' => 'app.contact.index',
                //                    'compare' => 'app.contact.index',
                //                    'name' => trans('page.title.contacts'),
                //                ],
            ]);

            View::share('langs', config('app.locales'));
        });

        View::composer('admin.*', function () {
            $nav = [
                [
                    'route' => 'admin.works.index',
                    'compare' => 'admin.works.*',
                    'name' => 'Работы',
                    'icon' => 'products',
                    'can_activate' => true,
                ],
                [
                    'route' => 'admin.briefs.index',
                    'compare' => 'admin.briefs.*',
                    'name' => 'Брифы',
                    'icon' => 'orders',
                    'unread' => Brief::processing()->count(),
                    'can_activate' => true,
                ],
                [
                    'route' => 'admin.contacts.index',
                    'compare' => 'admin.contacts.*',
                    'name' => 'Контакты',
                    'icon' => 'envelope',
                    'unread' => Contact::processing()->count(),
                    'can_activate' => true,
                ],
                [
                    'route' => 'admin.users.index',
                    'compare' => 'admin.users.*',
                    'name' => 'Пользователи',
                    'icon' => 'users',
                    'can_activate' => Auth::user()->hasRole('admin'),
                ],
            ];

            View::share('nav', $nav);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
