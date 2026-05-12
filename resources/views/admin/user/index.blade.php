@extends('admin.layout.page-app')
@section('page_title', __('label.quotes'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm"> {{__('label.user')}} </h1>

            <div class="border-bottom row mb-3">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{__('label.quotes')}}
                        </li>
                    </ol>
                </div>
            </div>

            <!-- Search -->
            <div class="page-search mb-3">
                <div class="input-group" title="Search">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="fa-solid fa-magnifying-glass fa-xl light-gray"></i></span>
                    </div>
                    <input type="text" id="input_search" class="form-control" placeholder="{{__('label.search_user')}}"
                        aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="table-responsive table">
                <table class="table table-striped text-center table-bordered" id="datatable">
                    <thead>
                        <tr class="table-bg">
                            <th> {{__('label.#')}} </th>
                            <th> {{__('label.name')}} </th>
                            <th> {{__('label.email')}} </th>
                            <th> {{__('label.phone')}} </th>
                            <th> {{__('label.suburb')}} </th>
                            <th> {{__('label.date')}} </th>
                            <th> {{__('label.time')}} </th>
                            <th> {{__('label.service')}} </th>
                            <th> {{__('label.msg')}} </th>
                            <th>{{__('label.status')}}</th>
                            <th> {{__('label.action')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>

        $(document).ready(function () {

            var table = $('#datatable').DataTable({
                dom: "<'top'f>rt<'row'<'col-2'i><'col-1'l><'col-9'p>>",
                searching: false,
                responsive: true,
                autoWidth: false,
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 100, 1000, -1],
                    [10, 100, 1000, "All"]
                ],
                language: {
                    paginate: {
                        previous: "<i class='fa-solid fa-chevron-left'></i>",
                        next: "<i class='fa-solid fa-chevron-right'></i>"
                    }
                },
                ajax: {
                    url: "{{ route('admin.user.index') }}",
                    data: function (d) {
                        d.input_search = $('#input_search').val();
                    },
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'phone',
                    name: 'phone',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'suburb',
                    name: 'suburb',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'date',
                    name: 'date',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'time',
                    name: 'time',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'service',
                    name: 'service',
                    render: function (data, type, full, meta) {
                        return data ? data.title : '-';

                    }
                },
                {
                    data: 'msg',
                    name: 'msg',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return data ? data : '-';
                    },
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                ],
            });
            $('#input_search').keyup(function () {

                table.draw();
            });

        });

        function change_status(id, Status) {
            var CheckAdmin = '<?php echo Demo_Mode(); ?>';
            if (CheckAdmin == 1) {

                $('#dvloader').show();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: '{{route("admin.user.show",':id')}}'.replace(':id',id),
                    data: {
                        id: id,
                    },
                    success: function (resp) {
                        $("#dvloader").hide();

                        if (resp.status == 200) {
                            toastr.success(resp.success);
                        } else {
                            toastr.error(resp.errors);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $('#dvloader').hide();
                        toastr.error(errorThrown, textStatus)
                    }
                });
            } else {
                toastr.error('{{__("label.you_have_no_right_to_add_edit_and_delete")}}');
            }
        }

        $(document).on('change', '.status-checkbox', function () {
            id = $(this).attr('data-id');
            change_status(id);
        })
    </script>
@endsection