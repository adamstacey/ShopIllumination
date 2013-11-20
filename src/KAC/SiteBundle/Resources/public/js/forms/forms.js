(function ($) {
    $.caretTo = function (el, index) {
        if (el.createTextRange) {
            var range = el.createTextRange();
            range.move("character", index);
            range.select();
        } else if (el.selectionStart != null) {
            el.focus();
            el.setSelectionRange(index, index);
        }
    };

    $.caretPos = function (el) {
        if ("selection" in document) {
            var range = el.createTextRange();
            try {
                range.setEndPoint("EndToStart", document.selection.createRange());
            } catch (e) {
                return 0;
            }
            return range.text.length;
        } else if (el.selectionStart != null) {
            return el.selectionStart;
        }
    };

    $.fn.caret = function (index, offset) {
        if (typeof(index) === "undefined") {
            return $.caretPos(this.get(0));
        }

        return this.queue(function (next) {
            if (isNaN(index)) {
                var i = $(this).val().indexOf(index);

                if (offset === true) {
                    i += index.length;
                } else if (typeof(offset) !== "undefined") {
                    i += offset;
                }

                $.caretTo(this, i);
            } else {
                $.caretTo(this, index);
            }

            next();
        });
    };

    $.fn.caretToStart = function () {
        return this.caret(0);
    };

    $.fn.caretToEnd = function () {
        return this.queue(function (next) {
            $.caretTo(this, $(this).val().length);
            next();
        });
    };
}(jQuery));

(function ($) {
    $.fn.placeholder = function (options) {
        return this.each(function () {
            if (!("placeholder" in document.createElement(this.tagName.toLowerCase()))) {
                var $this = $(this), placeholder = $this.attr('placeholder');
                $this.val(placeholder).data('color', $this.css('color')).css('color', '#aaa');
                $this
                    .focus(function () {
                        if ($.trim($this.val()) === placeholder) {
                            $this.val('').css('color', $this.data('color'));
                        }
                    })
                    .blur(function () {
                        if (!$.trim($this.val())) {
                            $this.val(placeholder).data('color', $this.css('color')).css('color', '#aaa');
                        }
                    });
            }
        });
    };
}(jQuery));

function generateFormElements($object) {
    $object.find("input, textarea, select, button, a.button").not(".no-uniform").uniform();
}

function updateRecommendedCharacters($object) {
    if ($object.length > 0) {
        var $messageObject = $object.next("small");
        if ($messageObject.length > 0) {
            var $recommendedCharacters = $messageObject.attr("data-recommended-characters");
            var $numberOfCharacters = $object.val().length;
            var $remainingCharacters = 0;
            var $colourClass = "";
            var $plural = "";
            var $message = "";
            if ($numberOfCharacters > $recommendedCharacters) {
                $remainingCharacters = $numberOfCharacters - $recommendedCharacters;
                $colourClass = "red";
                $message = "too many";
                if ($remainingCharacters != 1) {
                    $plural = "s";
                }
            } else {
                $remainingCharacters = $recommendedCharacters - $numberOfCharacters;
                $colourClass = "green";
                $message = "remaining";
                if ($remainingCharacters != 1) {
                    $plural = "s";
                }
            }
            $messageObject.html('<strong>Recommended Characters:</strong> '+$recommendedCharacters+' (<strong class="colour-'+$colourClass+'">'+$remainingCharacters+'</strong> character'+$plural+' '+$message+')');
        }
    }
}

function updateRowCounts() {
    $("table.form-table").each(function() {
        var $tableObject = $(this);
        var $rowCount = 0;
        $tableObject.find("tbody > tr:not(.no-data)").each(function() {
            $rowCount++;
            $(this).find("td.row-count").html($rowCount);
            $(this).find("input.display-order").val($rowCount);
        });
    });
}

function updateTemplatePartHiddenFields() {
    $("ul.template-part").each(function() {
        var $hiddenFieldObject = $("#"+$(this).attr("data-hidden-field"));
        var $template = new Array();
        $(this).find("li").each(function() {
            var $templatePartType = $(this).data('type');
            var $templatePartContent = $(this).data('content');

            switch ($templatePartType) {
                case "@VariantToFeature":
                    $template[$template.length] = "@VariantToFeature|"+ $templatePartContent +"|name";
                    break;
                case "freeText":
                    $template[$template.length] = "\""+$templatePartContent+"\"";
                    break;
                default:
                    $template[$template.length] = $templatePartType;
                    break;
            }
        });
        $hiddenFieldObject.val($template.join("^"));
    });
}

