<template>
<nav class="pagination" v-if="tablePagination && tablePagination.last_page > 1">
  <ul class="pagination-list">
    <li>
      <a class="pagination-next" @click="loadPage(1)"><i class="fa fa-angle-double-left"></i></a>
    </li>
    <li>
      <a class="pagination-next" @click="loadPage('prev')"><i class="fa fa-angle-left"></i></a>
    </li>
    <template v-if="notEnoughPages">
      <template v-for="n in totalPage">
          <li>
            <a class="pagination-link" @click="loadPage(n)" :class="[isCurrentPage(n) ? 'is-current' : '']"
              v-html="n">
            </a>
          </li>
      </template>
    </template>
    <template v-else>
      <template v-for="n in windowSize">
        <li>
          <a class="pagination-link" @click="loadPage(windowStart+n-1)" :class="[isCurrentPage(n) ? 'is-current' : '']"
            v-html="windowStart+n-1">
          </a>
        </li>
      </template>
    </template>
    <li>
      <a class="pagination-next" @click="loadPage('next')"><i class="fa fa-angle-right"></i></a>
    </li>
    <li>
      <a class="pagination-next" @click="loadPage(totalPage)"><i class="fa fa-angle-double-right"></i></a>
    </li>
  </ul>

  <!-- <ul v-if="tablePagination && tablePagination.last_page > 1" class="pagination mn">

    <li class="paginate_button previous" :class="[isOnFirstPage ? 'disabled' : '']">
      <a @click="loadPage(1)">
          <i class="fa fa-angle-double-left"></i>
      </a>
    </li>
    <li class="paginate_button previous" :class="[isOnFirstPage ? 'disabled' : '']">
      <a @click="loadPage('prev')">
          <i class="fa fa-angle-left"></i>
      </a>
    </li>

    <template v-if="notEnoughPages">
      <template v-for="n in totalPage">
          <li class="paginate_button" :class="[isCurrentPage(n) ? 'active' : '']">
            <a @click="loadPage(n)"
              v-html="n">
            </a>
          </li>
      </template>
    </template>
    <template v-else>
      <template v-for="n in windowSize">
        <li class="paginate_button" :class="[isCurrentPage(windowStart+n-1) ? 'active' : '']">
          <a @click="loadPage(windowStart+n-1)"
            v-html="windowStart+n-1">
          </a>
        </li>
      </template>
    </template>
    <li class="paginate_button previous" :class="[isOnLastPage ? 'disabled' : '']">
      <a @click="loadPage('next')">
          <i class="fa fa-angle-right"></i>
      </a>
    </li>
    <li class="paginate_button previous" :class="[isOnLastPage ? 'disabled' : '']">
      <a @click="loadPage(totalPage)">
          <i class="fa fa-angle-double-right"></i>
      </a>
    </li>
  </ul> -->
</nav>
</template>

<script>
import PaginationMixin from 'vuetable-2/src/components/VuetablePaginationMixin.vue'
export default {
  mixins: [PaginationMixin],
}
</script>
