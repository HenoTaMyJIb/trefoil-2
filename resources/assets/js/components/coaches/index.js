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
                name: 'person.firstname',
                title: 'Eesnimi',
            }, {
                name: 'person.lastname',
                title: 'Perenimi',
            }, {
                name: 'person.email',
                title: 'E-post',
            }],
            sortOrder: [{
                field: 'id',
                direction: 'asc',
            }],
            filters: {}
        }
    },

    mounted() {

    },

    methods: {

    }
};

// Vue.component('fields-actions', {
//     template: [
//         `
//     <div>
//       <button class="button is-small" @click="notFull" v-if="rowData.is_full">
//         <i class="fa fa-check"></i>
//       </button>
//       <button class="button is-small" @click="isFull"  v-else>
//         <i class="fa fa-ban"></i>
//       </button>
//
//     </div>
//     `
//     ].join(''),
//     props: {
//         rowData: {
//             type: Object,
//             required: true
//         }
//     },
//
//
//     methods: {
//         notFull() {
//             axios.put('/admin/fields/' + this.rowData.id + '/not-full').then(response => {
//                 bus.$emit('datatable:reload');
//             })
//         },
//
//         isFull() {
//             axios.put('/admin/fields/' + this.rowData.id + '/is-full').then(response => {
//                 bus.$emit('datatable:reload');
//             })
//         }
//     }
// });
