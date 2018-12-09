<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  <h2 class="mt-3">All items</h2>
                  <el-table :data="items_data" style="width: 100%" v-if="items_exists">
                     <el-table-column prop="name" label="Name" width="120"></el-table-column>
                     <el-table-column prop="accounts_id" label="Account" width="180"></el-table-column>
                     <el-table-column prop="type" label="Type" width="120"></el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280"></el-table-column>
                  </el-table>
                  <div class="" v-if="!items_exists">There is still no data there</div>
                  <h2 class="mt-3">New item</h2>
                  <el-table :data="newData" style="width: 100%">
                     <el-table-column prop="name" label="Name" width="120">
                        <template slot-scope="scope">
                           <el-input placeholder="Enter name" v-model="name_model" type="string"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column prop="accounts_id" label="Account" width="180">
                        <template slot-scope="scope">
                           <el-select v-model="accounts_model" placeholder="Select">
                              <el-option v-for="account in accounts_data" :key="account.id" :label="account.name" :value="account.id"></el-option>
                           </el-select>
                        </template>
                     </el-table-column>
                     <el-table-column prop="type" label="Type" width="120">
                        <template slot-scope="scope">
                           <el-select v-model="type_model" placeholder="Select">
                              <el-option :key="1" :label="income" :value="1">income</el-option>
                              <el-option :key="0" :label="outcome" :value="0">outcome</el-option>
                           </el-select>
                        </template>
                     </el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280">
                        <template slot-scope="scope">
                           <el-input type="textarea" :rows="2" placeholder="Description" v-model="comment_model"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column label="Action" width="100">
                        <template slot-scope="scope">
                           <el-button type="success" @click="saveItems" class="">Save</el-button>
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
            this.getItems();
            this.getAccounts();

        },
        data() {
            return {
                items_data: [
                    {
                        name: '',
                        accounts_id: '',
                        type: '',
                        comment: ''
                    }
                ],
                items_exists: false,
                defaultData: {},
                newData: [{
                    name: '',
                    accounts_id: '',
                    type: '',
                    comment: ''
                }],
                accounts_data: [{
                    id: '1',
                    name: 'name'
                }],
                items_model: '',
                name_model: '',
                comment_model: '',
                accounts_model: '',
                type_model: ''

            }
        },
        methods: {
            getAccounts(){
                axios.get('/get-accounts', {
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
            getItems(){
                axios.get('/get-all-items', {
                    params: {}
                })
                    .then((response) => {
                        //  console.log(response.data);
                        if (response.data.length > 0) {
                            this.items_exists = true;
                            this.items_data = response.data;

                        }

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get items');
                    });
            },
            saveItems(){
                axios.get('/save-item', {
                    params: {
                        type: this.type_model,
                        accounts_id: this.accounts_model,
                        name: this.name_model,
                        comment: this.comment_model
                    }
                })
                    .then((response) => {
                        this.$message.success('Your data is saved');
                        this.getItems();
                        this.items_model = this.name_model = this.comment_model = '';
                    })
                    .catch((error) => {
                        this.$message.error('Oops, this is a error message.');
                    });
            },
        }
    }
</script>
