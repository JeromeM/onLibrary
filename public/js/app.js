(function() {
  jQuery(function() {
    var createForm, editForm, errorMessage, inputFirstname, inputLastname, validateAuthor;
    createForm = $('form[name=authorCreateForm]');
    editForm = $('form[name=authorEditForm]');
    inputFirstname = $('input[name=firstname]');
    inputLastname = $('input[name=lastname]');
    errorMessage = $('#errorMessage');
    validateAuthor = function(form) {
      inputFirstname.removeClass('bg-danger');
      inputLastname.removeClass('bg-danger');
      errorMessage.removeClass('show').addClass('hidden');
      $.ajax({
        type: 'POST',
        url: "/author/validate",
        data: form.serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
          var errors;
          if (data.success === false) {
            errors = '';
            if (data.errors.firstname != null) {
              inputFirstname.addClass('bg-danger');
              errors = errors + '<ul>' + data.errors.firstname + '</ul>';
            }
            if (data.errors.lastname != null) {
              inputLastname.addClass('bg-danger');
              errors = errors + '<ul>' + data.errors.lastname + '</ul>';
            }
            if (errors != null) {
              errorMessage.removeClass('hidden').addClass('show');
              return errorMessage.html(errors);
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
    createForm.on("submit", function(e) {
      return validateAuthor($(this));
    });
    return editForm.on("submit", function(e) {
      return validateAuthor($(this));
    });
  });

}).call(this);

(function() {
  jQuery(function() {
    var createForm, editForm, errorMessage, inputAuthor, inputTitle, validateBook;
    createForm = $('form[name=bookCreateForm]');
    editForm = $('form[name=bookEditForm]');
    inputTitle = $('input[name=title]');
    inputAuthor = $('input[name=author]');
    errorMessage = $('#errorMessage');
    validateBook = function(form) {
      inputTitle.removeClass('bg-danger');
      inputAuthor.removeClass('bg-danger');
      errorMessage.removeClass('show').addClass('hidden');
      $.ajax({
        type: 'POST',
        url: "/book/validate",
        data: form.serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
          var errors;
          if (data.success === false) {
            errors = void 0;
            if (data.errors.title != null) {
              inputTitle.addClass('bg-danger');
              errors = '<ul>' + data.errors.title + '</ul>';
            }
            if (data.errors.author != null) {
              inputAuthor.addClass('bg-danger');
              errors = errors + '<ul>' + data.errors.author + '</ul>';
            }
            if (errors != null) {
              errorMessage.removeClass('hidden').addClass('show');
              return errorMessage.html(errors);
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
    createForm.on("submit", function(e) {
      return validateBook($(this));
    });
    return editForm.on("submit", function(e) {
      return validateBook($(this));
    });
  });

}).call(this);
