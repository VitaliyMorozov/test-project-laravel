<template>
  <div class="form-group">
    <div class="panel panel-default">
      <div class="panel-heading">Spare Parts</div>
      <div class="panel-body">
        <div class="container vue">
          <div class="bar">
            <input type="text" v-model="searchString" placeholder="Vendor code" />
          </div>
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Description</th>
              <th>Category</th>
              <th>Vendor Code</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item, index in filteredSpareparts" v-on:click="displayDetails(item)">
              <td>{{ item.description }}</td>
              <td>
                <router-link :to="{name: 'categorySparePartsIndex', params: {id: item.generationID }}">
                  {{ item.category }}
                </router-link>
              </td>
              <td>{{ item.vendorCode }}</td>
            </tr>
            </tbody>
          </table>
          <div v-if="detail.id">
            <p>ID: {{detail.id}}</p>
            <p>Category: {{detail.category}}</p>
            <p>Description: {{detail.description}}</p>
            <p>Generation ID: {{detail.generationID}}</p>
            <p>Vendoe Code: {{detail.vendorCode}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        searchString: '',
        spareparts: [],
        detail: [],
      };
    },
    mounted() {
      const app = this;
      this.$http.get(`/api/sparePartsGeneration/${app.$route.params.generationID}?categoryID=${app.$route.params.id}`).then((response) => {
        app.spareparts = response.body;
      });
    },
    methods: {
      displayDetails(item) {
        this.detail = item;
      },
    },
    computed: {
      filteredSpareparts() {
        let sparepartsArray = this.spareparts;
        let search = this.searchString;

        if (!search) {
          return sparepartsArray;
        }
        search = search.trim().toLowerCase();
        sparepartsArray = sparepartsArray.filter((item) => {
          if (item.vendorCode.toLowerCase().indexOf(search) !== -1) {
            return item;
          }
          return false;
        });
        return sparepartsArray;
      },
    },
  };
</script>
