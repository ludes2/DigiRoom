(function(){
    $('.dateWithTime').datetimepicker({
        datepicker: true,
        timepicker: true,
        format: 'd.m.Y H:i',
        step: 15
    }).after('<div class="input-group-append datetimepicker"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>');

    $('.date').datetimepicker({
        datepicker: true,
        timepicker: false,
        format: 'd.m.Y',
    }).after('<div class="input-group-append datetimepicker"><span class="input-group-text"><i class="fas fa-calendar-alt"></i></span></div>');


    $('span.input-group-text').each(function(){
        $( this ).addClass('text-primary');
    });

    $(".datetimepicker").css('cursor', 'pointer').on('click', function() {
        $(this).prev('.date').datetimepicker('show');
    });

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
})()