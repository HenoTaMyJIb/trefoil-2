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
                title: 'Lapse nimi',
            }, {
                name: 'student.personal_code',
                title: 'Lapse isikukood',
            }, {
                name: 'student.age',
                title: 'Lapse vanus',
            }, {
                name: 'field.name',
                title: 'Rühm',
            }, {
                name: 'created_at',
                title: 'Kuupäev',
                sortField: 'created_at',
                callback: 'dateTimeFormat'
            }, {
                name: 'status',
                title: this.$t('registrations.status'),
                sortField: 'status',
                callback: 'status'
            }, {
                name: '__component:registrations-actions',
                dataClass: 'text-center'
            }],
            sortOrder: [{
                field: 'created_at',
                direction: 'desc',
            }],
            waitingCount: 0,
            filters: {
                search: '',
                field: 0,
                status: 0,
                year: 2017
            },
            showInfoModal: false,
            showModal: false,
            group: 0,
            activeRow: null
        }
    },

    props: ['groups'],

    mounted() {
        axios.get('/admin/registrations/waiting-count').then(response => {
            this.waitingCount = response.data;
        })
    },

    methods: {
      acceptConfirm() {
          if(this.group > 0) {
            axios.put('/admin/registrations/' + this.activeRow.id + '/accept', {group: this.group}).then(response => {
                bus.$emit('datatable:reload');
                this.$refs.modal.close()
            })
          }


      },
    }
};

Vue.component('registrations-actions', {
    template: [
        `
    <div>
      <button class="button is-default is-small mr30" @click="showGymnast">
        <i class="fa fa-eye"></i>
      </button>

      <button class="button is-success is-small" @click="accept" v-if="rowData.status == 'new' || rowData.status == 'waiting'">
        <i class="fa fa-check"></i>
      </button>
      <button class="button is-danger is-small" @click="reject" v-if="rowData.status == 'new' || rowData.status == 'waiting'">
        <i class="fa fa-times"></i>
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
          this.$parent.$parent.$parent.showInfoModal = true;
          this.$parent.$parent.$parent.activeRow = this.rowData;
        },

        accept() {
          this.$parent.$parent.$parent.showModal = true;
            this.$parent.$parent.$parent.activeRow = this.rowData;
        },

        reject() {
            let self = this;
            swal({
                title: 'Kas tahad selle avalduse tagasi lükata?',
                type: 'warning',
                showCancelButton: true,
            }).then(function() {
              axios.put('/admin/registrations/' + self.rowData.id + '/reject').then(response => {
                  bus.$emit('datatable:reload');
              });
            });

        },
    }
});
