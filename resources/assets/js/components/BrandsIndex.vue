<template>
    <div class="form-group">
  		  <div class="panel panel-default">
   			    <div class="panel-heading">Brands list</div>
   				  <div class="panel-body">
    				    <table class="table table-bordered table-striped">
     				    	  <thead>
      			    			  <tr>
       			    				    <th>Name</th>
      			    			  </tr>
     				    	  </thead>
     				    	  <tbody>
     				    		    <tr v-for="brand in brands">
       			    				    <td>
       			    					      <router-link :to="{name: 'brandModelsIndex', params: {id: brand.id}}" class="btn btn-xs btn-default">
                                    {{ brand.brand }}
                                </router-link>
                            </td>
     				    		    </tr>
    				    	  </tbody>
   					    </table>
 				    </div>
 			  </div>
 		</div>
</template>

<script>
  export default {
    data: function () {
      return {
        brands: [],
      };
    },
    mounted() {
      let app = this;
      this.$http.get('/api/brands').then(function(response) {
        app.brands = response.body;
      });
    },
  };
</script>
