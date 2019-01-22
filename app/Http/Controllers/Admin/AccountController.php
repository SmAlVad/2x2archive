<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Act;

class AccountController extends Controller
{
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

        $account->is_paid = 1;
        $account->save();

        $act = new Act;
        $act->account_id = $account->id;
        $act->save();

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

        return view('admin.account.print_acc', compact('account'));
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

        return view('admin.account.print_act', compact('account'));
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
