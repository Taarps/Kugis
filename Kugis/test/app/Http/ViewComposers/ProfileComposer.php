<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;

class ProfileComposer {

  /**
   * Реализация пользовательского репозитория.
   *
   * @var UserRepository
   */
  protected $users;

  /**
   * Создание построителя нового профиля.
   *
   * @param  UserRepository  $users
   * @return void
   */
  public function __construct(UserRepository $users)
  {
    // Зависимости автоматически обработаются сервис-контейнером...
    $this->users = $users;
  }

  /**
   * Привязка данных к представлению.
   *
   * @param  View  $view
   * @return void
   */
  public function compose(View $view)
  {
    $view->with('count', $this->users->count());
  }

}