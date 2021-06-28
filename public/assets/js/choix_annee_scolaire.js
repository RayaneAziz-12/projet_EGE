$('.annee_scolaire').on('click',function(){
    var id = $(this).data('id')
    var url = Routing.generate('select_annee_scolaire');
    console.log(id,url);
    var jqxhr = $.post( url, { id: id })
    .done(function(data) {
        location.reload();
    })
    .fail(function(error) {
        console.log(error);
        alert( "error" );
    });
})