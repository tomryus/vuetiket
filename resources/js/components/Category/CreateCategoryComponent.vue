<template>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <v-form @submit.prevent="submit">
                  <div class="card-header"><i class="fas fa-plus-circle"> Tambah Katgori </i></div>
                      <div class="card-body">
                          <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-space-shuttle"> Nama kategori </i></label>
                                    <div class="col-md-6">
                                        <input type="text" v-model="form.nama_category" class="form-control">
                                    </div>
                            </div>
                               <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-danger">Add Category</button>
                                    <router-link to="/category" class="btn btn-danger">Cancel</router-link>
                                </div>
                          </div>
                      </div>
                </v-form>
                  </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
      data() {
         return {
            form :{
               nama_category : null
            }
         }
      },
      methods:{
         submit(){
            axios.post('/api/category',this.form)
            .then(response=>{
                  this.$router.push({name :'category'});
                  alert ('data berhasil di edit')

            });
         }
      }
}
</script>

<style>

</style>
