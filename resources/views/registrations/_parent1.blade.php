<hr class="divider"/>
<h2 class="subtitle required">Esimese vanema andmed</h2>
<hr class="divider"/>
<div class="control is-horizontal">
    <div class="control-label">
        <label>Nimi</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.firstname" v-bind:class="{'is-danger': form.errors.has('parent1.firstname') }" type="text" name="parent1[firstname]" placeholder="Eesnimi">
            <span class="help is-danger" v-if="form.errors.has('parent1.firstname')">@{{ form.errors.get('parent1.firstname') }}</span>
        </p>

        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.lastname" v-bind:class="{'is-danger': form.errors.has('parent1.lastname') }" type="text" name="parent1[lastname]" placeholder="Perenimi">
            <span class="help is-danger" v-if="form.errors.has('parent1.lastname')">@{{ form.errors.get('parent1.lastname') }}</span>
        </p>

    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Isikukood</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.personal_code" v-bind:class="{'is-danger': form.errors.has('parent1.personal_code') }" type="text" name="parent1[personal_code]" placeholder="Isikukood">
            <span class="help is-danger" v-if="form.errors.has('parent1.personal_code')">@{{ form.errors.get('parent1.personal_code') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Aadress</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.address" v-bind:class="{'is-danger': form.errors.has('parent1.address') }" type="text" name="parent1[address]" placeholder="Aadress">
            <span class="help is-danger" v-if="form.errors.has('parent1.address')">@{{ form.errors.get('parent1.address') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Kontaktandmed</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.phone" v-bind:class="{'is-danger': form.errors.has('parent1.phone') }" type="text" name="parent1[phone]" placeholder="Telefon">
            <span class="help is-danger" v-if="form.errors.has('parent1.phone')">@{{ form.errors.get('parent1.phone') }}</span>
        </p>
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.email" v-bind:class="{'is-danger': form.errors.has('parent1.email') }" type="email" name="parent1[email]" placeholder="E-post">
            <span class="help is-danger" v-if="form.errors.has('parent1.email')">@{{ form.errors.get('parent1.email') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Töökoht</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.work_place" v-bind:class="{'is-danger': form.errors.has('parent1.work_place') }" type="text" name="parent1[work_place]" placeholder="Töökoht">
            <span class="help is-danger" v-if="form.errors.has('parent1.work_place')">@{{ form.errors.get('parent1.work_place') }}</span>
        </p>
    </div>
</div>
