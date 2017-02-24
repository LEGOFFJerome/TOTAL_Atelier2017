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


	$('#myForm').on('submit', function(e) {

		e.preventDefault();

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
						$(".loadAnim").css ("display","none");
						document.location.href ="etapes.php";

                    } else {
						console.log("stat KO"+ json.message );
						$(".loadAnim").css ("display","none");
                    }
                }
            });

	});

    $("#addField1").click(function () {
        console.log("addField1");
		var countBalise = $('#dynInputs > div').length;
		if (countBalise < 5) // ATTENTION -1
 		{
            $("#dynInputs").append('<div style="clear:both;margin-bottom:5px;"><textarea  name="dynField' + countBalise +'" class="txtEtap1"></textarea><div class="delField" onclick="javascript:delField(this);"> - </div></div>');
		}
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
