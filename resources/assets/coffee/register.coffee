# Coffee Script for AUTHORS
jQuery ->

  # Variables "globales"
  registerForm          = $('form[name=registerForm]')
  inputEmail            = $('input[name=email]')
  inputPassword         = $('input[name=password]')
  inputPasswordConfirm  = $('input[name=password_confirm]')

  emailInputError       = $('#emailInputError')
  pwdInputError         = $('#passwordInputError')
  pwdConfirmInputError  = $('#passwordConfirmInputError');

  # Fonction de validation
  validateRegister = (form) ->

    # On retire les classes erreur
    inputEmail.removeClass('bg-danger')
    inputPassword.removeClass('bg-danger')
    inputPasswordConfirm.removeClass('bg-danger')

    emailInputError.hide()
    pwdInputError.hide()
    pwdConfirmInputError.hide()

    # Requête Ajax
    $.ajax
      type: 'POST'
      url: "/register/validate"
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
  registerForm.on "submit", (e) ->
    validateRegister($(this))