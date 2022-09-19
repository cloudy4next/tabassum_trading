@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        console.log("bal");

        $('#ses_client_id').multiselect();
        $('.loading2').show();
        $.ajax({
            type: "POST",
            url: "{{ route('admin.polar.user') }}",
            data: {
                '_token': "{{ csrf_token() }}",
            },
            success: function(data) {
                console.log(data);
                $('.ses_client_id').empty();
                $.each(data, function(index, value) {
                    $('.ses_client_id').append(
                        `<option value="${value.id}">${value.client_full_name}</option>`
                    )
                });


                $('#ses_client_id').multiselect({
                    includeSelectAllOption: true
                });
                $("#ses_client_id").multiselect('rebuild');


                $('.loading2').hide();

            }
        });
    </script>
@endsection
