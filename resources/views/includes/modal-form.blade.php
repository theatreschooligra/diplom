<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<div class="modal fade" id="coursesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                <h3>Запишитесь на бесплатное занятие</h3>
                <p>Познакомьтесь с преподавателями и методикой школы "Игра"</p>
            </div>
            <div class="modal-body">
                <div class="request">
                    <form method="POST" action="{{ route('send-mail') }}">
                        @csrf
                        <input type="text" name="surname" placeholder="Фамилия">
                        <input type="text" name="name" placeholder="Имя">
                        <input type="email" name="email" placeholder="E-mail">
                        <input type="text" name="phone_number" placeholder="+7 (999) 999-99-99">
                        <input type="text" id="birthday" name="birthday" placeholder="Дата рождения ребенка" readonly>
                        <input type="submit" value="Отправить" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bootstrap-datepicker/dist/locales/bootstrap-datepicker.ru.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
    $('input[name="phone_number"]').mask('0 (000) 000 00-00');
    $('#birthday').datepicker({
        format: 'dd.mm.yyyy',
        language: 'ru',
        autoclose: true,
        todayBtn: 'linked',
        pickerPosition: "bottom-left",
        startView: 2,
        todayHighlight: true
    });
</script>
