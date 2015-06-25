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
        url: "/books/validate",
        data: form.serialize(),
        dataType: 'json',
        success: function(data, textStatus, jqXHR) {
          var errors;
          if (data.success === false) {
            errors = null;
            if (data.errors.title != null) {
              inputTitle.addClass('bg-danger');
              errors = errors + '<ul>' + data.errors.title + '</ul>';
            }
            if (data.errors.author != null) {
              inputTitle.addClass('bg-danger');
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
