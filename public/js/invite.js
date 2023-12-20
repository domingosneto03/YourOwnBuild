$(document).ready(function(){
    $('#fullName').keyup(function(){
        let query = $(this).val();
        if(query !== ''){
            $.ajax({
                url: "{{ route('autocomplete.users') }}",
                method: 'GET',
                data: {query:query},
                success:function(data){
                    $('#fullNameList').fadeIn();
                    $('#fullNameList').html(data);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){
        $('#fullName').val($(this).text());
        $('#fullNameList').fadeOut();
    });
});