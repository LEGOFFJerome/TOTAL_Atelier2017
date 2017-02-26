// --------------------------------
// USIDE JANVIER 2017
// Author J.LEGOFF
// --------------------------------

jQuery(function($) {

	if(readCookie('total-anim') == '9'){
		$('.choixEtape').css('background-color',"#333333");
		$('.etape').css('background-color',"#333333");
	}
	$(".intro").click(function() {
		eraseCookie('total-anim');
		$(".imgEnter").fadeTo( "slow" , 0, function() {document.location.href="groupes.php";});
	});

    $(".selGroup").click(function () {
		// on le planque dans le cookies
		eraseCookie('total-anim');
		createCookie('total-anim',$(this).attr("data-id"),10);
		$(".choixGroupe").fadeTo( "slow" , 0, function() {document.location.href="etapes.php";});

	});

    $(".selStep").click(function () {
        if ($(this).parent().hasClass("disabled"))
            return;

		var urlToGo = "etape-" + $(this).attr("data-id") + ".php";
		$(".choixEtape").fadeTo( "slow" , 0, function() {document.location.href=urlToGo;});
	});

	$("#butRet").click(function(){

		var ret = confirm("attention vos réponses ne seront pas sauvegardées !");

		if (ret){
			document.location.href ="etapes.php";
		}
	});

    $('.btBack').click(function () { document.location.href = 'etapes.php';});
	$('#myForm').on('submit', function(e) {

		e.preventDefault();
        // on check si il ya quelque chose dans le champ
        if (!$("#phrase").val()) {
            // textarea is empty
            return;
        }
		$(".loadAnim").css ("display","block");
        var $this = $(this);

        $.ajax({
                url: $this.attr('action'),
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json',
                success: function(json) {
					if(json.status) {
						console.log("stat OK" + json.message);
                        $(".loadAnim").css("display", "none");
                        window.location.reload(true);
						//document.location.href ="etape-1.php";

                    } else {
						console.log("stat KO"+ json.message );
						$(".loadAnim").css ("display","none");
                    }
                }
            });

	});
});

//
function delField(p_This)
{
	$(p_This).parent('div').fadeOut(500, function() {$(p_This).parent('div').remove() } );
}

//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------
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
