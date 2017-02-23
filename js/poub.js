


	$('#senderForm').on('submit', function(e) {
        e.preventDefault(); 
		$('#message').fadeTo( 0, 0.2 );
        var $this = $(this);
		if($('#mailUrl').val() === '' || !isEmail($('#mailSender').val())) {
            
			//TO DO refaire le test de schamps
			$('#message').html('Les champs URL du mail ou l\'email de l\'expéditeur doivent êtres remplis');
			$('#message').removeClass("messOK messKO mess");
			$('#message').addClass("messKO");
			$('#message').fadeTo( "fast", 1 );
        } else {
			$.ajax({
                url: $this.attr('action'),
                type: $this.attr('method'),
                data: $this.serialize(),
                dataType: 'json',
                success: function(json) {
					if(json.status) {
						//console.log("stat OK" + json.message);
						$('#message').html(json.message);
						$('#message').removeClass("messOK messKO mess");
						$('#message').addClass("messOK");
						$('#message').fadeTo( "fast", 1 );


                    } else {
						//console.log("stat KO");
						$('#message').html(json.message);
						$('#message').removeClass("messOK messKO mess");
						$('#message').addClass("messKO");
						$('#message').fadeTo( "fast", 1 );
                    }
                }
            });
		}
    });

	$('#mailImgRelative').change(function() {
	   if($(this).is(":checked")) {
			$("#detailRelative").css("display", "block");		  
	   }else{
			$("#detailRelative").css("display", "none");
	   }
	});


	$('#mailUrl').focusout(function() {
		// on récupère le texte de l'url
		var mailURL = $('#mailUrl').val();
		if (mailURL !== ''){
			var index = mailURL.lastIndexOf("/") + 1;
			$('#mailImgDir').val(mailURL.substr(0,index)+"_img/");
		}
	});

// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------
function isEmail(email) { 
    return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(email);
} 