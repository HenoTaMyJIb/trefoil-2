module.exports = {
    /**
     * Data.
     */
    data() {
        return {
            form: new Form({
                student: {
                    firstname: '',
                    lastname: '',
                    personal_code: '',
                    address: '',
                    phone: '',
                    email: '',
                },
                parent1: {
                    firstname: '',
                    lastname: '',
                    personal_code: '',
                    address: '',
                    phone: '',
                    email: '',
                    work_place: ''
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
                field: '',
            }),
            fieldFull: false,
        }
    },

    props: ['fields'],

    methods: {
        onSubmit() {
            this.form.submit('post', '/registrations')
                .then(response => {
                    window.scrollTo(0, 0);
                    swal({
                        title: 'Registreerimine õnnestus',
                        text: response.message,
                        type: 'success',
                        // timer: 2000
                    })
                });
        },

        isFieldFull() {
            this.form.errors.clear('field');
            let selectedField = this.fields.find(field => {
                return field.id == this.form.field;
            })
            this.fieldFull = selectedField.is_full
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
            });
        }
    }


}
