<template>
    <div class="form-group">
  		  <div class="panel panel-default">
   				  <div class="panel-body">
    				    <div>
                    <ul>
                        <li><router-link :to="{name: 'adminBrandsViewIndex'}" class="btn btn-xs btn-default">Brands</router-link></li>
                        <li></li>
                        <li></li>
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
        brands: [],
      };
    },
    mounted() {
      const app = this;
      this.$http.get('/api/brands').then((response) => {
        app.brands = response.body;
      });
    },
  };
</script>
