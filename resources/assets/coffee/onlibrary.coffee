# Coffee Script for BOOKS
jQuery ->

  # Variables "globales"
  createForm   = $('form[name=bookCreateForm]')
  editForm     = $('form[name=bookEditForm]')
  inputTitle   = $('input[name=title]')
  inputAuthor  = $('input[name=author]')
  errorMessage = $('#errorMessage')

  # Fonction de validation
  validateBook = (form) ->

    # On retire les classes erreur et on masque le message d'erreur au cas où
    inputTitle.removeClass('bg-danger')
    inputAuthor.removeClass('bg-danger')
    errorMessage.removeClass('show').addClass('hidden')

    # Requête Ajax
    $.ajax
      type: 'POST'
      url: "/books/validate"
      data: form.serialize()
      dataType: 'json'

      # Succès
      success: (data, textStatus, jqXHR) ->

        # On va verifier les erreurs et mettre les champs en surbrillance s'il y a des erreurs
        if data.success is false

          errors = undefined

          # Erreur sur le titre
          if data.errors.title?
            inputTitle.addClass('bg-danger')
            errors = '<ul>' + data.errors.title + '</ul>'

          # Erreur sur l'auteur (n'est pas censé arriver..)
          if data.errors.author?
            inputTitle.addClass('bg-danger')
            errors = errors + '<ul>' + data.errors.author + '</ul>'

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
    validateBook($(this))

  editForm.on "submit", (e) ->
    validateBook($(this))