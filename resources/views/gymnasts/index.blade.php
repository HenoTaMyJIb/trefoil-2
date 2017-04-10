@extends('layouts.app')
@section('title')
    Klubi rühmad
@endsection
@section('content')
<gymnasts-view inline-template>
        <div class="container-fluid">
            <div class="control is-horizontal">
                <div class="control is-grouped">
                    <p class="control has-addons">
                      <input class="input" type="text" placeholder="Otsi" v-model="filters.search" @keyup.enter="$refs.gymnastsTable.reload()">
                      <a class="button is-primary" @click="$refs.gymnastsTable.reload()">
                        Otsi
                      </a>
                    </p>
                    <p class="control">
                      <span class="select">
                        <select v-model="filters.group" @change="$refs.gymnastsTable.reload()">
                          <option value="0">Kõik rühmad</option>
                          @foreach ($groups as $group)
                              <option value="{{$group->id}}">{{$group->name}}</option>
                          @endforeach

                        </select>
                      </span>
                    </p>
                </div>
            </div>

            <datatable url="{{url('admin/gymnasts/fetch')}}" :sort-order="sortOrder" ref="gymnastsTable" :columns="columns" :filters="filters"></datatable>

            @include('gymnasts.show')
        </div>
</gymnasts-view>

@endsection
