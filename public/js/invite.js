$(document).ready(function(){
    $('#fullName').keyup(function(){
        let query = $(this).val().trim();
        
        // Only proceed if the input has at least two characters
        if(query.length < 2) {
            $('#fullNameList').fadeOut();
            return;
        }
        
        let autocompleteUrl = $(this).data('autocomplete-url');
        $.ajax({
            url: autocompleteUrl,
            method: 'GET',
            data: {query:query},
            success:function(data){
                $('#fullNameList').fadeIn();
                $('#fullNameList').html(data);
            }
        });
    });

    $(document).on('click', 'li', function(){
        $('#fullName').val($(this).text());
        $('#fullNameList').fadeOut();
    });
});
