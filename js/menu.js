function showMobileMenu() {
  $('.js-display-menu').click(function() {
    $('body').toggleClass('js-show-menu');
  });
}

function openCloseMobileMenu() {
  $('#nav-icon').click(function() {
    $(this).toggleClass('open');
  });
}

$(document).ready(function() {
  showMobileMenu();
  openCloseMobileMenu();
});