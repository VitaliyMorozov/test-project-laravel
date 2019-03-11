<template>
    <div class="form-group">
        <div class="panel panel-default">
            <div class="panel-heading">Models</div>
            <div class="panel-body">
                <div class="container vue">
                    <div v-for="model, index in models">
                        <a @click="model.open = !model.open" v-text="model.model" class="btn btn-xs btn-default"></a>
                        <ul v-show="model.open">
                            <li v-for="item in model.generations">
                                <router-link :to="{name: 'categorySparePartsIndex', params: {id: item.id}}">
                                    {{ item.generation }}
                                </router-link>
                            </li>
                        </ul>
                        <hr>
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
        models: [],
      };
    },
    mounted() {
      const app = this;
      this.$http.get(`/api/models/${app.$route.params.id}`).then((response) => {
        response.body.forEach((e) => {
          e.open = false;
          app.models.push(e);
        });
      });
    },
  };
</script>

<style>
  li {
    margin-left: 20px;
  }
</style>
