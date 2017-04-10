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
                title: 'Rühm',
                sortField: 'name'
            }, {
                name: 'coachesNames',
                title: 'Treenerid',
            }, {
                name: 'notes',
                title: 'Märkmed',
            }, {
                name: '__component:groups-actions',
                dataClass: 'text-center'
            }],
            sortOrder: [{
                field: 'id',
                direction: 'asc',
            }],
            filters: {},
            showModal: false,
            activeRow: null
        }
    },

    props: ['coaches'],

    mounted() {

    },

    methods: {
      saveGroup() {
        axios.put('/admin/groups/' + this.activeRow.id, {
          name: this.activeRow.name,
          notes: this.activeRow.notes,
          coaches: this.activeRow.coachesIds
        }).then(response => {
          this.$refs.modal.close()
          this.$refs.groupsTable.refresh();
        })
      }
    }
};

Vue.component('groups-actions', {
    template: [
        `
    <div>
      <button class="button is-small" @click="editGroup">
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
      editGroup() {
        this.$parent.$parent.$parent.showModal = true;
        this.$parent.$parent.$parent.activeRow = this.rowData;
      }
    }
});
