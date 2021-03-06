@extends('layouts.app')
@section('title')
    Registreerimised
@endsection
@section('content')
<registrations-view inline-template :groups="{{ $groups}}">
        <div class="container-fluid">
            <div class="control is-horizontal">
                <div class="control is-grouped">
                    <p class="control has-addons">
                      <input class="input" type="text" placeholder="Otsi" v-model="filters.search" @keyup.enter="$refs.registrationsTable.reload()">
                      <a class="button is-primary" @click="$refs.registrationsTable.reload()">
                        Otsi
                      </a>
                    </p>
                    <p class="control">
                      <span class="select">
                        <select v-model="filters.field" @change="$refs.registrationsTable.reload()">
                          <option value="0">Kõik rühmad</option>
                          @foreach ($fields as $field)
                              <option value="{{$field->id}}">{{$field->name}}</option>
                          @endforeach

                        </select>
                      </span>
                    </p>
                    <p class="control">
                      <span class="select">
                        <select v-model="filters.status" @change="$refs.registrationsTable.reload()">
                          <option value="new">Uued registreerimised</option>
                          <option value="old">Vanad registreerimised</option>
                          <option value="all">Kõik registreerimised</option>
                        </select>
                      </span>
                    </p>
                </div>
            </div>

            <datatable url="{{url('admin/registrations/fetch')}}" :sort-order="sortOrder" ref="registrationsTable" :columns="columns" :filters="filters"></datatable>
            @include('registrations.show')

            <modal v-if="showModal" @close="showModal = false" ref="modal">
                <span slot="title">Registreerimise kinnitamine</span>
                <table class="table is-bordered is-striped is-narrow">
                    <tr>
                        <td><b>Taotluse rühm:</b></td>
                        <td v-text="activeRow.field.name"></td>
                    </tr>
                    <tr>
                        <td><b>Võimleja nimi:</b></td>
                        <td v-text="activeRow.student.name"></td>
                    </tr>
                </table>

                  <div class="field is-grouped">
                    <p class="control">
                      <button class="button is-primary" @click="acceptConfirm" :disabled="confirmDisabled">Kinnita</button>
                    </p>
                  </div>

            </modal>

        </div>
</registrations-view>

@endsection
