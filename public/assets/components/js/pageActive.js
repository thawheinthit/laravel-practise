$(document).ready(function () {
    var menus = $('.nav-tabs li a');
    var hilight = $('.nav-tabs li');
    menus.parent().removeClass('active');
    var matches = menus.filter(function () {
        return document.location.href.indexOf($(this).attr('href')) > -1;
    });
     matches.parent().addClass('active');
  });
