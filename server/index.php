<!DOCTYPE html>
 
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/materialize.css">
       
    </head>
    <body> 

     <div class="container">
      
        <div id="app"> 
        
        <ul id="list">
            <li v-for="cr in cars" :key="cr.car_id">
            <!-- {{element}} -->
                {{cr.company}}
            </li> 
        </ul> 
        <button @click="fetchdata">Get Data</button>
          <h4> <p class=" red darken-2" id="err_msg" v-if='cars.length == 0'> {{ err_msg }} </p> </h4>
        
        
        
           </div>

        

           

     </div>
      
       
    </body>
</html>

        <script src="js/vue.js" ></script>
        <script src="js/materialize.js" ></script>
        <script src="js/axios.min.js" ></script>
        
        
        

<script>
M.AutoInit();
  var app = new Vue ({
    el:'#app',
    data:{
        cars:[],
        err_msg: " NO RECORDS OF CARS FOUND "
    },

    mounted: function(){
        axios.get('interface.php')
            .then(function(response){
                this.cars = response.data;
                console.log(response.data)
            })
    },

    methods:{
        fetchdata:function(){
            axios.get('interface.php')
            .then(function(response){
                this.cars = response.data;
                console.log(response.data)
            })
            
        }
    },

  })

</script>