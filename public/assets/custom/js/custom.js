// PRODUK DETAIL THUMBNAIL ZOOM HOVER

$(function() {
    $('.zoom').zoom();
    $('.thumb').on('click', 'a', function(e) {
        e.preventDefault();
        var thumb = $(e.delegateTarget);
        if (!thumb.hasClass('active')) {
            thumb.addClass('active').siblings().removeClass('active');
            $('.zoom')
                .zoom({
                    url: this.href
                })
                .find('img').attr('src', this.href);
        }
    });
});

// MEGA MENU DROPDOWN

$(document).ready(function() {
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
            $(this).toggleClass('open');
        }
    );
});

// LOAD MORE

$(document).ready(function() {
    $(".col-load-more").slice(0, 12).show();
    $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".col-load-more:hidden").slice(0, 4).slideDown();
        if ($(".col-load-more:hidden").length == 0) {
            $("#loadMore").text("No Content").addClass("noContent");
        }
    });

})

// SELECT 2

$(document).ready(function() {
    $('.select-kategori').select2();
});

$(document).ready(function() {
    $('.select-brand').select2();
});

$(document).ready(function() {
    $('.select-provinsi').select2();
});

$(document).ready(function() {
    $('.select-sort-list').select2();
});