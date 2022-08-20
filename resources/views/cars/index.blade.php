<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{__('messages.title')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('messages.header')}}</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('car.create') }}">{{__('messages.create')}} </a>
            </div>
        </div>
    </div>
    @if ($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
        <table class="table table-bordered" id="datatable-crud">
            <thead>
            <tr>
                <th>Id</th>
                <th>{{__('messages.car_brand')}}</th>
                <th>{{__('messages.car_model')}}</th>
                <th>{{__('messages.number')}}</th>
                <th>{{__('messages.color')}}</th>
                <th>{{__('messages.is_paid')}}</th>
                <th>{{__('messages.comment')}}</th>
                <th>{{__('messages.created_at')}}</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'car_brand', name: 'car_brand', searchable: true},
                {data: 'car_model', name: 'car_model'},
                {data: 'number', name: 'number'},
                {data: 'color', name: 'color'},
                {data: 'is_paid', name: 'is_paid'},
                {data: 'comment', name: 'comment'},
                {data: 'created_at', name: 'created_at', orderable: true},
                {data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });
        $('body').on('click', '.delete', function () {
            if (confirm("Удалить ?") == true) {
                var id = $(this).data('id');
// ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-car') }}",
                    data: {id: id},
                    dataType: 'json',
                    success: function (res) {
                        var oTable = $('#datatable-crud').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        });
    });
</script>
</html>
