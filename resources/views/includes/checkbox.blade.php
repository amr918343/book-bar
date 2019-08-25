    <script>
        $(document).ready(function() {
            var allChecked = 1;
            $('#option').click(function () {
                if (this.checked == 1) {
                    $('.checkboxes').each(function () {
                        this.checked = true;
                    });
                } else {

                    $('.checkboxes').each(function () {
                        this.checked = false;
                    });

                }

                if ($(this).is(":checked")) {
                    $("#submitBtn").removeAttr("disabled");
                } else {
                    $("#submitBtn").attr("disabled", "disabled");
                }
            });
            var CB = $(".checkboxes");

            CB.click(function () {
                if ($(this).is(":checked")) {
                    $("#submitBtn").removeAttr("disabled");
                } else {
                    $("#submitBtn").attr("disabled", "disabled");
                }
            });


            // $('.checkboxes').click(function() {
            //
            //     $('.checkboxes').each(function() {
            //         allChecked = this.checked;
            //
            //     });
            //
            //     if (allChecked == 1) {
            //
            //         $('#option').checked = true;
            //         console.log(allChecked);
            //     } else {
            //         $('#option').checked = false;
            //         console.log(allChecked);
            //     }
            //
            //     console.log($('#option').checked)
            // });



        });
    </script>
    @yield('check_all')