(function() {

    iac();
    filesNewTab();
    svgFallback();

    function iac() {

        var container = document.querySelectorAll('.iac-container'),
            buttons = document.querySelectorAll('.iac');

        if (buttons.length != 0) {
            for (var i = buttons.length - 1; i >= 0; i--) {
                buttons[i].style.display = "none";
            };

            for (var i = container.length - 1; i >= 0; i--) {
                container[i].onmouseover = function() {
                    this.querySelector('.iac').style.display = "block";
                }
                container[i].onmouseout = function() {
                    this.querySelector('.iac').style.display = "none";
                }
            };
        }
    }

    function filesNewTab() {
        var link = document.getElementsByClassName('.field-type-file');
        for (var i = link.length - 1; i >= 0; i--) {
            var a = link[i].getElementsByTagName('a');
            a[0].setAttribute('target', '_blank');
        };
    }

    function svgFallback() {
        if (!Modernizr.svg) {
            var imgs = document.getElementsByTagName('img');
            var svgExtension = /.*\.svg$/
            var l = imgs.length;
            for (var i = 0; i < l; i++) {
                if (imgs[i].src.match(svgExtension)) {
                    imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
                }
            }
        }
    }

})();
