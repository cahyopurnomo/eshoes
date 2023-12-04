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
    $('.select-brand').select2();
    $('.select-provinsi').select2();
    $('.select-sort-list').select2();

    // tab brand detail
    $('button[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('data-bs-target'));
    });

    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('button[data-bs-target="' + activeTab + '"]').tab('show');
    }
});