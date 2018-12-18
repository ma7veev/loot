<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  <h2 class="mt-3">Last operations</h2>
                  <el-table :data="operations_data" style="width: 100%" v-if="operations_exists">
                     <el-table-column prop="items_id" label="Item" width="180"></el-table-column>
                     <el-table-column prop="accounts_id" label="Account" width="180"></el-table-column>
                     <el-table-column prop="amount" label="Amount" width="120"></el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280"></el-table-column>
                     <el-table-column prop="created_at" label="Created"></el-table-column>
                  </el-table>
                  <div class="" v-if="!operations_exists">There is still no data here</div>
                  <h2 class="mt-3">New operation</h2>
                  <el-table :data="newData" style="width: 100%">
                     <el-table-column prop="items_id" label="Item" width="180">
                        <template slot-scope="scope">
                           <el-select v-model="items_model" placeholder="Select">
                              <el-option v-for="item in items_data" :key="item.id" :label="item.name" :value="item.id"></el-option>
                           </el-select>
                        </template>
                     </el-table-column>
                     <el-table-column prop="accounts_id" label="Account" width="180">
                        <template slot-scope="scope">
                           <el-select v-model="accounts_model" placeholder="Select">
                              <el-option v-for="account in accounts_data" :key="account.id" :label="account.name" :value="account.id"></el-option>
                           </el-select>
                        </template>
                     </el-table-column>
                     <el-table-column prop="amount" label="Amount" width="120">
                        <template slot-scope="scope">
                           <el-input placeholder="Enter amount" v-model="amount_model" type="number" value="0"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280">
                        <template slot-scope="scope">
                           <el-input type="textarea" :rows="2" placeholder="Description" v-model="comment_model"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column label="Action" width="100">
                        <template slot-scope="scope">
                           <el-button type="success" @click="saveOperations" class="">Save</el-button>
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
            this.getOperations();
            this.getItems();
            this.getAccounts();

        },
        data() {
            return {
                operations_data: [
                    {
                        items_id: '',
                        amount: '',
                        comment: '',
                        created_at: ''
                    }
                ],
                operations_exists: false,
                defaultData: {},
                newData: [{
                    items_id: '',
                    comment: '',
                    amount: ''
                }],
                accounts_data: [{
                    id: '1',
                    name: 'name'
                }],
                items_data: [{
                    id: '1',
                    name: 'name'
                }],
                items_model: '',
                amount_model: '',
                accounts_model: '',
                comment_model: ''

            }
        },
        methods: {
            getItems(){
                axios.get('/get-items-list', {
                    params: {}
                })
                    .then((response) => {
                        console.log(response.data.length);
                        this.items_data = response.data;

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get items');
                    });
            },
            getAccounts(){
                axios.get('/get-accounts-list', {
                    params: {}
                })
                    .then((response) => {
                        console.log(response.data.length);
                        this.accounts_data = response.data;

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get accounts');
                    });
            },
            getOperations(){
                axios.get('/get-operations-data', {
                    params: {}
                })
                    .then((response) => {
                        //  console.log(response.data);
                        if (response.data.length > 0) {
                            this.operations_exists = true;
                            this.operations_data = response.data;

                        }

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get operations');
                    });
            },
            saveOperations(){
                axios.get('/save-operation', {
                    params: {
                        items_id: this.items_model,
                        amount: this.amount_model,
                        comment: this.comment_model
                    }
                })
                    .then((response) => {
                        this.$message.success('Your data is saved');
                        this.getOperations();
                        this.items_model = this.amount_model = this.comment_model = '';
                    })
                    .catch((error) => {
                        this.$message.error('Oops, this is a error message.');
                    });
            },
        }
    }
</script>
