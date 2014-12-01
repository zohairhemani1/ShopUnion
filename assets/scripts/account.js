var addresses;
var map;
var markersArray = [];
var addressValidated = false;

function clearMarkers() {
	for (var i = 0; i < markersArray.length; i++) {
		markersArray[i].setMap(null);
	}
}

function ValidateAddr(addr, callback) {
	var gc = new google.maps.Geocoder();

	gc.geocode({ 'address': addr }, function (res, status) {
		if (map) {
			clearMarkers();
		}

		if (status == google.maps.GeocoderStatus.OK) {
			if (map) {
				clearMarkers();
				for (var i = 0; i < res.length; i++) {
					var marker = new google.maps.Marker({
						position: res[i].geometry.location,
						map: map
					});
					markersArray.push(marker);
				}
			}

			if (res.length == 0) {
				callback('The address is wrong');
			} else if (res.length > 5 || !hasStreet(res[0].address_components)) {
				callback('Please clarify the address');
			} else if (res.length > 1 && res.length <= 5) {
				callback('', res);
			} else {
				if (map) {
					google.maps.event.addListenerOnce(map, 'zoom_changed', function () {
						map.setCenter(markersArray[markersArray.length - 1].position);
					});
					map.setZoom(15);
				}
				callback(null);
			}
		} else {
			callback('The address is wrong');
		}
	});
}

function hasStreet(address_components) {
	var streetAddressComponents = [
        'street_address',
        'route'
    ];

	for (var i = 0; i < address_components.length; i++) {
		for (var j = 0; j < address_components[i].types.length; j++) {
			if (streetAddressComponents.indexOf(address_components[i].types[j]) != -1) {
				return true;
			}
		}
	}
	return false;
}

function validateAddress(success) {
	var addr1 = $('#BusinessEditModel_Address');
	var addr2 = $('#BusinessEditModel_Address2');
	var addr3 = $('#SelectedStateName');
	var errorMsg = $('#addressValidationError');
	var addr1ErrorMsg = $('#address1Error');
	var addr2ErrorMsg = $('#address2Error');
	var addressTip = $('#addressTip');

	addr1ErrorMsg.hide();
	addr2ErrorMsg.hide();
	errorMsg.hide();
	addressTip.hide(250);

	if (addr1.val() && addr2.val()) {
		if (addressValidated) {
			success();
			return;
		}
		ValidateAddr(addr1.val() + " " + addr2.val() + " " + addr3.val(), function(error, addrs) {
			if ($("input:radio[name='BusinessEditModel.IsPhysicalAddress']:checked").val() == 'False') {
				if (typeof success === 'function') {
					success();
				}
				return;
			}
			if (error) {
				errorMsg.text(error);
				errorMsg.show();
			} else if (addrs) {
				addresses = addrs;

				$('#addressesDDL li').remove();

				$.each(addresses, function(i, v) {
					$('<li>')
						.html(v.formatted_address)
						.attr('num', i)
						.appendTo('#addressesDDL');
				});
				$('#addressesDDL').children('li').click(function() {
					var selectedAddress = addresses[$(this).attr('num')];
					$('#addressTip').find('label').text(selectedAddress.formatted_address);
					$('#BusinessEditModel_Address').val(findAddressComponent(selectedAddress, 'street_number')
						+ ' ' + findAddressComponent(selectedAddress, 'route'));
					$('#BusinessEditModel_Address2').val(findAddressComponent(selectedAddress, 'locality'));
					addressValidated = true;
				});
				addressTip.show(300);
			} else {
				if (typeof success === 'function') {
					success();
				}
			}
		});
	} else {
		if (!addr1.val()) {
			addr1ErrorMsg.show();
		}
		if (!addr2.val()) {
			addr2ErrorMsg.show();
		}

	}
}

function findAddressComponent(address, componentType) {
	for (var i = 0; i < address.address_components.length; i++) {
		for (var j = 0; j < address.address_components[i].types.length; j++) {
			if (address.address_components[i].types[j] == componentType) {
				return address.address_components[i].short_name;
			}
		}
	}
	return '';
}

