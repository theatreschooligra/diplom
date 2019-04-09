@extends('app')

@section('content')
    <!-- bread -->
    <div class="bread">
        <div class="container">
            <ul>
                <li><a href="{{ route('home') }}">Главная</a></li>
                <li>Блог</li>
            </ul>
        </div>
    </div>

    <!-- blog page -->

    <div class="blog">
        <div class="container">
            <h1>Блог</h1>
            <div class="blog-container">
                <div class="blog-right">
                    <div class="blog_block">
                        <div class="blog_block-content">
                            <div class="blog_block-img">
                                <img src="{{ asset('imgs/blog-1.png') }}">
                            </div>
                            <div class="blog_block--text">
                                <h3>7 привычек, которые мешают поступить в школу актерского мастерства</h3>
                                <p>Сдать IELTS в Алматы | Астане | Атырау Перед регистрацией, пожалуйста,
                                    внимательно ознакомьтесь с предоставленной ниже информацией.
                                    На этой странице вы узнаете: какая версия теста вам подходит
                                    как пользоваться платформой для онлайн-регистрации как произвести
                                    оплату за тест как подать заявку на предоставление особых условий,
                                    возврат денег или перенос даты экзамена. </p>
                            </div>
                        </div>
                        <div class="blog_block-bottom">
                            <div class="blog_block-date">
                                <h5>Март 13, 2019</h5>
                                <a href="#">Полезно знать</a>
                            </div>
                            <a href="{{ route('blog', 1) }}" class="more-btn">Подробнее</a>
                        </div>
                    </div>

                    <div class="blog_block">
                        <div class="blog_block-content">
                            <div class="blog_block-img">
                                <img src="{{ asset('imgs/blog-2.png') }}">
                            </div>
                            <div class="blog_block--text">
                                <h3>7 привычек, которые мешают поступить в школу актерского мастерства</h3>
                                <p>Сдать IELTS в Алматы | Астане | Атырау Перед регистрацией, пожалуйста,
                                    внимательно ознакомьтесь с предоставленной ниже информацией.
                                    На этой странице вы узнаете: какая версия теста вам подходит
                                    как пользоваться платформой для онлайн-регистрации как произвести
                                    оплату за тест как подать заявку на предоставление особых условий,
                                    возврат денег или перенос даты экзамена.</p>
                            </div>
                        </div>
                        <div class="blog_block-bottom">
                            <div class="blog_block-date">
                                <h5>Март 13, 2019</h5>
                                <a href="#">Полезно знать</a>
                            </div>
                            <a href="{{ route('blog', 1) }}" class="more-btn">Подробнее</a>
                        </div>
                    </div>

                    <div class="blog_block">
                        <div class="blog_block-content">
                            <div class="blog_block-img">
                                <img src="{{ asset('imgs/blog-3.png') }}">
                            </div>
                            <div class="blog_block--text">
                                <h3>7 привычек, которые мешают поступить в школу актерского мастерства</h3>
                                <p>Сдать IELTS в Алматы | Астане | Атырау Перед регистрацией, пожалуйста,
                                    внимательно ознакомьтесь с предоставленной ниже информацией.
                                    На этой странице вы узнаете: какая версия теста вам подходит
                                    как пользоваться платформой для онлайн-регистрации как произвести
                                    оплату за тест как подать заявку на предоставление особых условий,
                                    возврат денег или перенос даты экзамена. </p>
                            </div>
                        </div>
                        <div class="blog_block-bottom">
                            <div class="blog_block-date">
                                <h5>Март 13, 2019</h5>
                                <a href="#">Полезно знать</a>
                            </div>
                            <a href="{{ route('blog', 1) }}" class="more-btn">Подробнее</a>
                        </div>
                    </div>

                    <div class="blog_block">
                        <div class="blog_block-content">
                            <div class="blog_block-img">
                                <img src="{{ asset('imgs/blog-4.png') }}">
                            </div>
                            <div class="blog_block--text">
                                <h3>7 привычек, которые мешают поступить в школу актерского мастерства</h3>
                                <p>Сдать IELTS в Алматы | Астане | Атырау Перед регистрацией, пожалуйста,
                                    внимательно ознакомьтесь с предоставленной ниже информацией.
                                    На этой странице вы узнаете: какая версия теста вам подходит
                                    как пользоваться платформой для онлайн-регистрации как произвести
                                    оплату за тест как подать заявку на предоставление особых условий,
                                    возврат денег или перенос даты экзамена. </p>
                            </div>
                        </div>
                        <div class="blog_block-bottom">
                            <div class="blog_block-date">
                                <h5>Март 13, 2019</h5>
                                <a href="#">Полезно знать</a>
                            </div>
                            <a href="{{ route('blog', 1) }}" class="more-btn">Подробнее</a>
                        </div>
                    </div>

                    <div class="blog_block">
                        <div class="blog_block-content">
                            <div class="blog_block-img">
                                <img src="{{ asset('imgs/blog-5.png') }}">
                            </div>
                            <div class="blog_block--text">
                                <h3>7 привычек, которые мешают поступить в школу актерского мастерства</h3>
                                <p>Сдать IELTS в Алматы | Астане | Атырау Перед регистрацией, пожалуйста,
                                    внимательно ознакомьтесь с предоставленной ниже информацией.
                                    На этой странице вы узнаете: какая версия теста вам подходит
                                    как пользоваться платформой для онлайн-регистрации как произвести
                                    оплату за тест как подать заявку на предоставление особых условий,
                                    возврат денег или перенос даты экзамена. </p>
                            </div>
                        </div>
                        <div class="blog_block-bottom">
                            <div class="blog_block-date">
                                <h5>Март 13, 2019</h5>
                                <a href="#">Полезно знать</a>
                            </div>
                            <a href="{{ route('blog', 1) }}" class="more-btn">Подробнее</a>
                        </div>
                    </div>
                </div>

                <div class="blog-left">
                    <div class="search">
                        <form>
                            <input type="search">
                            <a href="#" class="search-btn"></a>
                        </form>
                    </div>

                    <div class="question_block">
                        <h3>Есть ли у вас какие-либо вопросы?</h3>
                        <p>Звоните не только в рабочее время, но и в субботу и в воскресенье! Всё подскажем и рассчитаем в короткие сроки!</p>
                        <a href="#" class="conn-btn">Связаться с нами</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection