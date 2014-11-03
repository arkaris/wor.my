function hrefExtend(target) {
  var href = target.querySelector('a').getAttribute('href');
  document.location.href = href;
  return false;
}
