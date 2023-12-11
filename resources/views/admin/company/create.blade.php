@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>

@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <form role="form" action="{{ route('admin.company.store') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="input-group mb-3">
                            <label for="title_company" class="form-label">Название компании</label>
                            <input type="text" name="title" id="title_company" class="form-control"/>
                        </div>

                        <div class="company-categories mb-3" id="select2">
                            <label for="company-category" class="form-label">Катeгорії компаній</label>
                            {{--                            <select name="categories[]" id="company-category" class="form-select" multiple>--}}
                            {{--                                @foreach ($categories as $category)--}}
                            {{--                                    @if ($category->parent_id === null)--}}
                            {{--                                        <option class="row" value="{{ $category->id }}">--}}
                            {{--                                            {{ $category->name }}--}}
                            {{--                                        </option>--}}
                            {{--                                        @foreach ($categories as $subcategory)--}}
                            {{--                                            @if ($subcategory->parent_id === $category->id)--}}
                            {{--                                                &nbsp;&nbsp;--}}
                            {{--                                                <option class="row" value="{{ $subcategory->id }}">--}}
                            {{--                                                    {{ $subcategory->name }}--}}
                            {{--                                                </option>--}}
                            {{--                                                @if ($subcategory->subcategories->count() > 0)--}}
                            {{--                                                    @include('admin.company.category.subcategories-select', ['subcategories' => $subcategory->subcategories])--}}
                            {{--                                                @endif--}}
                            {{--                                            @endif--}}
                            {{--                                        @endforeach--}}
                            {{--                                    @endif--}}
                            {{--                                @endforeach--}}
                            {{--                            </select>--}}
                            <select2></select2>
                        </div>
                        <div id="company-thumbnail">
                            <label for="">Картинка компании</label>
                            {{--                            <image-upload></image-upload>--}}
                        </div>
                        <div id="address" class="mb-3">
                            <label for="address-content-list">Адрес сайта
                            </label>
                            <address></address>
                        </div>
                        <div id="related-posts">
                            <h3>Связанные компании, филиалы
                            </h3>
                            <related-posts></related-posts>
                        </div>
                        <div id="company-tags">
                            <h3>Теги
                            </h3>
                            <tags></tags>
                        </div>
                        <div class="input-group">
                            <label for="">Начальство
                            </label>
                            <div class="input-group-text bg-light p-4">
                                <label for="">Должность</label>
                                <input type="text" name="boss_position" id="boss-position">
                            </div>
                            <div class="input-group-text bg-light p-4">
                                <label for="">Инициалы</label>
                                <input type="text" name="boss_initials" id="boss-initials">
                            </div>
                        </div>
                        <div id="phones" class="mb-3">
                            <label for="">Контакты</label>
                            <phone-numbers></phone-numbers>
                        </div>
                        <div id="emails">
                            <label for="">Emails List</label>
                            <emails></emails>
                        </div>
                        <div id="about-company-content">
                            <label for="about-company">О Компании</label>
                            <textarea name="about_company" id="about-company" cols="30" rows="10"></textarea>
                        </div>


                        <div id="social-list" class="mb-3">
                            <label for="">Ccылки на соцсети</label>
                            <social-list></social-list>
                        </div>
                        <div id="connectivity-list">
                            <label for="">Другие варианты связи</label>
                            <connectivity-list></connectivity-list>
                        </div>
                        <div id="payments">
                            <h3>Оплата</h3>
                            <div class="bg-light">
                                <payment-methods></payment-methods>
                            </div>
                        </div>
                        <div id="services-list-content">
                            <label for="about-company">Предоставляемые услуги</label>
                            <p>
                                Напишите что произошло, где, когда это было. В своем сообщении укажите настоящие имена и
                                фамилии, или предоставьте фото документов
                                или писем если речь идет о взаимодействии с органами власти или коммерческими
                                структурами. Если есть видео в текст сообщения вставьте
                                ссылку для размещения видеоматериала. Что бы ускорить процесс проверки сообщите ваш
                                номер меседжера или профиль в соц сети для связи
                                с вами если возникнут дополнительные вопросы
                            </p>
                            <textarea name="about_company" id="about-company" cols="30" rows="10"></textarea>
                        </div>
                        <div id="additional-information-content">
                            <label for="additional_information">Дополнительная информация
                            </label>
                            <p>
                                Напишите что произошло, где, когда это было. В своем сообщении укажите настоящие имена и
                                фамилии, или предоставьте фото документов
                                или писем если речь идет о взаимодействии с органами власти или коммерческими
                                структурами. Если есть видео в текст сообщения вставьте
                                ссылку для размещения видеоматериала. Что бы ускорить процесс проверки сообщите ваш
                                номер меседжера или профиль в соц сети для связи
                                с вами если возникнут дополнительные вопросы
                            </p>
                            <textarea name="additional_information" id="additional-information" cols="30"
                                      rows="10"></textarea>
                        </div>

                        <div id="gallery">
                            {{--                            <vue-multi-image-upload></vue-multi-image-upload>--}}
                        </div>
                        <div id="related-news">
                            <h3>Новости</h3>
                            <div class="bg-light">
                                <related-news></related-news>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Save Posts</button>
                    </form>
                </section>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
