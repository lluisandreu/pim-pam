(function($) {
    $(document).ready(function() {
        iac();
        filesNewTab();
        prettyButtons();
        prettyForms();
        ieCheck();
    });

    function iac() {
        $(".iac").hide();
        $(".iac-container").hover(function() {
            $(this).find(".iac").show();
        }, function() {
            $(this).find(".iac").hide();
        });
    };

    function filesNewTab() {
        $('.field-type-file').find('a').attr('target', '_blank');
        $('.file').find('a').attr('target', '_blank');
    }

    function prettyButtons() {
        $('input[type=submit]').addClass('pretty medium default btn');
    }

    function prettyForms() {
        $('input[type=text], input[type=email], input[type=password]').addClass('input').wrap('<div class="field"></div>');
        $('textarea').addClass('input textarea').wrap('<div class="field"></div>');
    }

    function ieCheck(){
        if($('html').hasClass('ie7')){
            $("#js-messages").append('<div class="message warning" style="padding: 5px;" class="message warning">You are using an old version of <u>Internet Explorer</u>. Some features on the site may not work. Consider updating or changing your browser.</div>');
        }
    }


})(jQuery);