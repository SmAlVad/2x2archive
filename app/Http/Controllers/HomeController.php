<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Key;
use App\Models\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders     = Order::where('user_id', $request->user()->id)->where('is_paid',1)->orderBy('id','DESK')->get();
        $accounts   = Account::where('user_id', $request->user()->id)->orderBy('id','DESK')->get();
        $keys       = Key::where('user_id', $request->user()->id)->where('active', 0)->get();

        Carbon::setLocale('ru');
        $timeNow = Carbon::now();

        $activeTime = $timeNow->diffForHumans(Carbon::parse($request->user()->time));

        return view('home', compact('accounts','keys', 'timeNow', 'activeTime', 'orders'));
    }

    public function setTime(Request $request)
    {
        // Получаем ключ
        $key = Key::find($request->get('key'));

        // Получаем пользователя
        $user = User::find($request->user()->id);

        // Текущее время
        $timeNow = Carbon::now();

        // Если ключ пренадлежит пользователю
        if ($key->user_id == $user->id) {

            // Если время у пользователя меньше чем сейчас
            if($user->time < $timeNow) {
                // То устанавливаем текущее время
                $time =  $timeNow;
            } else {
                // Иначе используем время пользователя
                $time = Carbon::parse($user->time);
            }

            $hour = $key->rate->time;
            $time->addHours($hour);

            $user->time = $time;
            $user->save();

            $key->active = 1;
            $key->save();

            return redirect()->route('home')
                ->with('success', "Успешно");
        }

        return redirect()->route('home')
            ->with('error', "Ошибка");
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
}
