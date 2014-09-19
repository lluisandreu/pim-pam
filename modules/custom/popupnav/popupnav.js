(function($) {
    var menuTrigger = $('.popupnav-trigger');
    var breakpoint = $('#popupnav-fullscreen').data('breakpoint');
    var blockId = $('#block-popupnav-popupnav');
    var replaceMenuId = $('#popupnav-fullscreen').data('replace');
    var replaceMenu = null;
    if (replaceMenuId) {
        if (replaceMenuId.indexOf('#') !== -1 && replaceMenuId.charAt(0) === '#') {
            replaceMenu = replaceMenuId;
        }
    }

    $(window).on('load resize', function(event) {
        var winSize = document.documentElement.clientWidth || document.body.clientWidth;
        if (breakpoint) {
            if (winSize >= breakpoint) {
                blockId.hide();
                if (replaceMenu != null) {
                    $(replaceMenu).show();
                }
            } else {
                blockId.show();
                if (replaceMenu != null) {
                    $(replaceMenu).hide();
                }
            }
        } else {
            blockId.show();
        }
    });

    if($('nav.popupnav-navigation').hasClass('collapse-children')){
            collapseChildren();
    }

    menuTrigger.on('click', function(event) {
        event.preventDefault();
        openMenu();

    });

    $('#popupnav-fullscreen a').on('click', function(event) {
        event.preventDefault();
        closeMenu();
        goTo($(this));
    });

    $('html').live('keydown', function(e) {
        if (e.keyCode == 27) {
            e.preventDefault();
            closeMenu();
        }
    });

    function collapseChildren(){
        var parent = $('li.parent-item');
        var trigger = '<span class="collapse-trigger collapsed">&#59236;</span>';
        parent.append(trigger);
        $('.collapse-trigger').click(function(event) {
            if($(this).hasClass('collapsed')){
                openCollapse($(this));
            } else {
                collapse($(this));
            }
        });
    }
    function openCollapse(element) {
        element.siblings('ul.collapse').slideDown(400);
        element.html('&#59239;').removeClass('collapsed').addClass('open');
    }

    function collapse(element){
        element.siblings('ul.collapse').slideUp(400);
        element.html('&#59236;').removeClass('open').addClass('collapsed');
    }

    function openMenu() {
        $('#popupnav-fullscreen').removeClass('closed').addClass('visible');
        $('html, body').css('overflow', 'hidden');
    }

    function goTo(element){
        var location = element.attr('href');
        window.location = location;
    }

    function closeMenu() {
        $('#popupnav-fullscreen').removeClass('visible').addClass('closed');
        $('html, body').css('overflow', 'visible');
    }

})(jQuery);