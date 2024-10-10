$('#addTaskForm').on('submit', function(e){
    e.preventDefault()

    document.getElementById('addTaskSaveButton').disabled = true
    $('#addTaskError').addClass('d-none')
    $('#addTaskSuccess').addClass('d-none')

    let form = $(this)

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        dataType: 'JSON',
        data: form.serialize()
    }).done(function(data){
        document.getElementById('addTaskSaveButton').disabled = false
        $('#addTaskSuccess').removeClass('d-none')
        $('#title').val('')
        $('#description').val('')
        $('#tasksTableList').append(data.view)

        setTimeout(function () {
            $('#addTaskSuccess').addClass('d-none')
        }, 3000);

    }).fail(function(data){
        document.getElementById('addTaskSaveButton').disabled = false
        $('#addTaskError').removeClass('d-none')
        $('#addTaskError').html(data.responseJSON)
    })
});

$(document).on('click', '.editTaskButton', function(){

    let obj = $(this)

    $.ajax({
        url: obj.attr('url'),
        type: 'GET',
        dataType: 'JSON',
    }).done(function(data){

        $('#editTaskForm').attr('action', obj.attr('action'))
        $('#titleEdit').val(data.title)
        $('#descriptionEdit').val(data.description)
        $('#editTaskModal').modal('show')

    }).fail(function(data){
        console.log(data)
    })
});

$('#editTaskForm').on('submit', function(e){
    e.preventDefault()

    document.getElementById('editTaskSaveButton').disabled = true
    $('#editTaskError').addClass('d-none')
    $('#editTaskSuccess').addClass('d-none')

    let form = $(this)

    $.ajax({
        url: form.attr('action'),
        type: 'PATCH',
        dataType: 'JSON',
        data: form.serialize()
    }).done(function(data){

        document.getElementById('editTaskSaveButton').disabled = false
        $('#editTaskSuccess').removeClass('d-none')

        $('#item-' + data.id).html(data.view)

        setTimeout(function () {
            $('#editTaskSuccess').addClass('d-none')
        }, 3000);

    }).fail(function(data){
        document.getElementById('editTaskSaveButton').disabled = false
        $('#editTaskError').removeClass('d-none')
        $('#editTaskError').html(data.responseJSON)
    })
});

$(document).on('click', '.updateStatus', function(e){
    e.preventDefault()

    $.ajax({
        url: $(this).attr('action'),
        type: 'PATCH',
        dataType: 'JSON',
        data: {status: $(this).attr('value'), _token : document.querySelector('[name="_token"]').value}
    }).done(function(data){
        $('#item-' + data.id).html(data.view)
    }).fail(function(data){
        console.log(data)
    })
})

$(document).on('click', '.deleteTask', function(e){
    e.preventDefault()

    $('#deleteTaskForm').attr('action', $(this).attr('action'))
    $('#deleteTaskModal').modal('show')
})

$('#deleteTaskForm').on('submit', function(e){
    e.preventDefault()

    document.getElementById('deleteTaskSaveButton').disabled = true
    $('#deleteTaskSuccess').addClass('d-none')
    $('#deleteTaskError').addClass('d-none')

    $.ajax({
        url: $(this).attr('action'),
        type: 'DELETE',
        dataType: 'JSON',
        data: {_token : document.querySelector('[name="_token"]').value}
    }).done(function(data){
        $('#deleteTaskSuccess').removeClass('d-none')
        $('#item-' + data.id).remove()

        setTimeout(function () {
            $('#deleteTaskModal').modal('hide')
            document.getElementById('deleteTaskSaveButton').disabled = false
        }, 3000);

    }).fail(function(data){
        document.getElementById('deleteTaskSaveButton').disabled = false
        $('#deleteTaskError').removeClass('d-none')
        $('#deleteTaskError').html(data.responseJSON)
    })
})
