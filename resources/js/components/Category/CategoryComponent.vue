<template>
  <v-app>
    <v-card>
      <div class="card-header">Tabel Category</div>  
      <v-card-title>
          
        
          <router-link to="/category/create" class="btn btn-info btn-sm">+Add Data</router-link>
          <v-spacer></v-spacer>
          <v-text-field
              v-model="search"
              append-icon="search"
              label="Search"
              single-line
              hide-details
          ></v-text-field>
          </v-card-title>
          <v-data-table
          :headers="headers"
          :items="category"
          :search="search"
          >
        <template v-slot:items="props">
          <td>{{index}}</td>
          <td>{{ props.item.nama_category }}</td>
          <td>
            <router-link :to="{name: 'editcategory', params:{id:props.item.id}}">
            <v-icon color="orange">edit</v-icon>
            </router-link>
            <v-btn icon small @click="destroy(props.item.id)">
              <v-icon color="red">delete</v-icon>
            </v-btn>
          </td>
        </template>
        <v-alert v-slot:no-results :value="true" color="error" icon="warning">
          Your search for "{{ search }}" found no results.
        </v-alert>
      </v-data-table>
    </v-card>
  </v-app>
</template>

<script>
  export default {
    mounted(){
        this.getCategory();
    },
    data () {
      return {
        search: '',
        headers: [
            {text : 'NO', value: '' },
            
            {
                text: 'Nama Category',
                align: 'left',
                sortable: true,
                value: 'nama_category'
            },
            { text: 'Action', value: '' },
            
        ],
        category: [],
        index: 3,
      }
    },
    methods:{
        getCategory()
        {
            axios.get('api/category')
            .then(response=>{
                this.category=response.data.data;
            });
            //.then(res=>this.category=res.data.data); = dengan yang diatas
            return this.index+=1            
           
        },
        destroy(id){
          let pilihan = confirm('apakah anda ingin hapus?');
          this.pilihan =true;
          if(pilihan ==true){
            axios.delete(`/api/category/${id}`)
          .then(response=>{
            this.getCategory();
            alert ('data berhasil dihapus');
          });
          }
          else
          this.$router.push({name :'category'});
          
        }

    },
    
    
  }
</script>