<template>
  <div class="form-group">
    <div class="panel panel-default">
      <div class="panel-heading">Spare Parts</div>
      <div class="panel-body">
        <div class="container vue">
          <table class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Description</th>
              <th>Category</th>
              <th>Vendor Code</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item, index in spareparts">
              <td>{{ item.description }}</td>
              <td>
                <router-link :to="{name: 'sparePartsGenerationIndex', params: {id: item.id, generationID: generationID }}">
                  {{ item.category }}
                </router-link>
              </td>
              <td>{{ item.vendorCode }}</td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: function () {
      return {
        spareparts: [],
      };
    },
    mounted() {
      let app = this;
      let generationID = app.$route.params.generationID;
      let categoryID = app.$route.params.id;
      this.$http.get(`/api/sparePartsGeneration/${generationID}?categoryID=${categoryID}`).then(
        function(response) {
          app.spareparts = response.body;
        });
    },
  };
</script>
