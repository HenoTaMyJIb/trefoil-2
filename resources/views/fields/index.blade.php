@extends('layouts.app')
@section('title')
    Rühmad
@endsection
@section('content')
<fields-view inline-template>
        <div class="container-fluid">
            <datatable url="{{url('admin/fields/fetch')}}" :sort-order="sortOrder" ref="fieldsTable" :columns="columns" :filters="filters"></datatable>
        </div>
</fields-view>

@endsection