function generateTemplateParts() {
    $("ul.template-part").each(function() {
        $(this).html("");
        var $hiddenFieldObject = $("#"+$(this).attr("data-hidden-field"));
        var $templateParts = $hiddenFieldObject.val().split("^");
        for (var $templatePartCount = 0; $templatePartCount <= $templateParts.length; $templatePartCount++) {
            var $templatePartKey =  $templateParts[$templatePartCount];
            var $templatePartName = "";
            var $templatePartContent = "";

            switch ($templatePartKey) {
                case "brand":
                    $templatePartName = "Brand";
                    break;
                case "productCode":
                    $templatePartName = "Product Code";
                    break;
                case "department":
                    $templatePartName = "Department";
                    break;
                case "tagline":
                    $templatePartName = "Tagline";
                    break;
                case "keyMessage":
                    $templatePartName = "Key Message";
                    break;
                case "extraKeywords":
                    $templatePartName = "Extra Keywords";
                    break;
                case "@VariantToFeature":
                    $templatePartName = "Feature";
                    $templatePartContent = $templatePartKey.split("|")[1];
                    break;
                default:
                    if ($templatePartKey) {
                        if ($templatePartKey.indexOf("@VariantToFeature") > -1) {
                            $templatePartContent = $templatePartKey.split("|")[1];
                            $templatePartName = "Feature: " + $("#formFeature").find("option[value='" + $templatePartContent + "']").text();
                        } else if ($templatePartKey.substring(0, 1) == '"' && $templatePartKey.slice(-1) == '"') {
                            $templatePartName = $templatePartKey.substring(1, $templatePartKey.length-1);
                            $templatePartContent = $templatePartName;
                        }
                    }
                    break;
            }
            if ($templatePartName) {
                var $newTemplatePart = $("<li></li>").html('<img class="actionDeleteParent" src="/bundles/kacsite/images/icons/error_small.png" border="0" />'+$templatePartName);
                $newTemplatePart.data('type', $templatePartKey);
                $newTemplatePart.data('content', $templatePartContent);
                $(this).append($newTemplatePart);
            }
        }
    });
}

var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

function loadFormFunctions() {
    $("tr.no-data").each(function() {
        if ($(this).closest("tbody").find("tr").length == 1) {
            var $addFormRowObject = $(this).closest("form").find(".actionAddFormRow");
            if ($addFormRowObject.length > 0 && $(this).closest("table").attr("data-required")) {
                $addFormRowObject.click();
            } else {
                $(this).show();
            }
        } else {
            $(this).hide();
        }
    });

    $(".recommended-characters").each(function() {
        updateRecommendedCharacters($(this));
    });

    $("table.sortable tbody").sortable({
        helper: fixHelper,
        placeholder: "sortable-placeholder",
        handle: ".handle",
        update: function(event, ui) {
            updateRowCounts();
        }
    }).disableSelection();

    $("ul.sortable").sortable({
        helper: fixHelper,
        update: function(event, ui) {
            updateTemplatePartHiddenFields();
        }
    }).disableSelection();
}

function addCollectionGroup($object) {
    var $newGroup = $object.data("prototype");
    var groupCount = $object.children().length + 1;
    $newGroup = $newGroup.replace(/__name__/g, groupCount);
    $newGroup = $("<div />").html($newGroup);
    $newGroup.appendTo($object);
    generateFormElements($newGroup);
    generateButtons($newGroup);
    loadUiFunctions();
    return true;
}

function addCollectionTableRow($object) {
    var rowCount = $object.find("tbody > tr:not(.no-data)").length + 1;
    var $newRow = $object.data("prototype");
    $newRow = $newRow.replace(/__name__/g, rowCount);
    $newRow = $newRow.replace('<td class="row-count"></td>', '<td class="row-count">'+rowCount+'</td>');
    $newRow = $("<tr></tr>").html($newRow);
    $newRow.appendTo($object.find("tbody"));
    generateFormElements($newRow);
    generateButtons($newRow);
    updateRowCounts();

    // Fire event on the table when the row has been added
    $object.trigger("rowadded", {
        'index': rowCount,
        'row': $newRow
    });

    return false;
}

