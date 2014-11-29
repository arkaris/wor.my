var validator=[];
validator[0] = new Validator('authorization');
validator[1] = new Validator('registration');
validator[2] = new Validator('password_change');

function Validator(formName) {
  var frm = document.forms[formName];
  frm.validate = function() {
    //прохожусь по инпутам
    var firstErr,
        i = 0;
    while (frm[i]) {
      if (frm[i].type != 'submit')
      if ( !validate(frm[i]) ) firstErr = (firstErr || frm[i]);
      i++;
    }
    //форма не валидна
    if (firstErr) {
      //скролл
      firstErr.focus();
      return false;
    }
    //форма валидна
    return true;
  };
  
  //------------------- онлайн обработчик -------------------
  frm.addEventListener('blur', onFormBlur, true);
  function onFormBlur(event) {
    event = event || window.event;
    var target = event.target || event.srcElement;
    
    //отлавливаю событие
    while(target != this) {
      if (target.tagName == 'INPUT' || target.tagName == 'SELECT') {
        //клик по инпуту
        return validate(target);
      }
      target = target.parentNode;
    }
    //клик хз где
    return true;
  };
  
  //------------------- валидация -------------------
  function validate(target) {
    //предваритеьная обработка
    target.value = prevalidate(target.value);
    if (target.err) delMsg(target);
    
    try {
      //required
      if (target.required) vRequired(target);
      //пусто и ладно (например должно стоять только число, но заполнять не обязательно)
      if (!target.value || target.value == "") return true;
      //min length
      if (target.hasAttribute('data-minln')) vMinln(target, target.getAttribute('data-minln'));
      //max length
      if (target.hasAttribute('data-maxln')) vMaxln(target, target.getAttribute('data-maxln'));
      //compare with
      if (target.hasAttribute('data-compare')) vCompare(target, target.getAttribute('data-compare'));
      //mask
      if (target.hasAttribute('data-mask')) vMask(target, target.getAttribute('data-mask'));
      //latin & numeric
      if (target.hasAttribute('data-lat')) vLat(target);
      //numeric
      if (target.hasAttribute('data-num')) vNum(target);
      //phone
      if (target.hasAttribute('data-phone')) vPhone(target);
      //email
      if (target.hasAttribute('data-email')) vEmail(target);
      
      //submit
      //if (target.type == 'submit') vSubmit(target); 
      
    } catch(e) {
      //ошибка валидации
      target.errMsg = addMsg(target, e.message);
      return false;
    }
    
    //успешная валидация - убрать сообщение об ошибке
    if (target.errMsg) delMsg(target);
    return true;
  }
  
  //------------------- функции непосредственно валидации -------------------
  function prevalidate(str) {
    //удаляю лишние пробелы
    str = str.replace(/\s+/g,' ').replace(/^\s*/, '').replace(/\s*$/, '');
    return str;
  }
  
  function vRequired(target) {
    if (!target.value || target.value == "") {
      //добавить сообщение об ошибке
      throw new Error('Это поле должно быть заполнено');
    }
  }
  
  function vMinln(target, minln, msg) {
    var strln = target.value.length;
    msg = msg || 'Это поле должно содержать ' + (minln) + ' или более символов';
    if ( strln < minln )
      throw new Error(msg);
    return true;
  }
  
  function vMaxln(target, maxln, msg) {
    var strln = target.value.length;
    msg = msg || 'Это поле должно содержать ' + (maxln) + ' или менее символов';
    if (strln > maxln)
      throw new Error(msg);
    return true;
  }
  
  function vCompare(target, source) {
    source = frm[source];
    if (!(target.value === source.value))
      throw new Error('Пароли не совпадают');
    return true;
  }
  
  function vMask(target, reg, msg) {
    var reg = new RegExp(reg);
    msg = (msg || 'Не удовлетворяет маске');
    if (!(reg.test(target.value)))
      throw new Error(msg);
    return true;
  }
  
  function vLat(target) {
    vMask(target, '^[A-z0-9_-]+$', 'Это поле должно содержать только символы латинского алфавита или числа');
    return true;
  }
  
  function vNum(target) {
    vMask(target, '^[0-9]+$', 'Это поле должно содержать только цифры');
    return true;
  }
  
  //------------------- к-к-к-комбо -------------------
  function vEmail(target) {
    vMask(target, '^[A-z0-9._-]+@[A-z0-9.-]+\.[A-z]{2,4}$', 'Не корректный email');
  }
  
  function vPhone(target) {
    vNum(target);
    vMinln(target, 11, 'Слишком короткий номер телефона.');
    vMaxln(target, 11, 'Слишком длинный номер телефона.');
  }
  
  //------------------- submit -------------------
  function vSubmit(submit) {
    frm.validate;
  }
  
  //------------------- виджет ошибки -------------------
  function addMsg(target, msg) {
    target.parentNode.nextElementSibling.innerText = msg;
    target.err = true;
  }
  
  function delMsg(target) {
    target.parentNode.nextElementSibling.innerText = "";
    target.err = false;
  }
}

function scroll(target) {
  var html = document.documentElement;
  var body = document.body;
  targetCoords = getCoords(target);
  body.scrollTop = targetCoords.top + html.clientTop;
  
  target.focus();
  return target;
}