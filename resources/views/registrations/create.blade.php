@extends('layouts.public-app')
@section('title')
    Registreerimine PROOVITRENNI
@endsection
@section('subtitle')
Täitmiseks kohustuslikud väljad on märgitud * tärniga
@endsection
@section('content')
<create-registration-view inline-template :fields="{{$fields}}">
<section class="section" v-cloak>
    <div class="container">
        <div class="columns">
            <div class="column is-three-quarters">
                <div class="notification is-warning">
                        See on registreerimine proovitrenni, <strong>MITTE</strong> klubisse. Klubisse registreerimise info me anname Teile pärast proovitrenni.
                        Olge kannatlik, me võtame Teiega ühendust niipea kui võimalik.
                </div>
                <form method="post" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                    <div class="control is-horizontal">
                        <div class="control-label required">
                            <label>Rühm</label>
                        </div>
                        <div class="control is-grouped  has-icon has-icon-right">
                            <div class="select is-fullwidth">
                                <select class="input" v-bind:class="{'is-danger': form.errors.has('field') }" v-model="form.field" @change="isFieldFull" name="field" placeholder="Rühm">
                                    <option v-for="field in fields" :value="field.id" v-text="field.name"></option>
                                </select>
                                <p class="help is-info title is-6" v-if="fieldFull"><i class="fa fa-warning"></i> Rühm on täis. Teie registreerimine on automaatselt staatusega 'Ootel'.</p>
                                <span class="help is-danger" v-if="form.errors.has('field')">@{{ form.errors.get('field') }}</span>
                            </div>
                        </div>

                    </div>

                  

                    @include('registrations._student')
                    @include('registrations._parent1')

                    <hr class="divider"/>
                    <div class="control is-horizontal" style="margin-bottom: 15px">
                      <div class="control-label">
                        <label>Kommentaar</label>
                      </div>
                      <div class="control is-grouped">
                        <textarea class="textarea" name="comment" v-model="form.comment" placeholder="Küsimus/Kommentaar"></textarea>
                      </div>
                    </div>

                  <div class="control is-horizontal">
                    <div class="control-label">
                      <label class="label"></label>
                    </div>
                    <div class="control">
                        <div class="notification is-warning is-fullwidth" v-if="form.errors.any()" style="width:100%">
                            <h5 class="title is-5">Kontrolli andmed</h5>
                        </div>
                    </div>
                  </div>

                    <div class="control is-horizontal" >
                      <div class="control-label">
                        <label class="label"></label>
                      </div>
                      <div class="control">
                        <button class="button is-primary is-fullwidth is-medium" :disabled="loading">Registreeri</button>
                      </div>
                    </div>

                    @if(env('APP_ENV') == 'local')
                    <p class="control">
                        <button type="button" class="button is-default" @click.prevent="generateData">Test data</button>
                    </p>
                @endif

                </form>
            </div>
        </div>

    </div>
</section>
</create-registration-view>

@endsection
