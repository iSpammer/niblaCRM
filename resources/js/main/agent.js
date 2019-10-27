$(function(){
        //Agent

        $('[data-js=open-remove-agent]').on('click', function(e) {
            console.log('Clicked');
            $("#removeModalAgent").modal();

        });


        $('[data-js-type=modal-submit-agent]').on('click', function(e) {
            $.ajax({
                url: "/deleteAgent",
                method: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr('content'),
                    id: $("[data-js=open-remove-agent]").find('span').attr('id')
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

        $('[data-js=open-edit-agent]').on('click', function(e) {

            console.log('Clicked');
            $("#editModalAgent").modal();


        });


        $("#editFormAgent").submit(function(e) {

            $.ajax({
                url: "/editAgent",
                method: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                data: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr('content'),
                    id: $("[data-js=open-remove-agent]").find("span").attr("id"),
                    name: $('[data-js-type=editedText]').val()
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
})
