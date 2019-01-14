<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Act</title>
    <style>
        body {
            font-family: Arial, "Helvetica CY", "Nimbus Sans L", sans-serif;
        }

        .table1 td {
            height: 30px;
        }

        .table3 {
            border-collapse: collapse;
            font-size: 12px;
        }

        .table3 td {
            padding: 2px;
            border: 1px black solid;
        }
    </style>
</head>
<body>
<a href="javascript:window.print()" style="display: block; font-size: 12px;">печать</a>
@php
    /** @var \App\Models\Account $account **/
    /** @var \App\Models\Act $act **/
@endphp
<table style="width:800px">
    <tr>
        <td>
            <p align="center">АКТ №&nbsp;{{ $account->act->id }}
                от&nbsp;{{ date('d.m.Y', strtotime($account->act->created_at)) }}г.</p>
            <p align="center">О ВЫПОЛНЕННЫХ РАБОТАХ (ОКАЗАННЫХ УСЛУГАХ)</p>
            <p>&nbsp;</p>
            <p><strong>Исполнитель:</strong>&nbsp;ООО &quot;Дважды Два&quot;</p>
            <p><strong>Заказчик:</strong>&nbsp;{{ $account->requisite->recipient }}</p>
            <p><strong>Основание № И{{ $account->number }}
                    &nbsp;{{ date('d.m.Y', strtotime($account->created_at)) }}</strong></p>
            <p>&nbsp;</p>
            <p>&quot;Исполнителем&quot; выполнены следующие работы (оказаны услуги):</p>

            <table border="0" cellpadding="0" cellspacing="0" width="650" class="table3">
                <tbody>
                <tr>
                    <td style="width:310px;height:22px;">
                        <p align="center">Наименование работ (услуг)</p>
                    </td>
                    <td style="width:95px;height:22px;">
                        <p align="center">Ед.изм.</p>
                    </td>
                    <td style="width:76px;height:22px;">
                        <p align="center">Кол-во</p>
                    </td>
                    <td style="width:76px;height:22px;">
                        <p align="center">Цена</p>
                    </td>
                    <td style="width:85px;height:22px;">
                        <p align="center">Всего</p>
                    </td>
                </tr>
                <tr>
                    <td style="width:310px;height:22px;">
                        <p>Покупка подписки на сайте archive.2x2.su на {{ $account->rate->time }}ч.</p>
                    </td>
                    <td style="width:95px;height:22px;">
                        <p align="center"></p>
                    </td>
                    <td style="width:76px;height:22px;">
                        <p align="center">1</p>
                    </td>
                    <td style="width:76px;height:22px;">
                        <p align="center">{{ $account->rate->price }}</p>
                    </td>
                    <td style="width:85px;height:22px;">
                        <p align="center">{{ $account->rate->price }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="width:310px;">
                        <p>Итого</p>
                    </td>
                    <td style="width:95px;">
                        <p>&nbsp;</p>
                    </td>
                    <td style="width:76px;">
                        <p>&nbsp;</p>
                    </td>
                    <td style="width:76px;">
                        <p>&nbsp;</p>
                    </td>
                    <td style="width:85px;">
                        <p align="center">{{ $account->rate->price }}</p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td style="width:638px;">
                        <p><strong>Всего на сумму:&nbsp;
                                {{ \App\Models\Account::declension($account->rate->price, ["рубль", "рубля", "рублей"]) }}
                                &nbsp;00 копеек</strong></p>
                    </td>
                </tr>
                </tbody>
            </table>

            <p><strong>НДС не предусмотрен.</strong></p>
            <p>Вышеперечисленные услуги выполнены полностью и в срок.</p>
            <p>Заказчик претензий к объему и качеству услуг не имеет.</p>
            <p>&nbsp;</p>

            <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td style="width:320px;" valign="top">
                        <p><strong>ИСПОЛНИТЕЛЬ: </strong>&nbsp;ООО &quot;Дважды Два&quot;</p>
                        <p>Адрес: 675000 Амурская область&nbsp;г.Благовещенск,ул Зейская, 229</p>
                        <p>Расчетный счет: 40702810809560001367 Филиал 2754 ВТБ (ПАО) г.Хабаровск</p>
                        <p>БИК/код МФО: 040813713</p>
                        <p>ИНН: : 2801088466</p>
                        <p>Телефон: 20-19-39, 20-00-20</p>
                    </td>
                    <td style="width:47px;">
                        <p>&nbsp;</p>
                    </td>
                    <td style="width:320px;" valign="top">
                        <p><strong>ЗАКАЗЧИК: </strong>{{ $account->requisite->recipient }}</p>
                        <p>Адрес:&nbsp;{{ $account->requisite->address }}</p>
                        <p>Расчетный счет:</p>
                        <p>БИК:&nbsp;{{ $account->requisite->bik }}</p>
                        <p>ИНН:&nbsp;{{ $account->requisite->inn }}</p>
                        <p>Телефон:&nbsp;{{ $account->requisite->phone }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" height="30px">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="font-size: 14px; position: relative;">
                        <span>М.П.</span>
                        <img src="{{ asset('image/account/stamp.png') }}"
                             alt="stamp"
                             style="
                                position: absolute;
                                width: 150px;
                                top: -35px;
                                left: -25px;
                             "
                        >
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
</body>
</html>