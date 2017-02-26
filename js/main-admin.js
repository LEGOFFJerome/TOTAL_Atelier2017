// --------------------------------
// USIDE JANVIER 2017
// Author J.LEGOFF
// --------------------------------

jQuery(function($) {

    $('#openStep').click(function () { document.location.href = "admin-selstep.php"; });
    $('#selSentence1').click(function () { document.location.href = "admin-selSentence.php?step=1"; });
    $('#selSentence2').click(function () { document.location.href = "admin-selSentence.php?step=2"; });
    $('#selSentence3').click(function () { document.location.href = "admin-selSentence.php?step=3"; });
    $('#selSentence4').click(function () { document.location.href = "admin-selSentence.php?step=4"; });
    $('#selSentence5').click(function () { document.location.href = "admin-selSentence.php?step=5"; });
});

//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
function onEtapeConfChange(p_This, p_Etape) {
        console.log(p_This+' //// '+p_Etape);
    $.ajax({
        url: "admin-etape_config_change.php?etape=" + p_Etape + "&value=" + ($(p_This).is(':checked') == true ? "1" : "0"),
        type: "GET"
    });
}

function onPhraseSelect(selBox,id) {
    $.ajax({
        url: "admin-setSelSentence.php?id=" + id + "&val=" + selBox.checked,
        type: "GET"
    });
}

