(function ($) {
    "use strict";

    /* ----------------------------------------------------------------
           [ Alert Auto Close Js ]
-----------------------------------------------------------------*/

    window.setTimeout(function() {
        $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000);

    /* ----------------------------------------------------------------
                [ Prevent Multiple Submit Js ]
-----------------------------------------------------------------*/

    $('form').on('submit', function () {
        $(this).find(':submit').attr('disabled', 'true');
    });

    /* ----------------------------------------------------------------
              [ Fontawesome IconPicker Js ]
-----------------------------------------------------------------*/

    $('#iconPickerBtn').iconpicker();
    $('#iconPickerBtn2').iconpicker();


    $(".iconpicker-item").on("click", function() {
        var li = document.getElementById('icon-value');

        if (li.className === "null") {
            document.getElementById("icon").value = "";
        } else {
            document.getElementById("icon").value = li.className;
        }
    });

    $(".iconpicker-item").on("click", function() {
        var li2 = document.getElementById('icon-value2');

        if (li2.className === "null") {
            document.getElementById("icon2").value = "";
        } else {
            document.getElementById("icon2").value = li2.className;
        }
    });

    /* ----------------------------------------------------------------
           [ Fontawesome IconPicker Rtl Js ]
-----------------------------------------------------------------*/

    var hasRtl  = $('body').hasClass("rtl-version");

    if (hasRtl) {
        $('.iconpicker-search').attr('placeholder', 'اكتب للتصفية');
    }

    // Hide/Show Div
    $("#page_view").on("change",function() {
        if ($('#page_view').val() == 'default_view') {
            $("#default_view").removeClass("hide");
            $("#grid_view").addClass("hide");
            $("#masonary_view").addClass("hide");
        } else if($('#page_view').val() == 'grid_view') {
            $("#default_view").addClass("hide");
            $("#grid_view").removeClass("hide");
            $("#masonary_view").addClass("hide");
        } else {
            $("#default_view").addClass("hide");
            $("#grid_view").addClass("hide");
            $("#masonary_view").removeClass("hide");
        }
    });

    // Slider Section Hide/Show Div
    $("#style").on("change",function() {
        if ($('#style').val() == 'style1') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style2') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style3') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style4') {
            $("#video_area").removeClass("hide");
        } else if($('#style').val() == 'style5') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style6') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style7') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style8') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style9') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style10') {
            $("#video_area").addClass("hide");
        } else if($('#style').val() == 'style11') {
            $("#video_area").removeClass("hide");
        }
    });

}(jQuery));

// For type selection. enum('type', ['icon', 'image'])
function showHideTypeDiv() {
    "use strict";

    var optionsRadios1 = document.getElementById("optionsRadios1");
    var optionsRadios2 = document.getElementById("optionsRadios2");
    var iconType = document.getElementById("icon-type");
    var imageType = document.getElementById("image-type");
    iconType.style.display = optionsRadios1.checked ? "block" : "none";
    imageType.style.display = optionsRadios2.checked ? "block" : "none";
}

function copyImageLink(id) {
    "use strict";

    var copyText = document.getElementById("copyImageLink"+id);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Copied Text" + ":" + copyText.value);
}

function copyLink(id) {
    "use strict";

    var copyText = document.getElementById("copyLink"+id);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("Copied Text" + ":" + copyText.value);
}

// Delete checked list.
function showHideDeleteButton(source) {
    "use strict";
    var check_all = document.getElementById("check_all");
    deleteChecked.style.display = check_all.checked ? "inline" : "none";

    var checkboxes = document.getElementsByName('check_list[]');

    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

function showHideDeleteButton2(source) {
    "use strict";
    deleteChecked.style.display = source.checked ? "inline": "inline";
}

// Get checkbox list
function btnCheckListGet() {
    "use strict";
    //Create an Array.
    var selected = new Array();

    //Reference the CheckBoxes and insert the checked CheckBox value in Array.
    $("#basic-datatable input[type=checkbox]:checked").each(function () {
        selected.push(this.value);
    });

    //Display the selected CheckBox values.
    if (selected.length > 0) {
        selected.join(",");
    }

    return document.getElementById("checked_lists").value = selected;
}

// custom tag
function insertTag(tagName, tagIdName) {
    "use strict";
    const titleInput = document.getElementById(tagIdName);
    const selectedText = titleInput.value.substring(titleInput.selectionStart, titleInput.selectionEnd);
    const tag = `<${tagName}>${selectedText}</${tagName}>`;

    // Insert the tag at the current cursor position
    const startPos = titleInput.selectionStart;
    const endPos = titleInput.selectionEnd;
    titleInput.value = titleInput.value.substring(0, startPos) + tag + titleInput.value.substring(endPos);

    // Move the cursor to the end of the inserted tag
    titleInput.selectionStart = startPos + tag.length;
    titleInput.selectionEnd = startPos + tag.length;
}

"use strict";
// Image Section Hide/Show Div
document.addEventListener("DOMContentLoaded", function() {
    // Show the mod when you click on the button with the mouse
    var hoverButton = document.getElementById("hoverButton");
    var imageModal = document.getElementById("imageModal");

    if (hoverButton && imageModal) {
        hoverButton.addEventListener("mouseenter", function() {
            imageModal.classList.add("show");
        });

        hoverButton.addEventListener("mouseleave", function() {
            imageModal.classList.remove("show");
        });
        // Show the mod when you click on the button with the mouse
        document.getElementById("hoverButton").addEventListener("mouseenter", function() {
            document.getElementById("imageModal").classList.add("show");
        });

        // Hide the modal when you exit the button with the mouse
        document.getElementById("hoverButton").addEventListener("mouseleave", function() {
            document.getElementById("imageModal").classList.remove("show");
        });
    }

});
