<template>
<div class="container">
     <v-form @submit.prevent="savetransaksi">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fas fa-money-check-alt"> TRANSAKSI TIKET </i></div>
                    <div class="card-body">
                    <h3><i class="fab fa-wpforms"> Form Transaksi </i></h3>
                    <table class="table table-bordered">
                           <tr><td>
                                <div class="col-md-12">
                                    <label>Name Tiket</label>
                                      <v-flex xs12 sm12 d-flex>
                                        <select class="form-control" v-model="form.tiket_id">
                                            <option></option>
                                            <option v-for="(tiket, key, index) in tikets" :key="index" :value="tiket.id" >{{tiket.nama_tiket}}</option>
                                        </select>
                                      </v-flex>
                                </div>
                           </td></tr>
                
                        <tr><td>
                                <div class="col-md-12">
                                    <label>Qty</label>
                                      <v-flex xs12 sm12 d-flex>
                                         <input  type="number" class="form-control" v-model="form.qty">
                                      </v-flex>
                                </div>
                         </td></tr>
                          <tr><td>
                                <v-btn color="primary" type="submit" dark> Save
                                        <v-icon dark right>check_circle</v-icon>
                                </v-btn>
                                <v-btn color="primary" @click="finis()" dark> Finish
                                        <v-icon dark right>check_circle</v-icon>
                                </v-btn>
                                    <v-btn @click="print()" color="indigo" dark>Print
                                        <v-icon dark>backup</v-icon>
                                    </v-btn>
                            </td></tr>
                    </table>
                        <div class="card-header">
                           <i class="fab fa-wpforms"> Detail Transaksi </i>
                       </div>
                     <table class="table table-bordered">
                         <th>
                             <i class="fas fa-file-signature">  Nama Tiket </i>
                         </th>
                         <th>
                             <i class="fab fa-wolf-pack-battalion"> Qty </i></th>
                        <th>
                            <i class="fas fa-hand-holding-usd"> Harga Tiket </i>
                        </th>
                        <th>
                            <i class="fas fa-dollar-sign"> Subtotal  </i></th>
                            <th><i class="fas fa-ban"> Cancel </i>
                         </th>
                        <tr v-for="(transaction, key ,index) in transactions" :key="transaction.id" :value="index"  >
                                <td>{{transaction.nama_tiket}}</td>
                                <td>{{transaction.qty}}</td>
                                <td>{{transaction.harga_tiket}}</td>
                                <td>{{transaction.total}}</td>
                               <td>
                                     <v-btn icon small>
                                            <v-icon color="red" @click="destroy(transaction.id)">cancel</v-icon>
                                     </v-btn>
                               </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </v-form>
</div>
</template>

<script>
import swal from 'sweetalert';
import jsPDF from 'jspdf';
import autoTable from 'jspdf-autotable';
export default {
    data(){
        return {
            transactions:{},
            tikets:{},
            form : {
                tiket_id : null,
                qty        : null,
                status      :'tertunda',
            },

        }
    },
    created(){
        axios.get('/api/tiket')
        .then(response=>{
            this.tikets = response.data.data;
        })
    },
    methods:{
        savetransaksi(){
            axios.post('api/transaction', this.form)
            .then(response=>{
                this.$router.push({name : 'transaction'});
                this.getTransaction();
                alert ('data berhasil ditambahkan');
            })
        },
        getTransaction(){
            axios.get('/api/transaction')
            .then(response=>{
                this.transactions= response.data.data;
            })
        },
        destroy(id){
            let pilihan = confirm("apakah yakin menghapus?")
            this.pilihan = true;
            if(pilihan==true){
                axios.delete(`/api/transaction/${id}`)
                .then(response=>{
                this.$router.push({name : 'transaction'});
                this.getTransaction();
            })
            }else{
                this.$router.push({name : 'transaction'});
                this.getTransaction();

            }
            
        },
        finis(){
            axios.get('/api/transaction/update')
            .then(response=>{
                this.getTransaction();
                alert('transaksi berhasil');
            });
        },
        print(){
            var vm=this
            var columns=[
                {title: "name Tiket", dataKey:"nama_tiket"},
                {title: "Price Tiket",dataKey:"harga_tiket"},
                {title: "Qty",        dataKey:"qty"},
                {title: "Sum",        dataKey:"total"}
            ];
            var doc = new jsPDF('p','pt');
            doc.autoTable(columns,vm.transactions)
            doc.save('a4.pdf')
          }
    }


}
</script>

<style>

</style>
