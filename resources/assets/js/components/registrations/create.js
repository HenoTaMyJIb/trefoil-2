module.exports = {
    /**
     * Data.
     */
    data() {
        return {
            loading: false,
            form: new Form({
                student: {
                    firstname: '',
                    lastname: '',
                    age: ''
                },
                parent1: {
                    firstname: '',
                    lastname: '',
                    phone: '',
                    email: '',
                },
                comment: '',
                field: '',
                hall: '',
            }),
            fieldFull: false,
        }
    },

    props: ['fields'],

    methods: {
        onSubmit() {
            this.loading = true;
            let self = this;
            this.form.submit('post', '/registrations')
                .then(response => {
                    this.loading = false;
                    window.location.replace('/')
                }).catch(e => {
                    this.loading = false;
                });
        },

        isFieldFull() {
            this.form.errors.clear('field');
            let selectedField = this.fields.find(field => {
                return field.id == this.form.field;
            })
            if (selectedField) {
                this.fieldFull = selectedField.is_full
            } else {
                this.fieldFull = false;
            }
        },

        generateData() {
            this.form = new Form({
                student: {
                    firstname: 'Aljona',
                    lastname: 'Orlova',
                    personal_code: '49107302213',
                    address: 'Raasiku',
                    phone: '',
                    email: '',
                },
                parent1: {
                    firstname: 'Gelena',
                    lastname: 'Orlova',
                    personal_code: '47010092222',
                    address: 'Voka',
                    phone: '123',
                    email: 'gelena@test.com',
                    work_place: 'TTU'
                },
                parent2: {
                    firstname: '',
                    lastname: '',
                    personal_code: '',
                    address: '',
                    phone: '',
                    email: '',
                    work_place: ''
                },
                comment: '',
                field: 1,
                hall: ''
            });
        }
    },

    computed: {
        halls() {
            let selectedField = this.fields.find(field => {
                return field.id == this.form.field;
            })

            if (!selectedField) {
                return [];
            }

            return selectedField.halls;
        }
    }


}
