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

        // Fire event on the table when the row has been added
        $tableObject.trigger("rowadded", {
            'index': $rowCount,
            'row': $newRow
        });

        return false;
    });

    $(document).on("click", ".actionDeleteFormRow", function() {
        var $tableObject = $("#"+$(this).attr("data-table-object"));
        if ($tableObject.find("tbody tr").length > 1) {
            $(this).closest("tr").remove();

            // Trigger an event on the table when the row is deleted
            $tableObject.trigger("rowdeleted");
        }
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

    $(".recommended-characters").each(function() {
        updateRecommendedCharacters($(this));
    });
});
