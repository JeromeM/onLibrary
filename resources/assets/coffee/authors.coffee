# Coffee Script for AUTHORS
jQuery ->

  # Variables "globales"
  createForm      = $('form[name=authorCreateForm]')
  editForm        = $('form[name=authorEditForm]')
  inputFirstname  = $('input[name=firstname]')
  inputLastname   = $('input[name=lastname]')
  errorMessage    = $('#errorMessage')

  # Fonction de validation
  validateAuthor = (form) ->

    # On retire les classes erreur et on masque le message d'erreur au cas où
    inputFirstname.removeClass('bg-danger')
    inputLastname.removeClass('bg-danger')
    errorMessage.removeClass('show').addClass('hidden')

    # Requête Ajax
    $.ajax
      type: 'POST'
      url: "/author/validate"
      data: form.serialize()
      dataType: 'json'

    # Succès
      success: (data, textStatus, jqXHR) ->

        # On va verifier les erreurs et mettre les champs en surbrillance s'il y a des erreurs
        if data.success is false

          errors = ''

          # Erreur sur le titre
          if data.errors.firstname?
            inputFirstname.addClass('bg-danger')
            errors = errors + '<ul>' + data.errors.firstname + '</ul>'

          # Erreur sur l'auteur (n'est pas censé arriver..)
          if data.errors.lastname?
            inputLastname.addClass('bg-danger')
            errors = errors + '<ul>' + data.errors.lastname + '</ul>'

          # Si on a des erreurs
          if errors?
            errorMessage.removeClass('hidden').addClass('show')
            errorMessage.html(errors)

          # Pas d'erreurs, on valide le formulaire
        else
          form.off "submit"
          form.submit()

    # Erreur Ajax
      error: (jqXHR, textStatus, errorThrown) ->
        console.log 'Ajax error :' + textStatus

    return false


  # Soumission des formulaires
  createForm.on "submit", (e) ->
    validateAuthor($(this))

  editForm.on "submit", (e) ->
    validateAuthor($(this))