
jQuery(function () {
	jQuery('.start-modal').on('click', function () {
		jQuery(jQuery(this).attr('href')).modal('show');
		return false;
	});
	jQuery('.close-this-modal').on('click', function () {
		if (jQuery(this).parents('.modal').length > 0) jQuery(this).parents('.modal').modal('hide');
		return false;
	});
	jQuery('.input-counter a').on('click', function () {
		var input = jQuery(this).parent().children('input:text'),
			val = parseInt(input.val()),
			changeVal = jQuery(this).hasClass('up-arrow') ? 1 : -1;
		if ((val > 0 && val < 999) || (val == 0 && changeVal == 1) || (val == 999 && changeVal == -1)) input.val(val + changeVal);
	});

	jQuery('#changePassSubmit').click(function () {
		if (validateChangePass()) {
			jQuery('#changePassForm').submit();
		}
		return false;
	});

	$('#btnWrongCredentialsOk').on('click', function (e) {
		e.preventDefault();
		window.location.href = 'index.html';
		return false;
	});

});


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);
    if (results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function validateChangePass() {
    var isAllOk = true;
    $('.formError').css('display', 'none');

    if ($('#OldPassword').val().length == 0) {
        isAllOk = false;
        $('#oldPasswordError').css('display', 'block');
    }
    if ($('#NewPassword').val().length < 5) {
        isAllOk = false;
        $('#newPasswordError').css('display', 'block');
    }
    if ($('#ConfirmPassword').val() != $('#NewPassword').val()) {
        isAllOk = false;
        $('#confirmPasswordError').css('display', 'block');
    }

    return isAllOk;
}


