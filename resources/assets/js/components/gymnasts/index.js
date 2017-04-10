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
                name: 'student.name',
                title: 'Nimi',
            }, {
                name: 'group.name',
                title: 'Rühm',
            }, {
                name: 'age',
                title: 'Vanus',
            }, {
                name: 'birthdate',
                title: 'Sünnipäev',
            }, {
                name: '__component:gymnasts-actions',
                dataClass: 'text-center'
            }],
            sortOrder: [{
                field: 'created_at',
                direction: 'desc',
            }],
            waitingCount: 0,
            filters: {
                search: '',
                group: 0,
            },
            showEditModal: false,
            group: 0,
            activeRow: null
        }
    },



    methods: {

    }
};

Vue.component('gymnasts-actions', {
    template: [
        `
    <div>
        <button class="button is-default is-small" @click="showGymnast">
          <i class="fa fa-eye"></i>
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
      showGymnast() {
        this.$parent.$parent.$parent.showEditModal = true;
        this.$parent.$parent.$parent.activeRow = this.rowData;
      }
    }
});
