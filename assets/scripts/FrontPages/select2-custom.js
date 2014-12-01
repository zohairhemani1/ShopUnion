var frontPages = frontPages || {};

frontPages.custom_select2 = (function () {
    return {
        init: function ($select) {
            $(document).ready(function () {
                $select.select2({allowClear: true});
            });
            
            $select.on("select2-open", function () {
                $(".select2-results .select2-result").removeClass("select2-selected-item");
                $(".select2-results .select2-result").filter(function () {
                    if (!$select.select2('data')) return false;
                    return $(this).text() == $select.select2('data').text;
                }).addClass("select2-selected-item");
            });
        }
    };
})();