$(document).ready(function() {
    generateFormElements($(document));

    $(document).on("focus", ".ui-dialog-titlebar-close", function() {
        $(this).blur();
    });

    $(document).on("click", ".actionAddFormGroup", function() {
        addCollectionGroup($("#" + $(this).data("object")));
    });

    $(document).on("click", ".actionAddCollectionTableRow", function() {
        addCollectionTableRow($("#" + $(this).data("object")));
    });

    $(document).on("click", ".actionAddFormRow", function() {
        var $tableObject = $("#"+$(this).attr("data-table-object"));
        var $rowCount = $tableObject.find("tbody > tr:not(.no-data)").length + 1;
        if ($tableObject.find("tr.no-data").length > 0)
        {
            $tableObject.find("tr.no-data").hide();
        }
        var $newRow = $tableObject.attr("data-prototype");
        $newRow = $newRow.replace(/__name__/g, $rowCount);
        $newRow = $newRow.replace('<td class="row-count"></td>', '<td class="row-count">'+$rowCount+'</td>');
        $newRow = $("<tr></tr>").html($newRow);
        $newRow.appendTo($tableObject.find("tbody"));
        generateFormElements($newRow);
        generateButtons($newRow);
        updateRowCounts();

        // Fire event on the table when the row has been added
        $tableObject.trigger("rowadded", {
            'index': $rowCount,
            'row': $newRow
        });

        return false;
    });

    $(document).on("click", ".actionDeleteFormRow", function() {
        var $tableObject = $(this).closest("table");
        if ($tableObject.find("tr.no-data").length > 0)
        {
            $(this).closest("tr").remove();
            if ($tableObject.find("tbody > tr:not(.no-data)").length < 1) {
                $tableObject.find("tbody > tr.no-data").show();
            }
            updateRowCounts();

            // Trigger an event on the table when the row is deleted
            $tableObject.trigger("rowdeleted");
        } else {
            if ($tableObject.find("tbody > tr").length > 1) {
                $(this).closest("tr").remove();
                updateRowCounts();

                // Trigger an event on the table when the row is deleted
                $tableObject.trigger("rowdeleted");
            }
        }
    });


    $(document).on("click", ".actionDeleteParent", function() {
        $(this).parent().remove();
        updateTemplatePartHiddenFields();
    });

    $(document).on("keypress keyup focus", ".uppercase", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().toUpperCase());
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".lowercase", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().toLowerCase());
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".url", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().toLowerCase());
        $(this).val($(this).val().replace(/[ ]/g,'-'));
        $(this).val($(this).val().replace(/[^a-z0-9-.?+=&://]/g,''));
        if ($(this).val().substring(0, 7) != 'http://')
        {
            $(this).val('http://'+$(this).val());
        }
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".routing", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().toLowerCase());
        $(this).val($(this).val().replace(/[ ]/g,'-'));
        $(this).val($(this).val().replace(/[^a-z0-9-//]/g,''));
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".postcode", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().toUpperCase());
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".integer", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().replace(/[^0-9]/g,''));
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".float", function() {
        var $currentCaretPosition = $(this).caret();
        $(this).val($(this).val().replace(/[^0-9.]/g,''));
        $(this).caret($currentCaretPosition);
    });

    $(document).on("keypress keyup focus", ".recommended-characters", function() {
        updateRecommendedCharacters($(this));
    });

    $(document).on("change", ".free-text", function() {
        if ($(this).val() == 'freeText')
        {
            $(this).closest("fieldset").find(".free-text-container").show();
            $(this).closest("fieldset").find("#formFreeText").focus();
        } else {
            $(this).closest("fieldset").find(".free-text-container").hide();
        }
    });

    $(document).on("change", ".free-text", function() {
        if ($(this).val() == '@VariantToFeature')
        {
            $(this).closest("fieldset").find(".feature-container").show();
            $(this).closest("fieldset").find("#formFeature").focus();
        } else {
            $(this).closest("fieldset").find(".feature-container").hide();
        }
    });

    $(document).on("click", ".actionAddTemplatePart", function() {
        var $templateObject = $("#"+$("#formTemplate").val());
        var $templatePartTypeName = $("#formTemplatePart").find("option:selected").text();
        var $templatePartType = $("#formTemplatePart").val();
        var $templatePartContent = null;

        // Check if any extra data is needed
        if ($("#formTemplatePart").val() == 'freeText') {
            $templatePartContent = $("#formFreeText").val();
            $templatePartTypeName = $templatePartContent;
        } else if ($("#formTemplatePart").val() == '@VariantToFeature') {
            $templatePartContent = $("#formFeature").val();
            $templatePartTypeName = "Feature: " + $("#formFeature").find("option:selected").text();
        }

        if ($templatePartTypeName != '') {
            if ($templatePartType == '@VariantToFeature') {
                if ($templatePartContent != '') {
                    var $newTemplatePart = $("<li></li>").html('<img class="actionDeleteParent" src="/bundles/kacsite/images/icons/error_small.png" border="0" />'+$templatePartTypeName);
                    $newTemplatePart.data('type', $templatePartType);
                    $newTemplatePart.data('content', $templatePartContent);
                    $templateObject.append($newTemplatePart);
                    updateTemplatePartHiddenFields();
                }
            } else {
                var $newTemplatePart = $("<li></li>").html('<img class="actionDeleteParent" src="/bundles/kacsite/images/icons/error_small.png" border="0" />'+$templatePartTypeName);
                $newTemplatePart.data('type', $templatePartType);
                $newTemplatePart.data('content', $templatePartContent);
                $templateObject.append($newTemplatePart);
                updateTemplatePartHiddenFields();
            }
        }
    });

    $(document).on("click", ".actionApplyToAll", function() {
        $(".loading-container").show();
        var $fieldToApplyToAll = $(this).attr("data-apply-to-all-field");
        if ($fieldToApplyToAll) {
            if ($(this).attr("data-icon-only") == "true") {
                var $valueToApply = $(this).parent().prev("td").find("[data-apply-to-all='"+$fieldToApplyToAll+"']").val();
                if ($valueToApply) {
                    var $tableIndex = $("table.form-table").index($(this).closest("table.form-table"));
                    var $selectedIndex = $("table.form-table:eq("+$tableIndex+") tbody tr td [data-apply-to-all-field='"+$fieldToApplyToAll+"']").index(this);
                    var $numberToApplyToAll = $("table.form-table").length;
                    if ($numberToApplyToAll > 0) {
                        var $numberApplied = 0;
                        $("table.form-table").each(function() {
                            var $objectToUpdate = $(this).find("tbody tr:eq("+$selectedIndex+") [data-apply-to-all='"+$fieldToApplyToAll+"']");
                            if ($objectToUpdate.is("select")) {
                                $objectToUpdate.find("option:selected").removeAttr("selected");
                                $objectToUpdate.find("option[value='"+$valueToApply+"']").attr("selected", "selected");
                            } else {
                                $objectToUpdate.val($valueToApply);
                            }
                            $numberApplied++;
                            if ($numberApplied == $numberToApplyToAll) {
                                $.uniform.update();
                                $(".loading-container").fadeOut(500);
                            }
                        });
                    } else {
                        $(".loading-container").fadeOut(500);
                    }
                } else {
                    $(".loading-container").fadeOut(500);
                }
            } else {
                var $valueToApply = $(this).closest(".widget").find("[data-apply-to-all='"+$fieldToApplyToAll+"']").val();
                if ($valueToApply) {
                    var $numberToApplyToAll = $("[data-apply-to-all='"+$fieldToApplyToAll+"']").length;
                    if ($numberToApplyToAll > 0) {
                        var $numberApplied = 0;
                        $("[data-apply-to-all='"+$fieldToApplyToAll+"']").each(function() {
                            var $objectToUpdate = $(this);
                            if ($objectToUpdate.is("select")) {
                                $objectToUpdate.find("option:selected").removeAttr("selected");
                                $objectToUpdate.find("option[value='"+$valueToApply+"']").attr("selected", "selected");
                            } else {
                                $objectToUpdate.val($valueToApply);
                            }
                            $numberApplied++;
                            if ($numberApplied == $numberToApplyToAll) {
                                $.uniform.update();
                                $(".loading-container").fadeOut(500);
                            }
                        });
                    } else {
                        $(".loading-container").fadeOut(500);
                    }
                } else {
                    $(".loading-container").fadeOut(500);
                }
            }
        } else {
            $(".loading-container").fadeOut(500);
        }
    });

    $(document).on("click", ".actionIncreaseQuantity", function() {
        var $quantityInput = $(this).parent().find("input.quantity");
        $quantityInput.val(parseInt($quantityInput.val()) + 1);
    });

    $(document).on("click", ".actionDecreaseQuantity", function() {
        var $quantityInput = $(this).parent().find("input.quantity");
        if (parseInt($quantityInput.val()) > 1) {
            $quantityInput.val(parseInt($quantityInput.val()) - 1);
        }
    });

    loadFormFunctions();

    generateTemplateParts();
});
