@extends('layouts.app')
@section('title')
    Klubi rühmad
@endsection
@section('content')
<groups-view inline-template :coaches="{{$coaches}}">
        <div class="container-fluid">
            <datatable url="{{url('admin/groups/fetch')}}" :sort-order="sortOrder" ref="groupsTable" :columns="columns" :filters="filters"></datatable>
            <modal v-if="showModal" @close="showModal = false" @saveGroup="saveGroup" ref="modal">
                <div class="field mb10">
                  <label class="label">Nimetus</label>
                  <p class="control">
                    <input class="input" type="text" placeholder="Nimetus" v-model="activeRow.name">
                  </p>
                </div>

                <div class="fiel mb10">
                  <label class="label">Treenerid</label>
                        <p class="control" v-for="coach in coaches">
                            <label class="checkbox"> <input type="checkbox" :value="coach.id" v-model="activeRow.coachesIds">@{{coach.person.firstname}} @{{coach.person.lastname}}</label>
                        </p>
                </div>

                <div class="field mb10">
                  <label class="label">Märkmed</label>
                  <p class="control">
                    <textarea class="textarea" placeholder="Märkmed" v-model="activeRow.notes"></textarea>
                  </p>
                </div>

                <div class="field is-grouped">
                  <p class="control">
                    <button class="button is-primary" @click="saveGroup">Salvesta</button>
                  </p>
                </div>
            </modal>
        </div>
</groups-view>

@endsection
