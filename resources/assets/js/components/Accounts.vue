<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  <h2 class="mt-3">All accounts</h2>
                  <el-table :data="accounts_data" style="width: 100%" v-if="accounts_exists">
                     <el-table-column prop="name" label="Name" width="180"></el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280"></el-table-column>
                     <el-table-column label="Action">
                        <template slot-scope="scope">
                           <el-button @click.native.prevent="deleteAccount(scope.$index, accounts_data)" type="danger" plain>
                              Remove
                           </el-button>
                        </template>
                     </el-table-column>
                  </el-table>
                  <div class="" v-if="!accounts_exists">There is still no data here</div>
                  <h2 class="mt-3">New account</h2>
                  <el-table :data="newData" style="width: 100%">
                     <el-table-column prop="name" label="Name" width="120">
                        <template slot-scope="scope">
                           <el-input placeholder="Enter new name" v-model="name_model" type="string"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column prop="initial" label="Initial balance" width="280">
                        <template slot-scope="scope">
                           <el-input placeholder="Enter value" v-model="initial_model"  type="number" value="0"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280">
                        <template slot-scope="scope">
                           <el-input type="textarea" :rows="2" placeholder="Description" v-model="comment_model"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column label="Action" width="100">
                        <template slot-scope="scope">
                           <el-button type="success" @click="saveAccounts" class="">Save</el-button>
                        </template>
                     </el-table-column>
                  </el-table>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
    export default {
        props: [],
        mounted() {
            this.getAccounts();

        },
        data() {
            return {
                accounts_data: [
                    {
                        comment: '',
                        name: '',
                        id: ''
                    }
                ],
                accounts_exists: false,
                defaultData: {},
                newData: [{
                    comment: '',
                    name: ''
                }],
                name_model: '',
                comment_model: '',
                initial_model:''

            }
        },
        methods: {
            deleteAccount(index, rows) {
                console.log(index, rows[0]);
                let id = rows[index]['id'];
                axios.get('/delete-account', {
                    params: {id: id}
                })
                    .then((response) => {

                        if (response.data) {
                            console.log(response.data);
                            this.$message.success('You have succesfully removed an account');
                            this.getAccounts();

                        }

                    })
                    .catch((error) => {
                        this.$message.error('Cannot delete an account');
                    });

            },
            getAccounts(){
                axios.get('/get-accounts-data', {
                    params: {}
                })
                    .then((response) => {
                        //  console.log(response.data);
                        if (response.data.length > 0) {
                            this.accounts_exists = true;
                            this.accounts_data = response.data;

                        } else {
                            this.accounts_exists = false;
                            
                        }

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get accounts');
                    });
            },
            saveAccounts(){
                axios.get('/save-account', {
                    params: {
                        name: this.name_model,
                        comment: this.comment_model,
                        initial: this.initial_model
                    }
                })
                    .then((response) => {
                        this.$message.success('Your data is saved');
                        this.getAccounts();
                        //   this.items_model = this.amount_model = this.comment_model = '';
                    })
                    .catch((error) => {
                        this.$message.error('Oops, this is a error message.');
                    });
            },
        }
    }
</script>
