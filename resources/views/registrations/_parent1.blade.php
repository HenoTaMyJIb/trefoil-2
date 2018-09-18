<div class="control is-horizontal">
    <div class="control-label required">
        <label>Kontaktisiku nimi</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.firstname" v-bind:class="{'is-danger': form.errors.has('parent1.firstname') }" type="text" name="parent1[firstname]" placeholder="Kontaktisiku eesnimi*">
            <span class="help is-danger" v-if="form.errors.has('parent1.firstname')">@{{ form.errors.get('parent1.firstname') }}</span>
        </p>

        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.lastname" v-bind:class="{'is-danger': form.errors.has('parent1.lastname') }" type="text" name="parent1[lastname]" placeholder="Kontaktisiku perenimi*">
            <span class="help is-danger" v-if="form.errors.has('parent1.lastname')">@{{ form.errors.get('parent1.lastname') }}</span>
        </p>

    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label required">
        <label>Kontaktandmed</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.phone" v-bind:class="{'is-danger': form.errors.has('parent1.phone') }" type="text" name="parent1[phone]" placeholder="Kontaktisiku telefon*">
            <span class="help is-danger" v-if="form.errors.has('parent1.phone')">@{{ form.errors.get('parent1.phone') }}</span>
        </p>
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.parent1.email" v-bind:class="{'is-danger': form.errors.has('parent1.email') }" type="email" name="parent1[email]" placeholder="Kontaktisiku e-post*">
            <span class="help is-danger" v-if="form.errors.has('parent1.email')">@{{ form.errors.get('parent1.email') }}</span>
        </p>
    </div>
</div>
