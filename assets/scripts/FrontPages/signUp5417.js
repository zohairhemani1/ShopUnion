(function () {
    var $stepOne = $('.stepOne'),
        $stepTwo = $('.stepTwo'),
        $stepThree = $('.stepThree'),
        $stepThreeBasic = $('.stepThreeBasic'),
        $stepThreePremium = $('.stepThreePremium'),
        $stepThreeFree = $('.stepThreeFree'),
        $signUpType = $('#SignUpType'),
        signUpType = ($signUpType.val() || '').toLowerCase(),
        $stepFour = $('.stepFour'),
        currentStep = 1,
        $mainForm = $('#businessForm'),
        $accountType = $mainForm.find('#AccountType'),
        premiumAccountValue = $mainForm.find('#premiumAccountType').val(),
        $firstName = $('#FirstName'),
        $lastName = $('#LastName'),
        $email = $('#Email'),
        $password = $('#Password'),
        $confirmPassword = $('#ConfirmPassword'),
        stepOneInputs = [
            $lastName,
            $firstName,
            $email,
            $password,
            $confirmPassword
        ],
        $state = $('#SelectedState'),
        $city = $('#SelectedFeed'),
        $businessName = $('#BusinessName'),
        $category = $('#SelectedCategory'),
        $frequency = $('#SelectedFrequency'),
        $type = $('#Type'),
        $site = $('#Site'),
        $phone = $('#Phone'),
        $description = $('#Description'),
        stepTwoInputs = [
            $city,
            $businessName,
            $category,
            $frequency,
            $type,
            $site,
            $phone,
            $description
        ],
        $couponCodeMain = $mainForm.find('#couponCodeMain'),
        $stripeTokenForm = $('#stripeTokenForm'),
        $stripeToken = $('#stripeToken'),
        $cardName = $('#cardName'),
        $cardAddress = $('#cardAddress'),
        $cardCity = $('#cardCity'),
        $cardState = $('#cardState'),
        $cardPostalCode = $('#cardPostalCode'),
        $cardNumber = $('#cardNumber'),
        $cardMonth = $('#cardMonth'),
        $cardYear = $('#cardYear'),
        $cardCvc = $('#cardCvc'),
        $subscribePremiumBtn = $('#subscribePremiumBtn'),
        $couponCode = $('#couponCode'),
        $steps = $('.stepsBox .steps'),
        $errorMessageFromServer = $('#errorMessage'),
        errorMessageFromServer = $errorMessageFromServer.val();

    function nextStep() {
        if (currentStep === 1) {
            if (validateStepOne()) {
                $stepOne.hide();
                $stepTwo.show();
                currentStep++;
                //initCitiesSelect();
            }
        } else if (currentStep === 2) {
            if (validateStepTwo()) {
                $stepTwo.hide();
                if (signUpType === 'basic') {
                    $stepThreeBasic.show();
                } else if (signUpType === 'premium') {
                    $stepThreePremium.show();
                } else if (signUpType === 'community') {
                    $stepThreeFree.show();
                } else {
                    $stepThree.show();
                }
                currentStep++;
            }
        } else if (currentStep === 3) {
            $stepThree.hide();
            $stepThreeBasic.hide();
            $stepThreeFree.hide();
            $stepThreePremium.hide();
            $stepFour.show();
            currentStep++;
        }
        switchStepsBox(currentStep);
    }

    function previousStep() {
        if (currentStep === 2) {
            $stepTwo.hide();
            $stepOne.show();
            currentStep--;
        }
        switchStepsBox(currentStep);
    }

    function validateStepOne() {
        var isValid = true,
            i;
        for (i = 0; i < stepOneInputs.length; i++) {
            if (!stepOneInputs[i].valid()) {
                isValid = false;
            }
        }
        return isValid;
    }

    function validateStepTwo() {
        var isValid = true,
            i;
        for (i = 0; i < stepTwoInputs.length; i++) {
            if (!stepTwoInputs[i].valid()) {
                isValid = false;
            }
        }
        return isValid;
    }

    function switchStepsBox(step) {
        var $stepsItems = $steps.children(),
            $progress = $('.stepsBox .progress'),
            i,
            level;
        $stepsItems.removeClass('active');


        for (i = 0, level = step > 3 ? 3 : step; i < level; i++) {
            $($stepsItems[i]).html("Step " + (i + 1) + ' is Done <em></em>');
        }
        $($stepsItems[i - 1]).addClass('active');
        for (; i < 4; i++) {
            $($stepsItems[i]).html("Step " + (i + 1) + ' is undone <em></em>');
        }

        $progress.removeClass();
        $progress.addClass('progress ' + 'level' + level);
    }

    function getStripeToken(success, error) {
        Stripe.card.createToken({
            number: $cardNumber.val(),
            cvc: $cardCvc.val(),
            exp_month: $cardMonth.val(),
            exp_year: $cardYear.val(),
            name: $cardName.val(),
            address_line1: $cardAddress.val(),
            address_city: $cardCity.val(),
            address_state: $cardState.val(),
            address_zip: $cardPostalCode.val()
        }, function (status, response) {
            if (!response.error) {
                if (typeof success === 'function') {
                    success(response['id']);
                }
            } else {
                if (typeof error === 'function') {
                    error(response.error);
                }
            }
        });
    }

    function showErrorMessage(message) {
        alert(message);
    }

    function copyCouponToMainForm() {
        var couponCode = $couponCode.val();
        $couponCodeMain.val(couponCode);
    }

    function validateTokenForm() {
        var isValid = true;
        $stripeTokenForm.find('input,select').each(function (index, element) {
            if (!$(element).valid()) {
                isValid = false;
            }
        });
        return isValid;
    }

    function initCitiesSelectForUS() {
        var selectedStateId;
        if ($state.select2('data') && $state.select2('data').id) {
            selectedStateId = $state.select2('data').id;
        } else {
            selectedStateId = null;
            $city.val('');
        }
        $city.select2({
            placeholder: "Select city",
            minimumInputLength: 2,
            ajax: {
                url: '/Home/GetFeedsByState',
                data: function (filter) {
                    return {
                        stateId: selectedStateId,
                        nameFilter: filter
                    };
                },
                results: function (data) {
                    var cities = [];
                    $.each(data, function () {
                        cities.push({ id: this.ID, Name: this.Name });
                    });
                    return { results: cities };
                }
            },
            formatResult: function (city) {
                return city.Name;
            },
            formatSelection: function (city) {
                return city.Name;
            },
            formatInputTooShort: function (term, minLength) { return "Start typing your city name..."; }
        });
        $city.select2('enable', selectedStateId != null);
    }
    
    Stripe.setPublishableKey(pushLocal.stripePublishableKey);

    $stripeTokenForm.validate({
        errorPlacement: function (error, element) {
            if (element.hasClass('errorAppendToParent')) {
                element.parent().append(error);
            } else {
                $(error).insertAfter(element);
            }
        }
    });

    if (errorMessageFromServer) {
        showErrorMessage(errorMessageFromServer);
    }

    $(document).ready(function () {
        if ($('#CountryName').val() == 'US') {
            initCitiesSelectForUS();
        } 
    });

    $phone.mask(l10n.phoneMask);

    $mainForm.on('click', '.nextStepBtn', function (e) {
        nextStep();

        e.preventDefault();
    });

    $mainForm.on('click', '.prevStepBtn', function (e) {
        previousStep();

        e.preventDefault();
    });

    $mainForm.on('click', '.changePackageBtn', function (e) {
        e.preventDefault();

        $stepThreeBasic.hide();
        $stepThreeFree.hide();
        $stepThreePremium.hide();
        $stepThree.show();
    });

    $mainForm.on('click', '.selectPlanBtn', function (e) {
        var $this = $(this),
            planValue = $this.find('input').val();

        $accountType.val(planValue);
        if (planValue === premiumAccountValue) {
            nextStep();
        } else {
            $mainForm.submit();
        }

        e.preventDefault();
    });

    $state.on('change', function (e) {
        initCitiesSelectForUS();
    });

    $subscribePremiumBtn.on('click', function (e) {
        e.preventDefault();

        if (validateTokenForm()) {
            getStripeToken(function (token) {
                $stripeToken.val(token);
                copyCouponToMainForm();
                $mainForm.submit();
            }, function (error) {
                showErrorMessage(error);
            });
        }
    });
})();