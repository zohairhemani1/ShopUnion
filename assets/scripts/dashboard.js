jQuery(function () {
    var label = jQuery('#seletedTimeSpan');
    var hf = jQuery('#PushBeforeHours');
    var $hideFromCalendarContainer = $('#hide-from-calendar-container');
    jQuery('#timeSpansDDL').children('a').click(function (e) {
        e.preventDefault();
        label.text(jQuery(this).text());
        hf.val(jQuery(jQuery(this).children()[0]).val());
    });

    jQuery('#dashboard-filter-btn').on('click', function () {
        var f = jQuery('#dashboard-filter');
        if (f.is(":visible")) {
            hf.val(-1);

            //$hideFromCalendarContainer.hide();
        } else {
            label.text(' 0 hrs. ');
            hf.val(0);

            //$hideFromCalendarContainer.show();
        }
        jQuery('#dashboard-filter').slideToggle(300);
    });

    $(document).on('click', '.edit-post', function (e) {
        $('#edit-notification-body').load('DashBoard/EditNotification?notificationID=' + $(this).attr('post-id'), function () {
            editedNotificationLoaded();
            if (jQuery(this).parents('.modal').length > 0) jQuery(this).parents('.modal').modal('hide');
            $('#edit-notification').modal('show');
        });
        return false;
    });

    jQuery('#dashboard-push-btn').click(function () {
        if ($('#dashboard-push-btn').attr('disabled') !== 'disabled') {
            $(this).unbind("click");
            $(this).attr('disabled', true);
            jQuery('#dashboard-new-post').submit();
        }
    });

    var $notifications = $('#notifications'),
        $image = $('#dashboard-new-post-image'),
        $imageContainer = $('#dashboard-image-container'),
        $donateImage = $('#donate-button-image'),
        defaultDonateImageSrc = $donateImage.attr('src'),
        $removeDonateImage = $('#remove-donate-image'),
        minImageWidth = pushLocal.NotificationImagesMinWidth,
        maxButtonDescriptionLength = 42,
        maxButtonInstructionsLength = 135;

    $('#dashboard-remove-image').on('click', function (e) {
        e.preventDefault();

        removeNotificationImage();
    });

    $('#dashboard-choose-image-input').on('change', function () {
        var $imageInput = $('#dashboard-choose-image-input');

        attachImageWidthChecker($image, function (valid) {
            if (!valid) {
                removeDonateImage();
            }
        });

        if ('files' in $imageInput[0] && $imageInput[0].files.length > 0) {
            if ('createObjectURL' in URL) {
                var imageUrl = URL.createObjectURL($imageInput[0].files.item(0));

                $image.attr('src', imageUrl);

                if (!isDonateImageChosen()) {
                    $donateImage.attr('src', imageUrl);
                    $donateImage.show();
                }
            }
        }

        $image.attr('alt', $imageInput[0].value);
        $imageContainer.show();
    });


    //Donation
    var $editDonatePopup = $('#edit-donation-button-info'),
        $saveDonationButton = $('#save-donation-info'),
        $description = $('#ButtonDescription'),
        $descriptionCharsLeft = $('#description-chars-left'),
        $instructions = $('#ButtonInstructions'),
        $instructionsCharsLeft = $('#instructions-chars-left'),
        $amount = $('#ButtonAmount'),
        $amountError = $('#amount-error'),
        $descriptionError = $('#description-error'),
        $donateImageContainer = $('#donation-image-container'),
        $donatePreviousImageID = $('#PreviousButtonImageID'),
        donatePopupClosedBySave = false,
        $chargesStatisticsPopup = $('#charges-statistics-modal'),
        $chargesStatisticsRow = $('#charges-statistics-row-template').html(),
        statisticsRowTemplate = Handlebars.compile($chargesStatisticsRow),
        $chargesTableBody = $('#charges-table-body');

    $editDonatePopup.modal({
        backdrop: false,
        show: false
    });

    $chargesStatisticsPopup.modal({
        backdrop: false,
        show: false
    });

    $notifications.on('click', '.view-payments-link', function (e) {
        e.preventDefault();

        var $this = $(this),
            $post = $this.closest('.dashboard-post'),
            notificationID = $post.data('notificationid');

        showChargesStatistics(notificationID);
    });

    function attachImageWidthChecker(image, callback) {
        image.one('load', function (e) {
            if (typeof callback === 'function') {
                callback(checkImageWidth(this));
            }
        });
    }

    function checkImageWidth(image) {
        if ('naturalWidth' in image) {
            return image.naturalWidth >= minImageWidth;
        }
        return true;
    }

    function isDonateImageChosen() {
        return $('#choose-donate-image-input').val() || $donatePreviousImageID.val();
    }

    function showChargesStatistics(notificationID) {
        $.ajax({
            url: '/Dashboard/GetChargesForNotification',
            data: {
                notificationID: notificationID
            }
        }).done(function (data) {
            var newTableBody = '';
            $.each(data, function (index, charge) {
                newTableBody += statisticsRowTemplate(charge);
            });
            $chargesTableBody.html(newTableBody);
            $chargesStatisticsPopup.modal('show');
        }).fail(function (error) {
            alert('Could not retrieve required info.');
        });
    }

    (function () {
        var label = $('#selectedButtonType');
        var hf = $('#ButtonType');
        $('#buttonDDL').children('li').click(function () {
            var $this = $(this),
                newValue = $this.children('input').val();

            label.text($this.text());
            hf.val(newValue);

            if (newValue === 'Donate') {
                if ($this.data('isprevious')) {
                    loadInfoFromPreviousBtn($this);
                }

                $editDonatePopup.modal('show');
            }
        });
    })();

    function loadInfoFromPreviousBtn($liItem) {
        var descritption = $liItem.data('description'),
            amount = $liItem.data('amount'),
            imageId = $liItem.data('imageid'),
            instructions = $liItem.data('instructions'),
            imageUrl = $liItem.data('imageurl');

        $description.val(descritption);
        $amount.val(amount);
        $instructions.val(instructions);

        removeDonateImage();

        if (!!imageUrl) {
            $donateImage.attr('src', imageUrl);
            $donateImage.show();

            $donatePreviousImageID.val(imageId);
        }

    }

    function isCurrencyValue(value) {
        var numValue = parseFloat(value);
        if (isNaN(numValue) || numValue < 0) {
            return false;
        }
        if (Math.ceil(numValue * 100) != numValue * 100) {
            return false;
        }
        return true;
    }

    function clearDonationInfoValidationMessages() {
        $descriptionError.text('');
        $amountError.text('');
    }

    function validateDonationInfo() {
        clearDonationInfoValidationMessages();

        var result = true,
            description = $description.val(),
            amount = $amount.val();
        if (!$.trim(description)) {
            $descriptionError.text('Required');
            result = false;
        }
        if (amount != '' && !isCurrencyValue(amount)) {
            $amountError.text('Amount must be a currency value');
            result = false;
        }
        return result;
    }

    function selectButtonType(newValue) {
        var newDisplayedValue = $('#buttonDDL').find('input[value="' + newValue + '"]').closest('li').text();

        $('#selectedButtonType').text(newDisplayedValue);
        $('#ButtonType').val(newValue);
    }

    function removeNotificationImage() {
        var $imageInput = $('#dashboard-choose-image-input');
        $('#dashboard-choose-image-input').replaceWith($imageInput.val('').clone(true));
        $image.attr('src', '');
        $imageContainer.hide();
    }

    function removeDonateImage() {
        $('#choose-donate-image-input').replaceWith($('#choose-donate-image-input').val('').clone(true));
        $donateImage.attr('src', defaultDonateImageSrc);
    }

    $editDonatePopup.on('hidden', function (e) {
        if (!donatePopupClosedBySave) {
            selectButtonType('None');
        }
    });

    $saveDonationButton.on('click', function (e) {
        e.preventDefault();

        if (validateDonationInfo()) {
            donatePopupClosedBySave = true;
            $editDonatePopup.modal('hide');
        }
    });

    $('#choose-donate-image-input').on('change', function () {
        var imageInput = $('#choose-donate-image-input')[0];

        attachImageWidthChecker($donateImage, function (valid) {
            if (!valid) {
                removeDonateImage();

                alert('Image should be minimum ' + minImageWidth + 'px width.');
            }
            $donateImage.show();
        });

        $donatePreviousImageID.val('');

        $donateImage.hide();
        if ('files' in imageInput && imageInput.files.length > 0) {
            if ('createObjectURL' in URL) {
                $donateImage.attr('src', URL.createObjectURL(imageInput.files.item(0)));
            }
        }
    });

    $removeDonateImage.on('click', function (e) {
        e.preventDefault();
        removeDonateImage();
        $removeDonateImage.hide();
    });

    $donateImageContainer.on('mouseenter', function () {
        if ($('#choose-donate-image-input').val()) {
            $removeDonateImage.show();
        }
    });

    $donateImageContainer.on('mouseleave', function () {
        if ($('#choose-donate-image-input').val()) {
            $removeDonateImage.hide();
        }
    });

    var descriptionCounter = pushLocal.CharactersCounter($description, maxButtonDescriptionLength, $descriptionCharsLeft),
        instructionsCounter = pushLocal.CharactersCounter($instructions, maxButtonInstructionsLength, $instructionsCharsLeft);

    $editDonatePopup.on('shown', function () {
        descriptionCounter.refresh();
        instructionsCounter.refresh();

        donatePopupClosedBySave = false;
    });
});

function checkDateForFacebookToken() {
    var selectedDate = $("#StartDateStr").datepicker('getDate');
    var now = new Date();
    if (selectedDate - now > 1000*60*60*24*60) {
        var fromDate = selectedDate.getMonth() + '/' + selectedDate.getDate() + '/' + selectedDate.getFullYear();
        var tillDate = (selectedDate.getMonth() + 1) + '/' + (selectedDate.getDate() - 1) + '/' + selectedDate.getFullYear();
        $('#fbTokenDateFrom').text(fromDate);
        $('#fbTokenDateTill').text(tillDate);
        $('#facebookTokenAlert').slideDown(300);
    }
    else {
        $('#facebookTokenAlert').slideUp(300);
    }
}