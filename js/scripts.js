/**
 * fn element[placeholder]
 */
function setPlaceholder() {
    let placeholder = $("[placeholder]");
    placeholder.focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'))
        $(this).attr('placeholder', '');
    });
    placeholder.blur(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });
}

/**
 *  fn replace span.Mail class
 *
 *  */
function setEmailReplace() {
    $('span.mail').each(function () {
        let spt = $(this);
        let at = / at /;
        let dot = / dot /g;
        let addr = $(spt).text().replace(at, "@").replace(dot, ".");
        $(spt).after('<a class="mail" href="mailto:' + addr + '"><span>' + addr + '</span></a>');
        $(spt).remove();
    })
}

/**
 *  fn scrollUp
 */
function scrollUp() {
    let scrollup = '.scrollup';
    $("body").append("<a class='scrollup' href='javascript:void(0);'></a>");
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(scrollup).fadeIn();
        } else {
            $(scrollup).fadeOut();
        }
    });
    $(scrollup).on('click', function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
}






$(document).ready(function () {
    setPlaceholder();
    setEmailReplace();
    scrollUp();
});


$(window).scroll(function () {

});


$(window).on('resize', function () {

});


