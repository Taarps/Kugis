<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

  /**
   * Регистрация привязок в контейнере.
   *
   * @return void
   */
  public function boot()
  {
    // Если построитель реализуется при помощи класса...
    // View::composer('profile', 'App\Http\ViewComposers\ProfileComposer');

    View::composer('nav', 'App\Http\ViewComposers\NavComposer');

    // // Если построитель реализуется в функции-замыкании...
    // View::composer('nav', function($view)
    // {
    // 	$view->with('name', '4321');
    // });
  }

  /**
   * Регистрация сервис-провайдера
   *
   * @return void
   */
  public function register()
  {
    //
  }

}