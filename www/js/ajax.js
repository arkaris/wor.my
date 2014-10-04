//кроссбраузерное получение объекта XMLhttpRequest
function createRequestObject()   
{  
    try { return new XMLHttpRequest(); }  
    catch(e)   
    {  
        try { return new ActiveXObject('Msxml2.XMLHTTP'); }  
        catch(e)   
        {  
            try { return new ActiveXObject('Microsoft.XMLHTTP'); }  
            catch(e) { return null; }  
        }  
    }  
}

//отправляет данные формы
function ajaxRequest(form) {
  if (!isValid(form)) return false;
  
  var link = form.action;
  
  var inputArr = form.getElementsByTagName('INPUT');
  for (var i = 0; i < inputArr.length; i++) {
    if (inputArr[i].value) {
      link += ('&' + inputArr[i].name + '=' + inputArr[i].value);
    }
  }
  alert('запрос к серверу: \n' + link);
  
  var http = createRequestObject();
  if (http) {
    http.open('get', link);
    
    http.onreadystatechange = function() {
      if (http.readyState == 4) {
        alert('ответ сервера: \n' + http.responseText);
      }
    };
    http.send(null);
  } else {
    alert('Обновите Ваш браузер или попробуйте еще раз в другом.');//не получил объект XMLhttpRequest
  }
  
 return false;
}

//вешаю обработчики на формы
function setRequestHandler() {
  var submitArray = [];
  
  var buttonArray = document.getElementsByTagName('button');
  for (var i = 0; i < buttonArray.length; i++) {
    if (buttonArray[i].type = 'submit') submitArray.push(buttonArray[i]);
  }
  
  for (var i = 0; i < submitArray.length; i++) {
    submitArray[i].onclick = function() {
      var submit = this;
      var elem = submit.parentNode;
      do {
        if (elem.tagName == 'FORM') {
          ajaxRequest(elem);
          return false;
        }
        elem = elem.parentNode;
      } while (elem.tagName != 'BODY');
      return false;
    };
  }
}
setRequestHandler();
