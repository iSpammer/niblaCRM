
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

$(function() {

    //Category

    $('[data-js=open-remove-cat]').on('click', function(e) {
        console.log('Clicked');
        $("#removeModalCat").modal();

    });

    $('[data-js=open-edit-cat]').on('click', function(e) {

        console.log('Clicked');
        $("#editModalCat").modal();


    });

    $('[data-js-type=modal-submit-cat]').on('click', function(e) {
        $.ajax({
            url: "/deleteCategory",
            method: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                "_token": $('meta[name="_token"]').attr('content'),
                id: $("[data-js=open-remove-cat]").find('span').attr('id')
            },
            success: function(result) {
                console.log("Success : ", result);
                if (result.Success) {

                    document.location.reload(true);
                } else if (result.Error) {
                    console.log('Error From the Sever ', result.Error);
                }
            },
            error: function(error) {
                console.log("AJAX ERROR: ", error);
            }
        });

    });

    $("#editFormCat").submit(function(e) {

        $.ajax({
            url: "/editCategory",
            method: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                "_token": $('meta[name="_token"]').attr('content'),
                id: $("[data-js=open-remove-cat]").find("span").attr("id"),
                name: $('[data-js-type=editedTextCat]').val()
            },
            success: function(result) {
                console.log("Success : ", result);
                if (result.Success) {

                    document.location.reload(true);
                } else if (result.Error) {
                    console.log('Error From the Sever ', result.Error);
                }
            },
            error: function(error) {
                console.log('AJAX ERROR: ', error);
            }
        });


        e.preventDefault();
    });




});

