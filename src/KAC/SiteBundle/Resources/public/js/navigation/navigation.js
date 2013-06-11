$(document).ready(function() {
    var $menuRow = $(".main-menu .menu-horizontal");
    var activeRow = null;
    $menuRow.find('> li').on('mouseenter', function() {
        var submenuId = $(this).data("submenu"),
            $submenu = $("#" + submenuId),
            height = $menuRow.outerHeight();

        $submenu.css({
            display: "block",
            left: $(this).position().left,
            top: height
        });
    }).on('mouseleave', function() {
            var submenuId = $(this).data("submenu"),
                $submenu = $("#" + submenuId);

            $submenu.css("display", "none");
            $submenu.find('menu-horizontal').css("display", "none");
        });

    var $menu = $(".main-menu .menu-vertical");
    $menu.menuAim({
        activate: activateSubmenu,
        deactivate: deactivateSubmenu
    });

    function activateSubmenu(row) {
        var $row = $(row),
            submenuId = $row.data("submenu"),
            $submenu = $("#" + submenuId),
            height = $menu.outerHeight(),
            width = $menu.outerWidth();

        // Show the submenu
        $submenu.css({
            display: "block",
            left: width - 4,
            top: -1,
            height: height - 22
        });
    }

    function deactivateSubmenu(row) {
        var $row = $(row),
            submenuId = $row.data("submenu"),
            $submenu = $("#" + submenuId);

        // Hide the submenu and remove the row's highlighted look
        $submenu.css("display", "none");
    }
});