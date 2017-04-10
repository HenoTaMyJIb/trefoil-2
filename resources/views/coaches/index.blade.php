@extends('layouts.app')
@section('title')
    Treenerid
@endsection
@section('content')
<coaches-view inline-template>
        <div class="container-fluid">
            <datatable url="{{url('admin/coaches/fetch')}}" :sort-order="sortOrder" ref="coachesTable" :columns="columns" :filters="filters"></datatable>
        </div>
</coaches-view>

@endsection
