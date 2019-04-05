@extends('layouts.app')

@section('content')

    <div class="adv-search-panel">

        <div id="right-slide-menu-btn"><i class="fas fa-bars"></i></div>

        @include('partials.advert.search')

    </div>

    {{-- Хлебные крошки --}}
    <ul class="app-breadcrumb">
        <li class="app-breadcrumb-item">
            <a href="{{ route('index') }}">Главная</a>
        </li>
        <li class="app-breadcrumb-item">
            <a href="{{ route('advert-index') }}">Обьявления</a>
        </li>
        <li class="app-breadcrumb-active">
            Поиск
        </li>
    </ul>


    {{--Result--}}
    <div class="adv-search-result">

      <div class="adv-pagination-top">
        <h5>Найдено обьявлений:&nbsp<span class="badge badge-success" id="adv-count"></span></h5>
      </div>

        @isset($adverts)

{{--            @if($adverts->total())
                <div class="adv-pagination-top">
                    {{$adverts->links()}}
                    <div class="">Формат даты: гггг-мм-дд</div>
                    <h5>Найдено:&nbsp;<span class="badge badge-success">{{ $adverts->total() }}</span>&nbsp;обьявлений</h5>
                </div>
            @endif--}}

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10%">Фото</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th width="5%">Цена, ₽</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>E-mail</th>
                        <th>Подача</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($adverts as $advert)
                    <tr>
                        <td><img src="https://2x2.su/{{ $advert->image }}" alt=""></td>
                        <td>{{ $advert->title }}</td>
                        <td>{{ $advert->body }}</td>
                        <td>{{ $advert->price }}</td>
                        <td>{{ $advert->name }}</td>
                        <td>{{ $advert->tel}}</td>
                        <td>{{ $advert->email }}</td>
                        <td>{{ $advert->date_start }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-result">
                                <i class="far fa-frown"></i>&nbsp;Ничего не найдено
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
{{--            <div class="adv-pagination-bottom">
                {{$adverts->links()}}
            </div>--}}
        @endisset

{{--          <div class="tmp-data">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur autem consectetur debitis deleniti dolore ducimus earum enim eum, exercitationem fuga in iure labore maiores nisi odio qui quibusdam sapiente sint, sit ut vel velit vero voluptas voluptate. Animi blanditiis consectetur cupiditate dicta dignissimos dolore dolorem eaque esse est fuga iusto, labore, laudantium magnam maxime nemo numquam porro, praesentium provident qui quo quos repudiandae similique sint sunt tempora ullam vel vero! At corporis modi natus sunt. Accusantium corporis dicta eos laborum molestiae natus quam quos temporibus? Aut delectus deleniti, eaque earum, harum libero magni molestiae mollitia nisi optio porro quo repellat tempora! Accusantium aliquam asperiores aspernatur atque consectetur consequuntur cupiditate dicta distinctio dolores dolorum ducimus, enim eos est eveniet ex harum hic illo impedit incidunt laudantium molestias optio pariatur provident quae reiciendis repellendus sunt tempora vel, veniam voluptate. Ad assumenda beatae commodi culpa cum cupiditate dolor dolorum ducimus earum error facilis id illo iste, magnam nam necessitatibus nobis porro quam quo ratione repellendus rerum sed sit sunt ut velit veniam? Culpa eligendi error eum illo itaque laudantium libero magni modi quia sequi! A accusamus, amet dolor hic illo incidunt necessitatibus nisi quas saepe ut. Eum, ex, expedita. Alias dolor eum natus nesciunt repellat. Ab aut blanditiis consequatur dicta dolore dolorem ea eligendi eos eum excepturi facilis fugiat fugit illo in iste laudantium minima modi, neque nulla perferendis possimus reiciendis, repudiandae similique, sint totam ut vel voluptate? Dicta fugit nostrum suscipit totam. Atque consequatur cumque, enim est et illo ipsum iusto minima nostrum porro provident repudiandae sapiente ullam velit, veniam. Ab alias amet aperiam aspernatur beatae commodi corporis cupiditate deserunt dicta eaque error illum inventore libero maxime minima molestias mollitia natus numquam pariatur possimus quia, quis quos reiciendis reprehenderit repudiandae, similique sint unde velit voluptatibus voluptatum. A beatae, blanditiis commodi consequatur deserunt dolore dolorem eos eveniet fuga fugit inventore itaque laudantium maiores natus nobis officiis perferendis quasi qui quis quo quos ratione recusandae reprehenderit sunt veritatis? Accusantium ad asperiores commodi delectus fugiat laborum magnam molestiae nam neque, nostrum, obcaecati, provident quisquam repellat sed similique sunt voluptatum? Animi doloremque ipsum molestias reprehenderit sapiente. A assumenda at atque dolores eligendi esse hic, ipsam, iusto laudantium, maiores molestias nulla pariatur possimus quae quibusdam sed similique tempora! Debitis esse ex harum laborum modi nesciunt pariatur qui quisquam veniam, voluptatum. Asperiores aut consequatur culpa debitis esse ex, explicabo ipsa ipsam magni minima modi mollitia nam nulla officia officiis omnis porro praesentium provident quaerat, qui reiciendis, rerum sunt. Consectetur in officia quam, saepe vel velit vero. A, cumque doloremque earum excepturi fuga illum impedit neque officiis quidem tempora temporibus, vero vitae voluptate. Atque corporis cupiditate eius est et eveniet fugit illum incidunt ipsa, ipsam ipsum labore, maiores natus, nesciunt pariatur provident quam repellat repellendus saepe sed similique ullam voluptate voluptatem? Corporis culpa illo, libero magnam maiores obcaecati pariatur quibusdam soluta suscipit voluptatem! Animi, assumenda, beatae consequatur deleniti dolore earum fugit inventore iste magni molestiae nostrum odit officia provident quisquam quo quos recusandae reiciendis rerum voluptas voluptate! Ab accusamus assumenda at consequuntur delectus deleniti deserunt doloribus ducimus eos impedit in ipsam magnam magni molestias necessitatibus nemo neque nihil nisi nobis nulla obcaecati odio officia omnis perferendis, placeat possimus praesentium quas quos recusandae soluta, temporibus totam vel voluptas. Aliquam aliquid consectetur delectus, dolores exercitationem explicabo incidunt ipsam iste itaque iure iusto maxime necessitatibus nobis non pariatur perferendis perspiciatis quod repellendus repudiandae tempora totam ullam voluptatum? Asperiores blanditiis eum hic laborum neque, non perspiciatis quod unde? Ab aliquid amet aperiam, consectetur cum eius impedit incidunt laborum magnam molestias nam pariatur, perferendis placeat soluta tenetur vel voluptatem? Blanditiis, consequuntur dolore incidunt ipsam laudantium minima molestiae molestias numquam, quo quod repudiandae suscipit tempore velit vero, voluptatibus. Adipisci atque aut consequuntur ducimus eius exercitationem iste itaque magni nisi, nobis possimus quisquam quos, recusandae reiciendis repudiandae. Amet fuga illo nihil nulla voluptates. Amet architecto asperiores, eos excepturi facere illo impedit, itaque maxime odit omnis qui quod recusandae repellat! Ab accusamus alias aliquid deserunt earum enim est et excepturi exercitationem ipsam laudantium maiores porro reiciendis rem, sequi suscipit voluptatibus. Adipisci alias atque blanditiis dolorum, ducimus eius error et eum fugiat laborum officia pariatur quo sit ullam voluptatum. A autem dolor eaque eveniet ex, excepturi exercitationem, expedita impedit inventore iusto libero magnam maiores natus nesciunt nobis numquam odio odit pariatur perspiciatis provident quibusdam quo quod reiciendis rem sed tenetur ut, voluptas! Amet animi aperiam architecto assumenda, at delectus ea eveniet excepturi fugiat id magni maxime nam non nostrum, numquam odit officiis omnis pariatur perferendis placeat quas qui repudiandae sint tempora tenetur vitae voluptate! Aperiam consequatur, cum fugit nam natus possimus qui repellat voluptas. Aliquid deleniti explicabo libero magnam non rem rerum vero. Ab accusantium ad aliquid aut consequatur debitis deleniti doloremque ea eaque eius et eum fugit iste itaque laborum libero maiores nobis nulla officia optio quos reiciendis sequi soluta tempora, veritatis, vero voluptates voluptatum. Atque dicta fugiat id? Aliquam aut blanditiis cupiditate deleniti earum eius enim ex expedita fugiat, harum illum ipsum laboriosam libero magnam obcaecati pariatur placeat quibusdam sapiente voluptate, voluptatibus. Deserunt earum illo nam sequi. Accusantium adipisci aliquid aperiam aspernatur autem commodi, culpa cupiditate debitis dolorem est excepturi expedita explicabo facilis fuga harum, inventore iste magnam maiores natus neque nihil pariatur placeat quasi quibusdam quis recusandae sequi sunt suscipit unde voluptatem! Architecto aut expedita non, quaerat quasi quia quo sit veniam. Ab consectetur delectus doloremque optio quos rerum totam voluptatem. Animi atque eaque numquam possimus reiciendis sint sunt veritatis voluptates? Enim in inventore, placeat quia quo rem ut voluptates? Ad earum exercitationem iste laudantium odio, sequi. A autem corporis dicta dolore eos, id nemo quam rerum veniam. A accusamus accusantium alias at blanditiis cumque doloremque doloribus ducimus eius eligendi eveniet ex fuga illo illum in incidunt iusto molestias odio optio porro praesentium quam quod, quos repudiandae sit tempora temporibus! A accusamus asperiores aspernatur at autem consequatur corporis cumque dolore eligendi eum id impedit in ipsam iusto minima molestiae molestias nobis odio perferendis porro, quae quaerat quasi ratione rem repudiandae similique sit tenetur. Maxime?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur autem consectetur debitis deleniti dolore ducimus earum enim eum, exercitationem fuga in iure labore maiores nisi odio qui quibusdam sapiente sint, sit ut vel velit vero voluptas voluptate. Animi blanditiis consectetur cupiditate dicta dignissimos dolore dolorem eaque esse est fuga iusto, labore, laudantium magnam maxime nemo numquam porro, praesentium provident qui quo quos repudiandae similique sint sunt tempora ullam vel vero! At corporis modi natus sunt. Accusantium corporis dicta eos laborum molestiae natus quam quos temporibus? Aut delectus deleniti, eaque earum, harum libero magni molestiae mollitia nisi optio porro quo repellat tempora! Accusantium aliquam asperiores aspernatur atque consectetur consequuntur cupiditate dicta distinctio dolores dolorum ducimus, enim eos est eveniet ex harum hic illo impedit incidunt laudantium molestias optio pariatur provident quae reiciendis repellendus sunt tempora vel, veniam voluptate. Ad assumenda beatae commodi culpa cum cupiditate dolor dolorum ducimus earum error facilis id illo iste, magnam nam necessitatibus nobis porro quam quo ratione repellendus rerum sed sit sunt ut velit veniam? Culpa eligendi error eum illo itaque laudantium libero magni modi quia sequi! A accusamus, amet dolor hic illo incidunt necessitatibus nisi quas saepe ut. Eum, ex, expedita. Alias dolor eum natus nesciunt repellat. Ab aut blanditiis consequatur dicta dolore dolorem ea eligendi eos eum excepturi facilis fugiat fugit illo in iste laudantium minima modi, neque nulla perferendis possimus reiciendis, repudiandae similique, sint totam ut vel voluptate? Dicta fugit nostrum suscipit totam. Atque consequatur cumque, enim est et illo ipsum iusto minima nostrum porro provident repudiandae sapiente ullam velit, veniam. Ab alias amet aperiam aspernatur beatae commodi corporis cupiditate deserunt dicta eaque error illum inventore libero maxime minima molestias mollitia natus numquam pariatur possimus quia, quis quos reiciendis reprehenderit repudiandae, similique sint unde velit voluptatibus voluptatum. A beatae, blanditiis commodi consequatur deserunt dolore dolorem eos eveniet fuga fugit inventore itaque laudantium maiores natus nobis officiis perferendis quasi qui quis quo quos ratione recusandae reprehenderit sunt veritatis? Accusantium ad asperiores commodi delectus fugiat laborum magnam molestiae nam neque, nostrum, obcaecati, provident quisquam repellat sed similique sunt voluptatum? Animi doloremque ipsum molestias reprehenderit sapiente. A assumenda at atque dolores eligendi esse hic, ipsam, iusto laudantium, maiores molestias nulla pariatur possimus quae quibusdam sed similique tempora! Debitis esse ex harum laborum modi nesciunt pariatur qui quisquam veniam, voluptatum. Asperiores aut consequatur culpa debitis esse ex, explicabo ipsa ipsam magni minima modi mollitia nam nulla officia officiis omnis porro praesentium provident quaerat, qui reiciendis, rerum sunt. Consectetur in officia quam, saepe vel velit vero. A, cumque doloremque earum excepturi fuga illum impedit neque officiis quidem tempora temporibus, vero vitae voluptate. Atque corporis cupiditate eius est et eveniet fugit illum incidunt ipsa, ipsam ipsum labore, maiores natus, nesciunt pariatur provident quam repellat repellendus saepe sed similique ullam voluptate voluptatem? Corporis culpa illo, libero magnam maiores obcaecati pariatur quibusdam soluta suscipit voluptatem! Animi, assumenda, beatae consequatur deleniti dolore earum fugit inventore iste magni molestiae nostrum odit officia provident quisquam quo quos recusandae reiciendis rerum voluptas voluptate! Ab accusamus assumenda at consequuntur delectus deleniti deserunt doloribus ducimus eos impedit in ipsam magnam magni molestias necessitatibus nemo neque nihil nisi nobis nulla obcaecati odio officia omnis perferendis, placeat possimus praesentium quas quos recusandae soluta, temporibus totam vel voluptas. Aliquam aliquid consectetur delectus, dolores exercitationem explicabo incidunt ipsam iste itaque iure iusto maxime necessitatibus nobis non pariatur perferendis perspiciatis quod repellendus repudiandae tempora totam ullam voluptatum? Asperiores blanditiis eum hic laborum neque, non perspiciatis quod unde? Ab aliquid amet aperiam, consectetur cum eius impedit incidunt laborum magnam molestias nam pariatur, perferendis placeat soluta tenetur vel voluptatem? Blanditiis, consequuntur dolore incidunt ipsam laudantium minima molestiae molestias numquam, quo quod repudiandae suscipit tempore velit vero, voluptatibus. Adipisci atque aut consequuntur ducimus eius exercitationem iste itaque magni nisi, nobis possimus quisquam quos, recusandae reiciendis repudiandae. Amet fuga illo nihil nulla voluptates. Amet architecto asperiores, eos excepturi facere illo impedit, itaque maxime odit omnis qui quod recusandae repellat! Ab accusamus alias aliquid deserunt earum enim est et excepturi exercitationem ipsam laudantium maiores porro reiciendis rem, sequi suscipit voluptatibus. Adipisci alias atque blanditiis dolorum, ducimus eius error et eum fugiat laborum officia pariatur quo sit ullam voluptatum. A autem dolor eaque eveniet ex, excepturi exercitationem, expedita impedit inventore iusto libero magnam maiores natus nesciunt nobis numquam odio odit pariatur perspiciatis provident quibusdam quo quod reiciendis rem sed tenetur ut, voluptas! Amet animi aperiam architecto assumenda, at delectus ea eveniet excepturi fugiat id magni maxime nam non nostrum, numquam odit officiis omnis pariatur perferendis placeat quas qui repudiandae sint tempora tenetur vitae voluptate! Aperiam consequatur, cum fugit nam natus possimus qui repellat voluptas. Aliquid deleniti explicabo libero magnam non rem rerum vero. Ab accusantium ad aliquid aut consequatur debitis deleniti doloremque ea eaque eius et eum fugit iste itaque laborum libero maiores nobis nulla officia optio quos reiciendis sequi soluta tempora, veritatis, vero voluptates voluptatum. Atque dicta fugiat id? Aliquam aut blanditiis cupiditate deleniti earum eius enim ex expedita fugiat, harum illum ipsum laboriosam libero magnam obcaecati pariatur placeat quibusdam sapiente voluptate, voluptatibus. Deserunt earum illo nam sequi. Accusantium adipisci aliquid aperiam aspernatur autem commodi, culpa cupiditate debitis dolorem est excepturi expedita explicabo facilis fuga harum, inventore iste magnam maiores natus neque nihil pariatur placeat quasi quibusdam quis recusandae sequi sunt suscipit unde voluptatem! Architecto aut expedita non, quaerat quasi quia quo sit veniam. Ab consectetur delectus doloremque optio quos rerum totam voluptatem. Animi atque eaque numquam possimus reiciendis sint sunt veritatis voluptates? Enim in inventore, placeat quia quo rem ut voluptates? Ad earum exercitationem iste laudantium odio, sequi. A autem corporis dicta dolore eos, id nemo quam rerum veniam. A accusamus accusantium alias at blanditiis cumque doloremque doloribus ducimus eius eligendi eveniet ex fuga illo illum in incidunt iusto molestias odio optio porro praesentium quam quod, quos repudiandae sit tempora temporibus! A accusamus asperiores aspernatur at autem consequatur corporis cumque dolore eligendi eum id impedit in ipsam iusto minima molestiae molestias nobis odio perferendis porro, quae quaerat quasi ratione rem repudiandae similique sit tenetur. Maxime?
          </div>--}}

          <div id="search-result"></div>

          <div id="scroll-ajax-loader" class="text-center py-4">
            <img src="/image/scroll-loader.svg" alt="ajax scroll loader" width="80">
          </div>

          <div id="ajax-loader" class="text-center py-4">
            <h4 class="mb-5">Идет поиск ...</h4>
            <img src="/image/loader.svg" alt="ajax loader" width="80">
          </div>

          @isset($show_explain)
            <div class="adv-search-explain">
              <div class="">
                <h5>Заполните необходимые поля и нажмите кнопку "ПОИСК"</h5>
                <img src="{{ asset('image/read.png') }}" alt="">
              </div>
            </div>
          @endisset
    </div>

    @include('partials.advert.right_slide_menu')

@endsection
