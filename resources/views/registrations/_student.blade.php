<hr class="divider"/>
<h2 class="subtitle required">Lapse andmed</h2>
<hr class="divider"/>
<div class="control is-horizontal">
    <div class="control-label">
        <label>Nimi</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.firstname" v-bind:class="{'is-danger': form.errors.has('student.firstname') }" type="text" name="student[firstname]" placeholder="Eesnimi">
            <span class="help is-danger" v-if="form.errors.has('student.firstname')">@{{ form.errors.get('student.firstname') }}</span>
        </p>
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.lastname" v-bind:class="{'is-danger': form.errors.has('student.lastname') }" type="text" name="student[lastname]" placeholder="Perenimi">
            <span class="help is-danger" v-if="form.errors.has('student.lastname')">@{{ form.errors.get('student.lastname') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Isikukood</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.personal_code" v-bind:class="{'is-danger': form.errors.has('student.personal_code') }" type="text" name="student[personal_code]" placeholder="Isikukood">
            <span class="help is-danger" v-if="form.errors.has('student.personal_code')">@{{ form.errors.get('student.personal_code') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Aadress</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.address" v-bind:class="{'is-danger': form.errors.has('student.address') }" type="text" name="student[address]" placeholder="Aadress">
            <span class="help is-danger" v-if="form.errors.has('student.address')">@{{ form.errors.get('student.address') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label">
        <label>Kontaktandmed</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.phone" v-bind:class="{'is-danger': form.errors.has('student.phone') }" type="text" name="student[phone]" placeholder="Telefon (kui on olemas)">
            <span class="help is-danger" v-if="form.errors.has('student.phone')">@{{ form.errors.get('student.phone') }}</span>
        </p>
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.email" v-bind:class="{'is-danger': form.errors.has('student.email') }" type="email" name="student[email]" placeholder="E-post (kui on olemas)">
            <span class="help is-danger" v-if="form.errors.has('student.email')">@{{ form.errors.get('student.email') }}</span>
        </p>
    </div>
</div>
