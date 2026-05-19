@extends('admin.layout.page-app')
@section('page_title', __('label.video'))
@section('tab_title', __('label.video'))

@section('content')
    @include('admin.layout.sidebar')

    <div class="right-content">
        @include('admin.layout.header')

        <div class="body-content">
            <!-- mobile title -->
            <h1 class="page-title-sm"> {{__('label.video')}} </h1>

            <div class="border-bottom row mb-3">
                <div class="col-sm-10">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{__('label.dashboard')}}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{__('label.video')}}
                        </li>
                    </ol>
                </div>
                <div class="col-sm-2 d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.video.create') }}"
                        class="btn btn-default mw-120 mt-14">{{__('label.add_video')}}</a>
                </div>
            </div>

            <!-- Search -->
            <div class="page-search mb-3">
                <div class="input-group" title="Search">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i
                                class="fa-solid fa-magnifying-glass fa-xl light-gray"></i></span>
                    </div>
                    <input type="text" id="input_search" class="form-control" placeholder="{{__('label.search_video')}}"
                        aria-label="Search" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="table-responsive table">
                <table class="table table-striped text-center table-bordered" id="datatable">
                    <thead>
                        <tr class="table-bg">
                            <th> {{__('label.#')}} </th>
                            <th> {{__('label.image')}} </th>
                            <th> {{__('label.service')}} </th>
                            <th> {{__('label.video')}} </th>
                            <th>{{__('label.status')}}</th>
                            <th> {{__('label.action')}} </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="videoModal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-0 bg-transparent">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-dark">×</span>
                        </button>
                        <video controls="" width="100%" height="500" poster="" id="theVideo"
                            controlslist="nodownload noplaybackrate" disablepictureinpicture="">
                            <source src="" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>

        $(document).on('click', '.video', function (name) {
            var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-video"),
                videoPoster = $(this).attr("data-image"),
                videoSRCauto = videoSRC + "";

            $(theModal + ' source').attr('src', videoSRCauto);
            $(theModal + ' video').attr('poster', videoPoster);
            $(theModal + ' video').load();
            $(theModal + ' button.close').click(function () {
                $(theModal + ' source').attr('src', videoSRC);
            });
        });

        $("#videoModal .close").click(function () {
            theVideo.pause()
        });

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
                    url: "{{ route('admin.video.index') }}",
                    data: function (d) {
                        d.input_search = $('#input_search').val();
                    },
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false,
                    render: function (data, type, full, meta) {
                        return "<a href='" + data + "' target='_blank' title='Watch'><img src='" + data + "' class='img-thumbnail size-55' ></a>";
                    },
                },
                {
                    data: 'service',
                    name: 'service',
                    render: function (data, type, full, meta) {
                        if (data) {
                            return data.title ?? '-';
                        } else {
                            return "-";
                        }
                    }
                },
                {
                    data: 'video',
                    name: 'video',
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
                    type: 'POST',
                    url: '{{route("admin.video.change.status")}}',
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