<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Печать счёта</title>
  <style>
    body{
      font-family: Arial, "Helvetica CY", "Nimbus Sans L", sans-serif;
    }

    table tr td {
      padding: 2px;
    }

    .table3{
      border-collapse: collapse;
      font-size: 14px;
    }

    .table3 tr td {
      border:1px solid black;
      text-align: center;
    }

    .table4{
      font-size: 14px;
    }
  </style>
</head>
<body>
<a href="javascript:window.print()" style="display: block; font-size: 12px;">печать</a>

@php /** @var \App\Models\Account $account **/@endphp
<table border="0" cellpadding="0" cellspacing="0" width="662">
  <tbody>
  <tr>
    <td colspan="2">
      <p align="center">
        СЧЕТ № И{{ $account->number }}&nbsp;
        от&nbsp;{{ date('d.m.Y', strtotime($account->created_at)) }}
    </td>
  </tr>
  <tr>
    <td width="125px">ПОСТАВЩИК:</td>
    <td>ООО &quot;Дважды Два&quot;</td>
  </tr>
  <tr>
    <td>ИНН / КПП:</td>
    <td>2801088466 / 280101001</td>
  </tr>
  <tr>
    <td>банк:</td>
    <td>Филиал № 2754 Банка ВТБ (ПАО)</td>
  </tr>
  <tr>
    <td>р/сч №:</td>
    <td>40702810809560001367 БИК/код МФО 040813713</td>
  </tr>
  <tr>
    <td>к/сч:</td>
    <td>30101810708130000713</td>
  </tr>
  <tr>
    <td>адрес:</td>
    <td>675000, Амурская область, г. Благовещенск , ул. Зейская, 229</td>
  </tr>
  <tr>
    <td>тел./факс:</td>
    <td>(4162) 20-19-21</td>
  </tr>
  </tbody>
</table>
<br/>
<table border="0" cellpadding="0" cellspacing="0" width="662">
  <tbody>
  <tr>
    <td style="width:125px;">ПОЛУЧАТЕЛЬ:</td>
    <td colspan="3">{{ $account->requisite->recipient }}</td>
  </tr>
  <tr>
    <td>ИНН / КПП:</td>
    <td colspan="3">{{ $account->requisite->inn }}&nbsp;/&nbsp;{{ $account->requisite->kpp }}</td>
  </tr>
  <tr>
    <td>банк:</td>
    <td colspan="3">{{ $account->requisite->bank }}</td>
  </tr>
  <tr>
    <td>р/сч №:</td>
    <td>{{ $account->requisite->ks }}</td>
  </tr>
  <tr>
    <td>БИК/код МФО:</td>
    <td>{{ $account->requisite->bik }}</td>
  </tr>
  <tr>
    <td>к/сч:</td>
    <td colspan="3">{{ $account->requisite->ks }}</td>
  </tr>
  <tr>
    <td>адрес:</td>
    <td colspan="3">{{ $account->requisite->address }}</td>
  </tr>
  <tr>
    <td>тел./факс:</td>
    <td colspan="3">{{ $account->requisite->phone }}</td>
  </tr>
  </tbody>
</table>
<br/>
<table border="0" cellpadding="0" cellspacing="0" class="table3" width="662">
  <tbody>
  <tr>
    <td>№ п/п</td>
    <td>Номенклатурный номер</td>
    <td>Наименование, сорт, размер</td>
    <td>Единица измерения</td>
    <td>Количество</td>
    <td>Цена</td>
    <td>Сумма</td>
  </tr>
  <tr>
    <td>1</td>
    <td>&nbsp;</td>
    <td>Покупка подписки на сайте archive.2x2.su на {{ $account->rate->time }}ч.</td>
    <td>шт</td>
    <td>1</td>
    <td>{{ $account->rate->price }}</td>
    <td>{{ $account->rate->price }}</td>
  </tr>
  <tr>
    <td style="border:0;" colspan="4">&nbsp;</td>
    <td style="border:0; text-align: left" colspan="3">Итого: 1</td>
  </tr>
  <tr>
    <td style="border:0;" colspan="4">&nbsp;</td>
    <td style="border:0; text-align: left" colspan="3">ИТОГО к оплате:&nbsp;{{ $account->rate->price }}</td>
  </tr>
  </tbody>
</table>

<table border="0" cellpadding="0" cellspacing="0" class="table4" width="622">
  <tbody>
  <tr><td>НДС НЕ ПРЕДУСМОТРЕН</td></tr>
  <tr><td>&nbsp;</td></tr>
  <tr><td>Сумма прописью: {{ \App\Models\Account::sum_propis($account->rate->price) }}</td></tr>
  <tr><td>Счет действителен в течение 30 дней</td></tr>
  </tbody>
</table>
<img src="{{ asset('image/account/acc.png') }}" alt="alt" style="margin-top: 50px;">
</body>
</html>
