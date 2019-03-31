function deviceOS() {
  var useragent = navigator.userAgent;

  if(useragent.match(/Android/i)) {
    return 'android';
  } else if(useragent.match(/webOS/i)) {
    return 'webos';
  } else if(useragent.match(/iPhone/i)) {
    return 'iphone';
  } else if(useragent.match(/iPod/i)) {
    return 'ipod';
  } else if(useragent.match(/iPad/i)) {
    return 'ipad';
  } else if(useragent.match(/Windows Phone/i)) {
    return 'windows phone';
  } else if(useragent.match(/SymbianOS/i)) {
    return 'symbian';
  } else if(useragent.match(/RIM/i) || useragent.match(/BB/i)) {
    return 'blackberry';
  } else {
    return false;
  }
}

var breadcrumbs           = document.getElementById('breadcrumbs');
var articleTitle          = document.querySelector('.article-title');
var articleContent        = document.querySelector('.article-content');
var articleTitleHeight    = articleTitle.offsetHeight;
var articleContentHeight  = articleTitle.offsetHeight;

articleTitle.style.transform = 'matrix(1,0,0,1,0,-' + articleTitleHeight + ')';
articleContent.style.transform = 'matrix(1,0,0,1,0,-' + articleContentHeight + ')';

if(!deviceOS()) {
  breadcrumbs.classList.add('breadcrumbs--fixed');
}

window.onscroll = function changeClass() {
  var windowHeight = window.innerHeight;
  var scrollPosY = window.pageYOffset | document.body.scrollTop;
  articleTitle.style.transform = 'matrix(1,0,0,1,0,-' + (articleTitleHeight - (window.pageYOffset / 2.5)) + ')';
  articleContent.style.transform = 'matrix(1,0,0,1,0,-' + (articleContentHeight - (window.pageYOffset / 2)) + ')';
  if(scrollPosY >= articleTitleHeight + 60) {
    articleTitle.classList.add('change-colour');
  } else {
    articleTitle.classList.remove('change-colour');
  }
  if(!deviceOS()) {
    if(scrollPosY >= windowHeight - 15) {
      breadcrumbs.classList.add('change-colour');
    } else {
      breadcrumbs.classList.remove('change-colour');
    }
    if(scrollPosY >= windowHeight) {
      breadcrumbs.classList.add('add-bg-colour');
    } else {
      breadcrumbs.classList.remove('add-bg-colour');
    }
  }
}