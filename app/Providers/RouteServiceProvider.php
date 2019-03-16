<?php

namespace App\Providers;

use App\Models\Contact\Brief;
use App\Models\Contact\Contact;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @return void
	 */
	public function boot()
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
			View::share('langs', ['ru', 'en']);
		});

		View::composer('admin.*', function () {
			app()->setLocale('ru');
			$nav = [
				[
					'route' => 'admin.works.index',
					'compare' => 'admin.works.*',
					'name' => 'Портфолио',
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
//				[
//					'route' => 'admin.settings.index',
//					'compare' => 'admin.settings.*',
//					'name' => 'Настройки',
//					'icon' => 'settings',
//					'can_activate' => Auth::user()->hasRole('admin'),
//				],
			];
			View::share('nav', $nav);
		});

		parent::boot();
	}

	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map()
	{
		$this->mapApiRoutes();

		$this->mapWebRoutes();

		//
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes()
	{
		Route::middleware('web')
			 ->namespace($this->namespace)
			 ->group(base_path('routes/web.php'));
	}

	/**
	 * Define the "api" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapApiRoutes()
	{
		Route::prefix('api')
			 ->middleware('api')
			 ->namespace($this->namespace)
			 ->group(base_path('routes/api.php'));
	}
}
