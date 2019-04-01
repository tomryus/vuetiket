 <template>
 <v-app>
      <v-card>
        <div class="card-header">Tabel Tiket</div>  
        <v-card-title>
              <router-link to="/tiket/create" class="btn btn-info btn-sm">+Add Data</router-link>
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
                :items="tiket"
                :search="search"
                >
              <template v-slot:items="props">
                <td>{{props.item.nama_tiket}}</td>
                <td>{{props.item.harga_tiket}}</td>
                <td>{{props.item.qty}}</td>
                <td>{{props.item.nama_category}}</td>
                <td> 
                  <router-link :to="{ name : 'edittiket', params:{id:props.item.id}}">
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
        this.getTiket();
    },
    data () {
      return {
        search: '',
        headers: [
            {text : 'Nama Tiket',           value : 'nama_tiket' },
            {text : 'Harga tiket',          value : 'harga_tiket'},
            {text : 'quantitas',            value : 'qty'},
            {text : 'Nama Kategory',        value : 'nama_kategory'},
            { text: 'Action',               value : '' },
            
            
        ],
        tiket : [],
      }
    },
    methods:{
        getTiket()
        {
            axios.get('/api/tiket')
            .then(response=>{
                this.tiket=response.data.data;
            });
            //.then(res=>this.category=res.data.data); = dengan yang diatas
                      
           
        },
        destroy(id){
          this.pilihan =true;
          let pilihan = confirm('apakah yakin ingin menghapus data ini ?');
          if(pilihan == true){
              axios.delete(`/api/tiket/${id}`)
              .then(response=>{
                  alert ('data berhasil dihapus');
                  this.getTiket();

          });
                        
          }else
          {
            getTiket();
          }


        }
    },
}
</script>

<style>

</style>
