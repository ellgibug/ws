//Вывод всех данных из таблиц Workers и Payment
$(document).ready(function () {
    $("#btn-1").click(function () {
        $.ajax({
            type: "GET",
            url: "functions/table.php",
            data:{
                month: $("select[name=calendar]").val(),
                money: $("input[name=money]:checked").val()
            },
            success: function(response)
            {
                $("#place").html(response);
            }
        });
    });
});

//Выдача премии
$(document).ready(function () {
    $("#btn-2").click(function () {
        if(!$("select[name=calendar-prem]").val()){
            alert('Выберите месяц для выдачи премии!');
            return false;
        }
        $.ajax({
            type: "GET",
            url: "functions/computed.php",
            data:{
                month: $("select[name=calendar-prem]").val(),
                profession: $("input[name=profession]:checked").val()
            },
            success: function(response)
            {
                $("#premium_place").html(response);
            }
        });
    });
});

//Плагин для просмотра картинок
$(document).ready(function() {
    $('.item').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom',
        image: {
            verticalFit: false
        },
        zoom: {
            enabled: true,
            duration: 300
        }
    });
});

//Превью картинки при загрузка. Без JQ
window.onload = function () {
    var output = document.getElementById('preview');
    output.src = URL.createObjectURL(event.target.files[0]);
}




