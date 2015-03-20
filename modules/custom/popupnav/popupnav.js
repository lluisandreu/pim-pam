(function() {

    var trigger = document.querySelector('.popupnav-trigger');
    var closer = document.querySelector('.popupnav-close');
    var popup = document.getElementById('popupnav-fullscreen');

    var breakpoint = popup.dataset.breakpoint;
    var popUpNav = document.getElementById('block-popupnav-popupnav');
    var MainMenu = popup.dataset.replace;



    function init() {
        responsive();
        initEvents();
        collapseChildren();
        esc();
    }

    function initEvents() {
        togglePopup();
    }

    function togglePopup() {
        trigger.onclick = function() {
            popup.className = "visible";
        }

        closer.onclick = function() {
            popup.className = "closed";
        }
        var links = document.querySelectorAll(".popupnav-navigation a");
        for (var i = links.length - 1; i >= 0; i--) {
            links[i].onclick = function() {
                popup.className = "closed";
            }
        };
    }

    // If responsive is TRUE then show the menus at the right window width
    function responsive() {
        if (MainMenu && breakpoint) {
            window.onresize = function() {
                showHide();
            }
            window.onload = function() {
                showHide();
            }
        }
    }

    function esc() {
        document.onkeydown = function(key) {
            if (key.keyCode == 27 && popup.className == "visible") {
                popup.className = "closed";
            }
        }
    }


    function showHide() {
        var el = document.querySelector(MainMenu);
        if (window.innerWidth >= breakpoint) {
            popUpNav.style.display = "none";
            el.style.display = "block";
        } else {
            popUpNav.style.display = "block";
            el.style.display = "none";
        }
    }

    function collapseChildren() {
        var parent = document.querySelectorAll('li.parent-item');
        for (var i = parent.length - 1; i >= 0; i--) {
            var trigger = document.createElement('span');
            trigger.className = "collapse-trigger collapsed";
            trigger.innerHTML = "&#10133;";
            parent[i].appendChild(trigger);
            trigger.onclick = function() {
                var child = this.previousSibling;
                var childClass = child.className;
                if (childClass == "child-closed") {
                    child.className = "child-collapsed";
                    this.innerHTML = "&#10134;";
                } else {
                    child.className = "child-closed";
                    this.innerHTML = "&#10133;";
                }


            }
        };
    }

    init();

})();
