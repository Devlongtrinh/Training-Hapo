$(document).ready(function () {
    hideData();
    toggleData();
});

var checkOpen = true;

function hideData() {
    let reviews = $(".reviews .review");
    $(reviews).each(function (index) {
        if (index > 1) {
            $(this).hide();
        }
    });
}

function toggleData() {
    $(document).on("click", "#showAllComments", function (e) {
        let reviews = $(".reviews .review");
        if (!checkOpen) {
            $(reviews).each(function (index) {
                if (index > 1) {
                    $(this).hide();
                }
            });
            $(this).find(".down-icon").addClass("fa-caret-right");
            $(this).find(".down-icon").removeClass("fa-caret-down");
        } else {
            $(reviews).each(function () {
                $(this).show();
            });
            $(this).find(".down-icon").removeClass("fa-caret-right");
            $(this).find(".down-icon").addClass("fa-caret-down");
        }

        checkOpen = !checkOpen;
    });
}
