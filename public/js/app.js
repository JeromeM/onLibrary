(function() {
  jQuery(function() {
    return $(".dropdown").hover(function() {
      $('.dropdown-menu', this).stop(true, true).fadeIn('fast');
      $(this).toggleClass('open');
      return $('b', this).toggleClass('caret caret-up');
    }, function() {
      $('.dropdown-menu', this).stop(true, true).fadeOut('fast');
      $(this).toggleClass('open');
      return $('b', this).toggleClass('caret caret-up');
    });
  });

}).call(this);

(function() {
  jQuery(function() {
    var emailInputError, inputEmail, inputPassword, loginForm, pwdInputError, validateLogin;
    loginForm = $('form[name=loginForm]');
    inputEmail = $('input[name=email]');
    inputPassword = $('input[name=password]');
    emailInputError = $('#emailInputError');
    pwdInputError = $('#passwordInputError');
    validateLogin = function(form) {
      inputEmail.removeClass('bg-danger');
      inputPassword.removeClass('bg-danger');
      emailInputError.hide();
      pwdInputError.hide();
      $.ajax({
        type: 'POST',
        url: "/login/validate",
        data: form.serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
          var errors;
          if (data.success === false) {
            errors = '';
            if (data.errors.email != null) {
              inputEmail.addClass('bg-danger');
              emailInputError.show().html(data.errors.email);
              errors = errors + '<ul>' + data.errors.email + '</ul>';
            }
            if (data.errors.password != null) {
              inputPassword.addClass('bg-danger');
              pwdInputError.show().html(data.errors.password);
              return errors = errors + '<ul>' + data.errors.password + '</ul>';
            }
          } else {
            form.off("submit");
            return form.submit();
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          return console.log('Ajax error :' + textStatus);
        }
      });
      return false;
    };
    return loginForm.on("submit", function(e) {
      return validateLogin($(this));
    });
  });

}).call(this);

(function() {
  jQuery(function() {
    var emailInputError, inputEmail, inputPassword, inputPasswordConfirm, pwdConfirmInputError, pwdInputError, registerForm, validateRegister;
    registerForm = $('form[name=registerForm]');
    inputEmail = $('input[name=email]');
    inputPassword = $('input[name=password]');
    inputPasswordConfirm = $('input[name=password_confirm]');
    emailInputError = $('#emailInputError');
    pwdInputError = $('#passwordInputError');
    pwdConfirmInputError = $('#passwordConfirmInputError');
    validateRegister = function(form) {
      inputEmail.removeClass('bg-danger');
      inputPassword.removeClass('bg-danger');
      inputPasswordConfirm.removeClass('bg-danger');
      emailInputError.hide();
      pwdInputError.hide();
      pwdConfirmInputError.hide();
      $.ajax({
        type: 'POST',
        url: "/register/validate",
        data: form.serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
          var errors;
          if (data.success === false) {
            errors = '';
            if (data.errors.email != null) {
              inputEmail.addClass('bg-danger');
              emailInputError.show().html(data.errors.email);
              errors = errors + '<ul>' + data.errors.email + '</ul>';
            }
            if (data.errors.password != null) {
              inputPassword.addClass('bg-danger');
              pwdInputError.show().html(data.errors.password);
              return errors = errors + '<ul>' + data.errors.password + '</ul>';
            }
          } else {
            form.off("submit");
            return form.submit();
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          return console.log('Ajax error :' + textStatus);
        }
      });
      return false;
    };
    return registerForm.on("submit", function(e) {
      return validateRegister($(this));
    });
  });

}).call(this);
