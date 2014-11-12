function switchHide(src) {
  var reg = document.getElementById('registration');
  var pas = document.getElementById('password');
  
  if (hasClass(pas, 'hidden')) {
    addClass(reg, 'hidden');
    remClass(pas, 'hidden');
    src.innerText = 'Зарегистрироваться';
  } else {
    addClass(pas, 'hidden');
    remClass(reg, 'hidden');
    src.innerText = 'Восстановить пароль';
  }
  return false;
}

function addClass(el, cls) {
  var c = el.className ? el.className.split(' ') : [];
  for (var i=0; i<c.length; i++) {
    if (c[i] == cls) return;
  }
  c.push(cls);
  el.className = c.join(' ');
}
 
function remClass(el, cls) {
  var c = el.className.split(' ');
  for (var i=0; i<c.length; i++) {
    if (c[i] == cls) c.splice(i--, 1);
  }
  el.className = c.join(' ');
}
 
function hasClass(el, cls) {
  for (var c = el.className.split(' '),i=c.length-1; i>=0; i--) {
    if (c[i] == cls) return true;
  }
  return false;
}