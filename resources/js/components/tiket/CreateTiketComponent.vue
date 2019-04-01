<template>
       <div class="container">
   <v-form @submit.prevent="submit">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                  <div class="card-header">Tambah Tiket</div>
                      <div class="card-body">
                          <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-space-shuttle"> Nama Tiket </i></label>

                                 <div class="col-md-6">
                                       <input type="text" v-model="form.nama_tiket" class="form-control">
                                 </div>
                           </div>


                      <div class="form-group row">
                        <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-address-book">Kategori Tiket</i></label>
                            <div class="col-md-6">
                                    <select class="form-control" v-model="form.id_category">
                                         <option v-for="(categories, value, index ) in category" :key="index" :value="categories.id">{{categories.nama_category}}</option>
                                    </select>
                            </div>
                        </div>

                          <div class="form-group row">
                                 <label class="col-md-2 col-form-label text-md-right"><i class="far fa-flag"> Jumlah </i></label>
                                 <div class="col-md-6">
                                        <input type="number" v-model="form.qty" class="form-control">
                                 </div>
                           </div>

                          <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-money-bill-alt"> Harga </i></label>
                                 <div class="col-md-6">
                                     <input type="number"  v-model="form.harga_tiket" class="form-control">
                                 </div>
                           </div>

                               <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-2">
                                        <button type="submit" class="btn btn-danger">Tambah data</button>
                                       <router-link to="/tiket" class="btn btn-info">Kembali</router-link>
                                    </div>
                            </div>
                      </div>
                  </div>
            </div>
        </div>
    </v-form>
</div>
</template>

<style>
 .card-header {
               background-color:  #27c8f9;
             }
</style>

<script>
export default {
    data(){
        return{
            category : '',
            form :{
                nama_tiket      : null,
                qty             : null,
                harga_tiket     : null,
                id_category   : null,
            },
        }
    },
    created(){
            axios.get('/api/category')
            .then(response=>{
                this.category = response.data.data;
            });
        },
    methods :{
         submit(){
            axios.post('/api/tiket',this.form)
            .then(response=>{
                  this.$router.push({name :'tiket'});
                  alert ('data berhasil di edit')
            });
        },
        

    },
    

}
</script>