<template>
<div>
    <vuetable ref="vuetable" :api-url="url" :fields="columns" :sort-order="sortOrder" :append-params="filters" class="table table-bordered table-hover table-responsive is-narrow" pagination-path="pagination" @vuetable:pagination-data="onPaginationData" @vuetable:load-success="onLoadSuccess"
        @vuetable:loading="showLoader" @vuetable:loaded="hideLoader" @vuetable:cell-clicked="onCellClicked" :per-page="perPage" :detail-row-component="detailRowComponent" :css="css">
    </vuetable>
    <component :is="paginationComponent" ref="pagination" @vuetable-pagination:change-page="onChangePage"></component>
    <div class="row">
        <div class="col-md-6">
            <vuetable-pagination-info ref="paginationInfo" :pagination-info-template="paginationInfoTemplate"></vuetable-pagination-info>
        </div>
    </div>

</div>
</template>

<script>
import Vuetable from 'vuetable-2/src/components/Vuetable.vue';
import DatatablePagination from './DatatablePagination.vue'
import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo.vue'

export default {
    props: {
        url: {
            type: String,
            required: true
        },
        columns: {
            type: Array,
            required: true
        },
        filters: {
            type: Object
        },
        detailRowComponent: {
            type: String
        },
        sortOrder: {
            type: Array,
            default () {
                return [{
                    field: 'id',
                    direction: 'asc',
                }];
            }
        }
    },

    /**
     * Data.
     */
    data() {
        return {
            loading: '',
            searchFor: '',
            moreParams: {},
            multiSort: true,
            paginationComponent: 'datatable-pagination',
            perPage: 25,
            paginationInfoTemplate: 'Showing record: {from} to {to} from {total} item(s)',
            css: {
                ascendingIcon: 'fa fa-chevron-up',
                descendingIcon: 'fa fa-chevron-down',
            }
        }
    },

    /**
     * Methods
     */
    methods: {
        reload() {
            this.$nextTick(function() {
                this.$refs.vuetable.reload()
            })
        },

        refresh() {
            this.$nextTick(function() {
                this.$refs.vuetable.refresh()
            })
        },

        transform: function(data) {
            let transformed = {}
            transformed.pagination = {
                total: data.total,
                per_page: data.per_page,
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url,
                from: data.from,
                to: data.to
            }

            transformed.data = data.data

            return transformed
        },
        onPaginationData(tablePagination) {
            this.$refs.paginationInfo.setPaginationData(tablePagination)
            this.$refs.pagination.setPaginationData(tablePagination)
        },
        onChangePage(page) {
            this.$refs.vuetable.changePage(page)
        },
        onCellClicked(data, field, event) {
            console.log('cellClicked', field.name)
            if (field.name !== '__actions') {
                this.$refs.vuetable.toggleDetailRow(data.id)
            }
        },
        onLoadSuccess(response) {
            // set pagination data to pagination-info component
            this.$refs.paginationInfo.setPaginationData(response.data)

            let data = response.data.data
                // if (this.searchFor !== '') {
                //     for (let n in data) {
                //         data[n].name = this.highlight(this.searchFor, data[n].name)
                //         data[n].email = this.highlight(this.searchFor, data[n].email)
                //     }
                // }
        },
        onLoadError(response) {
            if (response.status == 400) {
                sweetAlert('Something\'s Wrong!', response.data.message, 'error')
            } else {
                sweetAlert('Oops', E_SERVER_ERROR, 'error')
            }
        },
        onPaginationData(tablePagination) {
            this.$refs.paginationInfo.setPaginationData(tablePagination)
            this.$refs.pagination.setPaginationData(tablePagination)
        },
        onChangePage(page) {
            this.$refs.vuetable.changePage(page)
        },
        registerEvents() {
            let self = this
            this.$on('vuetable:action', (action, data) => {
                self.onActions(action, data)
            })
            this.$on('vuetable:cell-clicked', (data, field, event) => {
                self.onCellClicked(data, field, event)
            })
            this.$on('vuetable:cell-dblclicked', (data, field, event) => {
                self.onCellDoubleClicked(data, field, event)
            })
            this.$on('vuetable:load-success', (response) => {
                self.onLoadSuccess(response)
            })
            this.$on('vuetable:load-error', (response) => {
                self.onLoadError(response)
            })
        },
        showLoader: function() {
            this.loading = 'loading'
        },
        hideLoader: function() {
            this.loading = ''
        },
        showDetailRow: function(value) {
            let icon = this.$refs.vuetable.isVisibleDetailRow(value) ? 'down' : 'right'
            return [
                '<a class="show-detail-row">',
                '<i class="si si-arrow-' + icon + '"></i>',
                '</a>'
            ].join('')
        },

        fieldFullFormat(value) {
          if(value) {
            return '<span class="tag is-warning">Rühm on täis</span>'
          }

          return '<span class="tag is-success">On vabad kohad</span>'
        },

        status(value) {
          return this.$t('registrations.status_' + value);
        }
    },

    /**
     * Watch
     */
    watch: {
        'perPage' (val, oldVal) {
            this.$nextTick(function() {
                this.$refs.vuetable.refresh()
            })
        },
        'paginationComponent' (val, oldVal) {
            this.$nextTick(function() {
                this.$refs.pagination.setPaginationData(this.$refs.vuetable.tablePagination)
            })
        }
    },

    mounted() {
      let self = this;
      bus.$on('datatable:reload', function() {
          self.reload()
      })

      bus.$on('datatable:refresh', function() {
          self.refresh()
      })
    },

    /**
     * Components.
     */
    components: {
        Vuetable,
        DatatablePagination,
        VuetablePaginationInfo,
    },
}
</script>
