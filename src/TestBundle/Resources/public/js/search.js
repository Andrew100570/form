$(function () {

    $(".search_result").hover(function () {
        $(".form-control-town").blur(); //Убираем фокус с input
    })

//При выборе результата поиска, прячем список и заносим выбранный результат в input
    $(".search_result").on("click", "li", function () {
        var id = $(this).attr('id');
        //мы должны взять значение аттрибута id и передать его в значение аттрибута data-id
        var chooseId = $("#doer-town").attr('data-id', id);

        s_user = $(this).text();

        $(".form-control-town").val(s_user); //деактивируем input, если нужно
        $(".search_result").fadeOut();

        return chooseId;
    })


    $(".search_results").hover(function () {
        $(".form-control-rubrika").blur(); //Убираем фокус с input
    })

    $(".search_results").on("click", "li", function () {
        var id = $(this).attr('id');
        //мы должны взять значение аттрибута id и передать его в значение аттрибута data-id
        var chooseId = $("#doer-heading").attr('data-id', id);

        s_user = $(this).text();

        $(".form-control-rubrika").val(s_user); //деактивируем input, если нужно
        $(".search_results").fadeOut();

        return chooseId;
    })





})
