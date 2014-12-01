(function () {
    var $videoModal = $('#videoModal'),
        $videoLink = $('#videoLink'),
        $videoModalClose = $videoModal.find('.modal-close-btn'),
        $playerIframe = $videoModal.find('iframe'),
        playerIframeUrl = $playerIframe.attr('src').split('?')[0];

    function pausePlayer() {
        postToPlayer('pause');
    }

    function postToPlayer(action, value) {
        var data = { method: action };

        if (value) {
            data.value = value;
        }

        $playerIframe[0].contentWindow.postMessage(JSON.stringify(data), playerIframeUrl);
    }

    $videoLink.on('click', function (e) {
        if (!pushLocal.isMobile) {
            e.preventDefault();
            $videoModal.show();
        }

    });
    
    $videoLink.on('mouseover', function (e) {
        $(this).addClass("text-highlight");
    });
    
    $videoLink.on('mouseout', function (e) {
        $(this).removeClass("text-highlight");
    });

    $videoModalClose.on('click', function (e) {
        e.preventDefault();
        $videoModal.hide();
        pausePlayer();
    });
})();