 $(function() {
     $('#modalButton').click(function () {
         $('#modal').modal('show')
             .find('#modalContent')
             .load($(this).attr('value'));
     });
 });


 /*

$(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
        document.getElementById('modalHeader').innerHTML = '<h4> '+ $(this).attr('title') + '</h4>';

    });


    $('.custom_button').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));

        //dynamiclly set the header for the modal
        document.getElementById('modalHeader').innerHTML = '<h4> ' + $(this).attr('title') + '</h4>';


    });


});
     */