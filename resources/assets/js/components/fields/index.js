module.exports = {

    /**
     * Data.
     */
    data() {
        return {
            columns: [{
                name: 'id',
                title: 'ID',
                sortField: 'id'
            }, {
                name: 'name',
                title: 'Nimetus',
                sortField: 'name'
            }, {
                name: 'is_full',
                title: 'Täis',
                sortField: 'is_full',
                callback: 'fieldFullFormat'
            }, {
                name: '__component:fields-actions',
                dataClass: 'text-center'
            }],
            sortOrder: [{
                field: 'id',
                direction: 'asc',
            }],
            filters: {},
            method: 'add',
            id: null,
            name: '',
            description: '',
            hall: [],
            is_full: '',
            loading: false,
            showModal: false
        }
    },

    mounted() {

    },

    methods: {
        add() {
            this.loading = true;
            axios.post('/admin/fields', {
                name: this.name,
                description: this.description,
                hall: this.hall
            }).then(response => {
                this.loading = false;
                this.showModal = false;
                bus.$emit('datatable:reload');
            }).catch(e => {
                this.loading = false;
            });
        },

        update() {
            this.loading = true;
            axios.put('/admin/fields/' + this.id, {
                name: this.name,
                description: this.description,
                hall: this.hall,
                is_full: this.is_full
            }).then(response => {
                this.loading = false;
                this.showModal = false;
                bus.$emit('datatable:reload');
            }).catch(e => {
                this.loading = false;
            });
        },

        openNew() {
            this.method = 'add';
            this.showModal = true;
            this.name = '';
            this.description = '';
            this.is_full = 0;
            this.hall = [];
        }
    }
};

Vue.component('fields-actions', {
    template: [
        `
    <div>
     <button class="button is-small" @click="edit">
        <i class="fa fa-edit"></i>
      </button>
    </div>
    `
    ].join(''),
    props: {
        rowData: {
            type: Object,
            required: true
        }
    },


    methods: {
        notFull() {
            axios.put('/admin/fields/' + this.rowData.id + '/not-full').then(response => {
                bus.$emit('datatable:reload');
            })
        },

        isFull() {
            axios.put('/admin/fields/' + this.rowData.id + '/is-full').then(response => {
                bus.$emit('datatable:reload');
            })
        },

        edit() {
            this.$parent.$parent.$parent.showModal = true;
            this.$parent.$parent.$parent.method = 'update';
            this.$parent.$parent.$parent.name = this.rowData.name;
            this.$parent.$parent.$parent.description = this.rowData.description;
            this.$parent.$parent.$parent.is_full = this.rowData.is_full;
            this.$parent.$parent.$parent.hall = this.rowData.halls;
            this.$parent.$parent.$parent.id = this.rowData.id;
        }
    }
});
