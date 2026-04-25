@extends('admin.layout.page-app')
@section('page_title', __('label.dashboard'))
@section('tab_title', __('label.dashboard'))

@section('content')
@include('admin.layout.sidebar')

<div class="right-content">
    @include('admin.layout.header')

    <div class="body-content">
    </div>
</div>

@endsection

@section('pagescript')
<!-- Chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
</script>
@endsection