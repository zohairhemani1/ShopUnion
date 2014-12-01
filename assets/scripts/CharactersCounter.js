var pushLocal = pushLocal || {};

pushLocal.CharactersCounter = function ($input, maxLength, $score) {
    if (!(this instanceof pushLocal.CharactersCounter)) {
        return new pushLocal.CharactersCounter($input, maxLength, $score);
    }

    var self = this;

    self.$input = $input;
    self.maxLength = maxLength;
    self.$score = $score;
    
    self.refresh = function () {
        var textLength = self.$input.val().length;

        textCounter(self.$input[0], self.maxLength);

        var charsleft = self.maxLength - textLength;
        self.$score.text(charsleft);
    };

    function textCounter(field, maxlimit) {
        if (field.value.length > maxlimit)
            field.value = field.value.substring(0, maxlimit);
    }

    function textChanged(event) {
        if (event && event.keyCode == 13) {
            return false;
        }

        self.refresh();
    }

    self.$input.attr("MaxLength", self.maxLength);
    self.$input.attr("maxlength", self.maxLength);

    self.refresh();
    self.$input.on('keyup keydown keypress change', textChanged);
};