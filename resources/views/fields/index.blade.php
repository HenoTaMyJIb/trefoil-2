@extends('layouts.app')
@section('title')
Rühmad
@endsection
@section('content')
<fields-view inline-template>
    <div>
        <div class="container-fluid">
            <datatable url="{{url('admin/fields/fetch')}}" :sort-order="sortOrder" ref="fieldsTable" :columns="columns"
                :filters="filters"></datatable>
        </div>
        <button class="button is-primary" @click="openNew">Lisa uus</button>

        <modal v-show="showModal" @close="showModal = false" ref="modal">
            <div>
                <div class="control">
                    <label>Rühma nimetus</label>
                    <input class="input is-hovered" type="text" placeholder="Rühma nimetus" v-model="name">
                </div>

                <div class="control">
                    <label>Kirjeldus</label>
                    <textarea class="textarea" placeholder="Kirjeldus" v-model="description"></textarea>
                </div>

                <div class="control">
                    <label>Täis</label>
                    <div>
                        <label class="radio">
                            <input type="radio" name="is_full" v-model="is_full" value="1">
                            Täis
                        </label>
                        <label class="radio">
                            <input type="radio" name="is_full" v-model="is_full" value="0">
                            Pole täis
                        </label>
                    </div>
                </div>

                <div class="control">
                    <label>Saalid</label>
                    <div>
                        <label class="checkbox">
                            <input type="checkbox" name="hall" v-model="hall" value="reval">
                            {{ trans('registrations.reval') }}
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" name="hall" v-model="hall" value="mustamae">
                            {{ trans('registrations.mustamae') }}
                        </label>
                    </div>
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button v-if="method == 'add'" class="button is-primary" @click="add" :disabled="loading">Lisa</button>
                        <button v-else class="button is-primary" @click="update" :disabled="loading">Salvesta</button>
                    </p>
                </div>
            </div>

        </modal>
    </div>
</fields-view>

@endsection