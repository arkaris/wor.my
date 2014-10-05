function ajaxRequest() {
  var script = {};
  
  script.ajax = {
    errorMessage: tr('error:ajax-request'),
    
    ajaxSettings: {
      //loaderEl: getLoader(),//ссылка на заглушку
      
      beforeSend: function() {
        //loaderEl.show();//показать заглушку
      },
      
      complete: function() {
        //loader.hide();//скрыть заглушку
      }
    },
    
    init: function() {
      //прицепить loaderEle beforeSend и complete хз пока как и куда(отправка запроса)
    },
    
    callbacks: {
      login: function(form, data) {
        if (data.status === 'ok') {
          if (data.data && data.data.redirect) {
            window.location.href = data.data.redirect;
          }
        }
      },
      
      logout: function(form, data) {
        if (data.status === 'ok') {
          if (data.data && data.data.redirect) {
            window.location.href = data.data.redirect;
          }
        }
      },
      
      register: function(form, data) {
        if (data.status === 'ok') {
          if (data.data && data.data.redirect) {
            window.location.href = data.data.redirect;
          }
        }
      }
    }
  };
  
  script.ajaxForm = {
    forms: null,
    
    init: function() {
      this.forms = document.getElementsByTagName('FORM');//получаю формы
      for (var i = 0; i < this.forms.length; i++)
        this.initHandler(this.forms[i]);//развешиваю обработчики
    },
    
    initHandler: function(form) {
      form.onsubmit = function() {
        if (isValid(form)) script.ajaxForm.go(form);
      };
      return false;
    },
    
    callback: function(form, data) {
      var action = getUrlParam(form, form.getAttribute('action'));
      
      if (action !== ';' && action.length) {
        var callbackFunction = script.ajax.callbacks[action];
        if (typeof callbackFunction === 'function') {
          callbackFunction.call(this, $form, data);
        }
      }
    },
    
    go: function(form) {
      var ajaxSettings = {
        type: form.getAttribute('method') || 'GET',
        url: form.getAttribute('action') || '.',
        data: ''
      };
      
      var inputArr = form.getElementsByTagName('INPUT');
      for (var i = 0; i < inputArr.length; i++) {
        if (inputArr[i].value) {
          ajaxSettings.data += ('&' + inputArr[i].name + '=' + inputArr[i].value);
        }
      }
      
      //заблокировать поля формы
      
      ajaxSettings.complite = function() {
        //разблокировать форму, скрыть заглушку
      };
      
      ajaxSettings.success = function(response) {
        var data;
        if (typeof response === 'object') {
          data = response;
        } else {
          try {
            data = JSON.parse(response);
          } catch (e) {
            window.alert(tr('error:form-submit'));
            return;
          }
        }
        script.ajaxform.validateByAjax(form, data);
      };
      
      //отправка ajax запроса от ajaxSettings
      var http = createRequestObject();
      if (http) {
        alert(ajaxSettings.url+ajaxSettings.data);
        http.open(ajaxSettings.type, ajaxSettings.url+ajaxSettings.data);
        
        http.onreadystatechange = function() {
          if (http.readyState == 4) {
            alert('ответ сервера: \n' + http.responseText);
          }
        };
        http.send(null);
      } else {
        alert('Обновите Ваш браузер или попробуйте еще раз в другом.');//не получил объект XMLhttpRequest
      }
    },
    
    validateByAjax: function(form, data) {
      if (data.status === 'ok') {
        if (data.message !== undefined && data.message !== null) {
          window.alert(data.message);
        }
        if (data.redirect === true) {
          if (data.url !== undefined && data.url !== null) {
            window.location.href = data.url;
          } else {
            window.location.reload();
          }
        }
      } else if (data.status === 'err') {
        var mainErrorContainer = $form.find('.main-error');//место для ошибки main
        if (data.code === 'main') {
          if ($mainErrorContainer !== null) {
            mainErrorContainer.innerHTML = '<p class="error">' + data.message + '</p>';
          } else {
            form.appendChild('<p class="error">' + data.message + '</p>');//хрень
          }
        } else {
          var errField = $form.find('[name|="' + data.code + '"]');//поле ошибки
          mainErrorContainer.innerHTML = data.message;
          errField.focus();
        }
      }
    }
  };
  
  function getURLParam(name, url) {
    url = url || window.location.href;
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)",
      regex = new RegExp(regexS),
      results = regex.exec(url);

    if (results === undefined || results === null) {
      return ';';
    } else {
      return decodeURIComponent(results[1].replace(/\+/g, " "));
    }
  }
  
  function tr(params, lang) {
    var messages = {}, translated = '', code;

    messages.ru_RU = {
      'error': {
        'form-submit': 'Произошла ошибка при отправке формы',
        'ajax-request': 'Произошла ошибка при отправке запроса'
      },

      'notice': {
        'confirm': 'Подтвердите действие'
      }
    };
    lang = lang || 'ru_RU';
    params = params.toLowerCase().split(':');
    if (messages[lang] !== undefined && params.length) {
      for (var i = 0, msgcat = messages[lang]; i < params.length; i++) {
        code = params[i];
        if (typeof msgcat[code] === 'object') {
          msgcat = msgcat[code];
        }
        if (typeof msgcat[code] === 'string') {
          translated = msgcat[code];
          break;
        }
      }
    }
    return translated;
  }
  
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
  
  script.init = function() {
    this.ajaxForm.init('form.ajax');
    this.ajax.init();
  };
  
  window.onload = script.init();
}
ajaxRequest();
