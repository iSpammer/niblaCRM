$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Contract

 $('[data-js=open-remove-contract]').on('click', function(e) {
    console.log('Caaalicked');
    console.log($('meta[name="_token"]').attr('content')+"hiiii");

    $("#removeModalContract").modal();

});

$('[data-js=open-edit-contract]').on('click', function(e) {
    alert("ydeenomy")
    console.log('Clicked');
    $("#editModalContract").modal();
});


$('[data-js-type=modal-submit-contract]').on('click', function(e) {
    console.log("meaaw")
    $.ajax({
        url: "/deletecontract/"+$("[data-js=open-remove-contract]").find("span").attr("id"),
        method: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        data: {
            "_token": $('meta[name="_token"]').attr('content'),
            id: $("[data-js=open-remove-contract]").find('span').attr('id')
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
            console.log("AJAX ERROR OCCURED: ", error);
        }
    });

});


    $("#editModalContract").submit(function(e) {
        alert("hi");
        $.ajax({
            url: "/editcontract/"+$("[data-js=open-remove-contract]").find("span").attr("id"),
            method: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: {
                "_token": $('meta[name="_token"]').attr('content'),
                contractName: $('[data-js-type=contractName]').val(),
                contractStartDate: $('[data-js-type=contractStartDate]').val(),
                contractEndDate: $('[data-js-type=contractEndDate]').val(),
                contractStatus: $('[data-js-type=contractStatus]').val(),
                contractDescription: $('[data-js-type=contractDescription]').val(),
            },
            success: function(result) {
                alert("Done");
                console.log("Success : ", result);
                if (result.Success) {

                    document.location.reload(true);
                } else if (result.Error) {
                    console.log('Error From the Sever ', result.Error);
                }
            },
            error: function(error) {
                alert("ayyy");
                console.log('AJAX ERROR: ', error);
            }
        });


        e.preventDefault();
    });


})
