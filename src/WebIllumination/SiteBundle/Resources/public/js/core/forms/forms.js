function generateFormElements($object) {
    $object.find("input, textarea, select, button, a.button").not(".no-uniform").uniform();
}

$(document).ready(function() {
    generateFormElements($(document));

    $(".actionAddFormRow").click(function() {
        var $tableObject = $("#"+$(this).attr("data-table-object"));
        var $rowCount = $tableObject.find("tr").length + 1;
        var $newRow = $tableObject.attr("data-prototype");
        $newRow = $newRow.replace(/__name__/g, $rowCount);
        $newRow = $("<tr></tr>").html($newRow);
        $newRow.appendTo($tableObject.find("tbody"));
        generateFormElements($newRow);
        generateButtons($newRow);
        return false;
    });

    $(document).on("click", ".actionDeleteFormRow", function() {
        var $tableObject = $("#"+$(this).attr("data-table-object"));
        if ($tableObject.find("tbody tr").length > 1) {
            $(this).closest("tr").remove();
        }
    });
});