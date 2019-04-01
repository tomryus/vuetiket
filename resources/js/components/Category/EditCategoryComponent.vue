<template>
    <v-card><div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <v-form @submit.prevent="submit">
                        <div class="card-header"><i class="fas fa-plus-circle"> Tambah Katgori </i></div>
                            <div class="card-body">
                                <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-md-right"><i class="fas fa-space-shuttle"> Nama kategori </i></label>
                                        <div class="col-md-6">
                                            <input type="text"  class="form-control" v-model="form.nama_category">
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
    </v-card>
</template>

<script>
export default {
    data(){
        return {
            form :{},
        }
    },
    created(){
        axios.get(`/api/category/${this.$route.params.id}`)//tandanya tidak bisa ''
        .then(response=>{
            this.form= response.data.data;
        });
    },
    methods:{
        submit(){
            axios.put(`/api/category/${this.$route.params.id}`, this.form)//proses edit harus ada this.form
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
