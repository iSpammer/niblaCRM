$(function(){
        //project

 $('[data-js=open-remove-project]').on('click', function(e) {
    console.log('Clicked');
    $("#removeModalProject").modal();

});

$('[data-js=open-edit-project]').on('click', function(e) {

    console.log('Clicked');
    $("#editModalProject").modal();


});


$('[data-js-type=modal-submit-project]').on('click', function(e) {
    console.log("/deleteproject/"+$("[data-js=open-remove-project]").find("span").attr("id"),);
    console.log($('meta[name="_token"]').attr('content'))
    $.ajax({
        url: "/deleteproject/"+$("[data-js=open-remove-project]").find("span").attr("id"),
        method: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        data: {
            "X-CSRF-TOKEN": $('meta[name="_token"]').attr('content'),
            id: $("[data-js=open-remove-project]").find('span').attr('id')
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

    $("#editFormProject").submit(function(e) {

        $.ajax({
            url: "/editproject/"+$("[data-js=open-remove-project]").find("span").attr("id"),
            method: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            data: {
                "X-CSRF-TOKEN": $('meta[name="_token"]').attr('content'),
                projectName: $('[data-js-type=projectName]').val(),
                projectStartDate: $('[data-js-type=projectStartDate]').val(),
                projectEndDate: $('[data-js-type=projectEndDate]').val(),
                projectStatus: $('[data-js-type=projectStatus]').val(),
                projectDescription: $('[data-js-type=projectDescription]').val(),
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
                console.log('AJAX ERROR: ', error);
            }
        });


        e.preventDefault();
    });

})
