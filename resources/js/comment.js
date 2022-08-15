$(document).ready(function () {
    hideData();
    toggleData();
});

var checkOpen = true;

function hideData() {
    let comments = $(".comments .comment");
    $(comments).each(function (index) {
        if (index > 1) {
            $(this).hide();
        }
    });
}

function toggleData() {
    $(document).on("click", "#showAllComments", function (e) {
        let comments = $(".comments .comment");
        if (!checkOpen) {
            $(comments).each(function (index) {
                if (index > 1) {
                    $(this).hide();
                }
            });
            $(this).find(".down-icon").addClass("fa-caret-right");
            $(this).find(".down-icon").removeClass("fa-caret-down");
        } else {
            $(comments).each(function () {
                $(this).show();
            });
            $(this).find(".down-icon").removeClass("fa-caret-right");
            $(this).find(".down-icon").addClass("fa-caret-down");
        }

        checkOpen = !checkOpen;
    });
}