$(function () {
	$('text').placeholder();
	$('#BusinessEditModel_Phone').mask(l10n.phoneMask);

	$('.fake-file-uploader .input-file').on('change', function () {
		$(this).parent().find('.input-text').val($(this).val());
		$('#uploadPicError').css('display', 'none');
	});

	$('#btnEditPersonal').on('click', function (e) {
		e.preventDefault();
		if (validatePersonalInfo()) {
			$('#editPersonalForm').submit();
		}
		return false;
	});

	$('#btnEditBusiness').on('click', function (e) {
		e.preventDefault();
		validateBusinessInfo(function () {
			$('#editBusinessForm').submit();
		});
	});

	$('#btnEditAddress').on('click', function (e) {
		e.preventDefault();
		validateAddress(function () {
			$('#editAddressForm').submit();
		});
	});

	$('#btnUploadPic').on('click', function (e) {
		e.preventDefault();
		$('#uploadPicForm').submit();
		return false;
	});

	if ($('#uploadPicError').text().length > 0) {
		$('#change-profile-picture').modal('show');
		$('#uploadPicError').css('display', 'block');
	}

	if ($.browser && $.browser.msie) {
		$('#btn-facebook-connect').on('click', function (e) {
			window.location.href = '/Facebook/Connect';
			return false;
		});
		$('#btn-twitter-connect').on('click', function (e) {
			window.location.href = '/Twitter/Connect';
			return false;
		});
	}

	$('#btnCancelSubscription').on('click', function (e) {
		e.preventDefault();
		$('#cancel-subscription-form').submit();
		return false;
	});

	$('#btnSubscriptionCanceledOk').on('click', function (e) {
		e.preventDefault();
		window.location.href = '/Business';
		return false;
	});

	$('#btnCardUpdatedOk').on('click', function (e) {
		e.preventDefault();
		window.location.href = '/Business';
		return false;
	});

	$('#btnAccountSuspendedOk').on('click', function (e) {
		e.preventDefault();
		window.location.href = '/Business';
		return false;
	});

	$('#btnChargeFailedOk').on('click', function (e) {
		e.preventDefault();
		window.location.href = '/Business';
		return false;
	});

	if (/subscriptionCancelled/i.test(location.href)) jQuery('#subscriptionCancelled').modal('show');
	if (/cardUpdated/i.test(location.href)) jQuery('#cardUpdated').modal('show');
	if (/accountSuspended/i.test(location.href)) jQuery('#accountSuspended').modal('show');
	if (/chargeFailed/i.test(location.href)) jQuery('#chargeFailed').modal('show');

	if($('#map').length > 0){
        map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 2,
	        center: new google.maps.LatLng(52.00, -131.00),
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    });
    }
	$('#edit-location-info').on('shown', function () {
		google.maps.event.trigger(map, 'resize');	//google maps fix
	});

	$('#BusinessEditModel_Address').blur(function () {
		addressValidated = false;
		validateAddress();
	});
	$('#BusinessEditModel_Address2').blur(function () {
		addressValidated = false;
		validateAddress();
	});

	var label = $('#SelectedStateName');
	var hf = $('#BusinessEditModel_SelectedState');
	$('#stateDDL').children('li').click(function () {
		label.text($(this).text());
		hf.val($($(this).children()[0]).val());
		addressValidated = false;
		validateAddress();
	});

	$("input:radio[name='BusinessEditModel.IsPhysicalAddress']").on('change', function (e) {
		addressValidated = (e.target.value != 'True');
	});
});

function validatePersonalInfo() {
    var isAllOk = true;
    $('.formError').css('display', 'none');

    if ($('#BusinessEditModel_FirstName').val().length == 0) {
        isAllOk = false;
        $('#firstNameError').css('display', 'block');
    }
    if ($('#BusinessEditModel_LastName').val().length == 0) {
        isAllOk = false;
        $('#lastNameError').css('display', 'block');
    }
    var regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    var email = $('#BusinessEditModel_Email').val();
    if (email.length == 0 || !regex.test(email)) {
        isAllOk = false;
        $('#emailError').css('display', 'block');
    }

	return isAllOk;
}

function validateBusinessInfo(success) {
	var isAllOk = true;

	$('.formError').css('display', 'none');

	if (isAllOk && success) {
		success();
	}
			
}

