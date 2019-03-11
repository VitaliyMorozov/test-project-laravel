<template>
  <div class="form-group">
    <div class="panel panel-default">
      <div class="panel-heading">Categories</div>
      <div class="panel-body">
        <div class="container vue">
            <ul>
              <li v-for="item, index in categories">
                <router-link :to="{name: 'sparePartsGenerationIndex', params: {id: item.id, generationID: generationID }}">
                  {{ item.category }}
                </router-link>
              </li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        categories: [],
        generationID: null,
      };
    },
    mounted() {
      const app = this;
      app.generationID = app.$route.params.id;
      this.$http.get(`/api/categorySpareParts/${app.generationID}`).then((response) => {
        app.categories = response.body;
      });
    },
  };
</script>
