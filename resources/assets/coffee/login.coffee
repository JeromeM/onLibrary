# Coffee Script for AUTHORS
jQuery ->

  # Variables "globales"
  loginForm       = $('form[name=loginForm]')
  inputEmail      = $('input[name=email]')
  inputPassword   = $('input[name=password]')
  emailInputError = $('#emailInputError')
  pwdInputError   = $('#passwordInputError')

  # Fonction de validation
  validateLogin = (form) ->

    # On retire les classes erreur
    inputEmail.removeClass('bg-danger')
    inputPassword.removeClass('bg-danger')
    emailInputError.hide()
    pwdInputError.hide()

    # Requête Ajax
    $.ajax
      type: 'POST'
      url: "/login/validate"
      data: form.serialize()
      dataType: 'json'

    # Succès
      success: (data, textStatus, jqXHR) ->

        # On va verifier les erreurs et mettre les champs en surbrillance s'il y a des erreurs
        if data.success is false

          errors = ''

          # Erreur email
          if data.errors.email?
            inputEmail.addClass('bg-danger')
            emailInputError.show().html(data.errors.email)
            errors = errors + '<ul>' + data.errors.email + '</ul>'

          # Erreur password
          if data.errors.password?
            inputPassword.addClass('bg-danger')
            pwdInputError.show().html(data.errors.password)
            errors = errors + '<ul>' + data.errors.password + '</ul>'

          # Si on a des erreurs
          # @TODO

          # Pas d'erreurs, on valide le formulaire
        else
          form.off "submit"
          form.submit()

    # Erreur Ajax
      error: (jqXHR, textStatus, errorThrown) ->
        console.log 'Ajax error :' + textStatus

    return false


  # Soumission du formulaire
  loginForm.on "submit", (e) ->
    validateLogin($(this))