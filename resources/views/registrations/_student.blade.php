<div class="control is-horizontal">
    <div class="control-label required">
        <label>Võimleja nimi</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.firstname" v-bind:class="{'is-danger': form.errors.has('student.firstname') }" type="text" name="student[firstname]" placeholder="Võimleja eesnimi*">
            <span class="help is-danger" v-if="form.errors.has('student.firstname')">@{{ form.errors.get('student.firstname') }}</span>
        </p>
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.lastname" v-bind:class="{'is-danger': form.errors.has('student.lastname') }" type="text" name="student[lastname]" placeholder="Võimleja perekonnanimi*">
            <span class="help is-danger" v-if="form.errors.has('student.lastname')">@{{ form.errors.get('student.lastname') }}</span>
        </p>
    </div>
</div>

<div class="control is-horizontal">
    <div class="control-label required">
        <label>Võimleja vanus</label>
    </div>
    <div class="control is-grouped">
        <p class="control is-expanded has-icon has-icon-right">
            <input class="input" v-model="form.student.age" v-bind:class="{'is-danger': form.errors.has('student.age') }" type="number" name="student[age]" placeholder="Võimleja vanus*">
            <span class="help is-danger" v-if="form.errors.has('student.personal_code')">@{{ form.errors.get('student.age') }}</span>
        </p>
    </div>
</div>