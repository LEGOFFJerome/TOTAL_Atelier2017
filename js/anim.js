jQuery(function ($) {


});

function redactBrief()
{
    eraseCookie('anim-hm');
    createCookie('anim-hm', 9, 10);

    var win = window.open("etapes.php", '_blank');
    win.focus();
}

function seeBrief()
{
    var win = window.open("anim_see_brief.php", '_blank');
    win.focus();
}

function onEtapeConfChange(p_This, p_Etape) {
    $.ajax({
        url: "anim_etape_config_change.php?etape=" + p_Etape + "&value=" + ($(p_This).is(':checked') == true ? "1" : "0"),
        type: "GET"
    });
}

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}
