<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Act;
use App\Models\Key;

class AccountController extends Controller
{
  function __construct()
  {
    $this->middleware('permission:account-list');
    $this->middleware('permission:account-edit', ['only' => ['activate', 'cancelled']]);
  }

  public function index()
  {
    return view('admin.account.index', [
      'accounts' => Account::orderBy('id', 'DESK')->paginate(10),
    ]);
  }

  /**
   * Сделать счет оплаченным
   *
   * @param $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function activate($id)
  {
    $account = Account::find($id);

    // Далаем счёт оплаченным
    $account->is_paid = 1;
    $account->save();

    // Создаём акт о выполненных работах
    $act = new Act;
    $act->account_id = $account->id;
    $act->save();

    // Генерируем ключ для активации тарифа
    $key = new Key();
    $randomInt = $key->generateKey();
    while ($key->keyExist($randomInt)) {
      $randomInt = $key->generateKey();
    }

    $key->key = $randomInt;
    $key->rate_id = $account->rate_id;
    $key->user_id = $account->user_id;
    $key->created_by = "Автоматически, после оплаты счёта";
    $key->save();

    return redirect()
      ->route('admin.accounts.index')
      ->with('success', 'Счёт успешно оплачен');
  }

  /**
   * Аннулирует счет
   *
   * @param $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function cancelled($id)
  {
    $account = Account::find($id);

    $account->is_cancelled = 1;
    $account->save();

    return redirect()
      ->route('admin.accounts.index')
      ->with('success', 'Счёт успешно аннулирован');
  }

  /**
   * Вывод отображения для печати счета
   *
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function print_acc($id)
  {
    $account = Account::find($id);

    return view('print_acc', compact('account'));
  }

  /**
   * Вывод отображения для печати акта
   *
   * @param $id
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function print_act($id)
  {
    $account = Account::find($id);

    return view('print_act', compact('account'));
  }

  /**
   * Поиск счета
   *
   * @param Request $request
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function search(Request $request)
  {
    $num = $request->get('number');
    $start = $request->get('start') . ' 00:00:00';
    $end = $request->get('end') . ' 23:59:59';

    $accounts = Account::where('number', $num)
      ->whereBetween('created_at', [$start, $end])
      ->paginate(30);

    return view('admin.account.index', compact('accounts', 'num'));
  }
}
