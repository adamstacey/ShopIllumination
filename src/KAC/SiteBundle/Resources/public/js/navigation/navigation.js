$(document).ready(function() {
    // Add events for top level navigation
    var $menuRow = $(".main-menu .menu-horizontal");
    $menuRow.find('> li').on('mouseenter', function() {
        var submenuId = $(this).data("submenu"),
            $submenu = $("#" + submenuId),
            height = $menuRow.outerHeight();

        // Show the menu
        $submenu.css({
            display: "block",
            left: $(this).position().left,
            top: height
        });
    }).on('mouseleave', function() {
        var submenuId = $(this).data("submenu"),
            $submenu = $("#" + submenuId);

        // Hide the menu and any menus that were left open
        $submenu.css("display", "none");
        $submenu.find('menu-horizontal').css("display", "none");
    });

    // Add events for lower level navigation
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