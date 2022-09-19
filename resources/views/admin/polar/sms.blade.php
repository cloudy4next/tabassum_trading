@extends('admin.layout.master', [
    'breadcrumb' => [
        'Admin' => backpack_url('dashboard'),
    ],
])

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('page-title', 'Send Message to Retail')


@section('content')
    @parent
    <div class="loading2">
        <div class="table-loading"></div>
    </div>
    <div class="iq-card">
        <div class="iq-card-body">

            <div class="form-row">
                <div class="col-md-4 ">
                    <label>Retail's</label>
                    <select class="form-control form-control-sm ses_client_id multiselect"multiple required>
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Messsage</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <label>Offer name:</label>
                    <input class="form-control" id="offerName" required />
                    </select>
                </div>

            </div>

        </div>
        <br><br>

        <div class="card-footer text-right py-3 ">
            <button type="button" class="btn btn-sm btn-primary go_btn">Send</button>

        </div>
    </div>
    </div>
@endsection

@push('after_scripts')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
        $('.loading2').show();
        $.ajax({
            type: "POST",
            url: "{{ route('admin.polar.user') }}",
            data: {
                '_token': "{{ csrf_token() }}",
            },
            success: function(data) {
                // console.log(data);
                $('.ses_client_id').empty();
                $.each(data, function(index, value) {
                    $('.ses_client_id').append(
                        `<option value="${value.name}" style="font-weight: bold;" >${value.name}</option>`
                    )
                });
            }
        });

        $(document).on('click', '.go_btn', function() {

            var names = $('.ses_client_id').val();
            var message = $('#message').val();
            var offer = $('#offerName').val();

            if (names == null || names == "") {
                alert("Please select Retail!!", 'ALERT!');
            }

            if (offer == null || offer == "") {
                alert("Please Write about the offer!!", 'ALERT!');
            }

            if (message == null || message == "") {
                alert("Please Write Message!!", 'ALERT!');
            }
            // console.log(names);
            $.ajax({
                type: "POST",
                url: "{{ route('admin.polar.sms.sent') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'names': names,
                    'message': message,
                    'offer': offer,
                },
                success: function(data) {
                    // console.log(data);
                }
            });
        });
    </script>
@endpush
