<hr class="divider"/>
<h2 class="subtitle">Teise vanema andmed</h2>
<hr class="divider"/>
<div class="control is-horizontal">
    <div class="control-label">
        <label>Nimi</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.firstname" v-bind:class="{'is-danger': form.errors.has('parent2.firstname') }" type="text" name="parent2[firstname]" placeholder="Eesnimi">
            <span class="help is-danger" v-if="form.errors.has('parent2.firstname')">@{{ form.errors.get('parent2.firstname') }}</span>
        </p>

        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.lastname" v-bind:class="{'is-danger': form.errors.has('parent2.lastname') }" type="text" name="parent2[lastname]" placeholder="Perenimi">
            <span class="help is-danger" v-if="form.errors.has('parent2.lastname')">@{{ form.errors.get('parent2.lastname') }}</span>
        </p>

    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Isikukood</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.personal_code" v-bind:class="{'is-danger': form.errors.has('parent2.personal_code') }" type="text" name="parent2[personal_code]" placeholder="Isikukood">
            <span class="help is-danger" v-if="form.errors.has('parent2.personal_code')">@{{ form.errors.get('parent2.personal_code') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Aadress</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.address" v-bind:class="{'is-danger': form.errors.has('parent2.address') }" type="text" name="parent2[address]" placeholder="Aadress">
            <span class="help is-danger" v-if="form.errors.has('parent2.address')">@{{ form.errors.get('parent2.address') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Kontaktandmed</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.phone" v-bind:class="{'is-danger': form.errors.has('parent2.phone') }" type="text" name="parent2[phone]" placeholder="Telefon">
            <span class="help is-danger" v-if="form.errors.has('parent2.phone')">@{{ form.errors.get('parent2.phone') }}</span>
        </p>
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.email" v-bind:class="{'is-danger': form.errors.has('parent2.email') }" type="email" name="parent2[email]" placeholder="E-post">
            <span class="help is-danger" v-if="form.errors.has('parent2.email')">@{{ form.errors.get('parent2.email') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Töökoht</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent2.work_place" v-bind:class="{'is-danger': form.errors.has('parent2.work_place') }" type="text" name="parent2[work_place]" placeholder="Töökoht">
            <span class="help is-danger" v-if="form.errors.has('parent2.work_place')">@{{ form.errors.get('parent2.work_place') }}</span>
        </p>
    </div>
</div>
