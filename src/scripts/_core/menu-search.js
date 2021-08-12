/*
* Button Search active/deactive
*/
$("header.site-header .search-submit-toggle").clickToggle(function () {
    $(this).parents('.search-form').toggleClass('active')
},function () {
    $(this).parents('.search-form').toggleClass('active')
});

/*
* Button Close active/deactive
*/
$("header.site-header:not(.search-sticky) .search-submit-close").clickToggle(function () {
    $(this).parents('.search-form').toggleClass('active')
    $(this).parents('#header').toggleClass('search-active')
},function () {
    $(this).parents('.search-form').toggleClass('active')
    $(this).parents('#header').toggleClass('search-active')
});

$("header.site-header.search-sticky .search-submit-close").clickToggle(function () {
    $(this).parents('.search-form').toggleClass('active')
},function () {
    $(this).parents('.search-form').toggleClass('active')
});
