<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csfd;
use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class AdvertController
 * @package App\Http\Controllers
 */
class AdvertController extends Controller
{
  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function index()
  {
    return view('advert.index', [
      'cats' => Category::where('parent_id', 0)->get()
    ]);
  }

  /**
   * @param Request $request
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function page(Request $request, $section_id, $type_id)
  {

    $section = Category::find($section_id);
    $type = Category::find($type_id);
    $subtypes = Category::where('parent_id', $type_id)->get();

    return view('advert.page', [
      'section' => $section,
      'type' => $type,
      'subtypes' => $subtypes,
      'selected_subtype' => 0,
      'show_explain' => true,
    ]);
  }

  /**
   * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function search()
  {
    return view('advert.page');
  }

  /**
   * @param Request $request
   * @return string
   */
  public function ajax_search(Request $request)
  {
    if ($request->ajax()) {

      // TODO: Валидация данных

      // Кадегории 1, 2, 3 уровня
      $section_id   = $request->input('section');
      $type_id      = $request->input('type');
      $subtype      = $request->input('subtype');

      // Даты начала и конца поиска
      $date_start   = $request->input('date-start');
      $date_end     = $request->input('date-end');

      // Диапогон цены
      $start_price  = $request->input('start-price');
      $end_price    = $request->input('end-price');

      // Телефон
      $phone        = $request->input('phone');

      // Оффсет
      $offset       = ($request->has('offset')) ? $request->input('offset') : 0;

      // Запрос в базу
      $adverts = \DB::table('csfds')
        ->where('cat1', $section_id)
        ->where('cat2', $type_id)
        ->where('cat3', $subtype)
        ->whereBetween('date_start', [$date_start, $date_end])
        ->where('price', '>=', $start_price);

      // Если указана "Цена до"
      if ($end_price !== null) {
        $adverts->where('price', '<=', $end_price);
      }

      // Если указан "Телефон"
      if ($phone !== null) {
        $adverts->where('tel', 'LIKE', "%$phone%");
      }

      // Общее количество обьявлений
      $all_adverts = $adverts->count();
      // Получаем обьявления
      $adverts = $adverts->offset($offset)->limit(50)->get();

      $content = "";

      // Если есть обьявления
      if ($adverts->count() > 0) {

        // Если есть в запросе не было параметра оффсет
        if ($offset === 0) {
          $content = "<table class=\"table table-striped search-result-table\">
                <thead>
                    <tr>
                        <th width=\"10%\">Фото</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th width=\"5%\">Цена, ₽</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
                        <th>Подача</th>
                    </tr>
                </thead>
                <tbody>";
        } else {
          $content = "<table class=\"table table-striped search-result-table\"><tbody>";
        }


        foreach ($adverts as $advert) {
          $content .= "<tr>
                        <td width=\"10%\"><img src=\"https://2x2.su/{$advert->image}\" alt=\"\"></td>
                        <td>{$advert->title}</td>
                        <td>{$advert->body}</td>
                        <td width=\"5%\">{$advert->price}</td>
                        <td>{$advert->name}</td>
                        <td>{$advert->tel}</td>
                        <td>{$advert->email}</td>
                        <td>{$advert->date_start}</td>
                    </tr>";
        }
      } else {
        $content .= "<div class=\"empty-result\">
                        <i class=\"far fa-frown\"></i>&nbsp;Ничего не найдено
                     </div>";
      }

      $content .= "</tbody></table>";

      return response()->json([
        'success' => true,
        'content' => $content,
        'count' => $all_adverts
      ]);
    }

    return response()->json([
      'success' => false
    ]);
  }

}
