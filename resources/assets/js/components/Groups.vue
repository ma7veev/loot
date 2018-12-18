<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-body">
                  <h2 class="mt-3">All groups</h2>
                  <el-table :data="groups_data" style="width: 100%" v-if="groups_exists">
                     <el-table-column prop="name" label="Name" width="180"></el-table-column>
                     
                     <el-table-column prop="comment" label="Comment" width="280"></el-table-column>
                  
                  </el-table>
                  <div class="" v-if="!groups_exists">There is still no data here</div>
                  <h2 class="mt-3">New group</h2>
                  <el-table :data="newData" style="width: 100%">
                     <el-table-column prop="name" label="Name" width="120">
                        <template slot-scope="scope">
                           <el-input placeholder="Enter new name" v-model="name_model" type="string"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column prop="comment" label="Comment" width="280">
                        <template slot-scope="scope">
                           <el-input type="textarea" :rows="2" placeholder="Description" v-model="comment_model"></el-input>
                        </template>
                     </el-table-column>
                     <el-table-column label="Action" width="100">
                        <template slot-scope="scope">
                           <el-button type="success" @click="saveGroups" class="">Save</el-button>
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
            this.getGroups();

        },
        data() {
            return {
                groups_data: [
                    {
                        comment: '',
                        name: ''
                    }
                ],
                groups_exists: false,
                defaultData: {},
                newData: [{
                    comment: '',
                    name: ''
                }],
                name_model: '',
                comment_model: ''

            }
        },
        methods: {
            getGroups(){
                axios.get('/get-groups-data', {
                    params: {}
                })
                    .then((response) => {
                        //  console.log(response.data);
                        if (response.data.length > 0) {
                            this.groups_exists = true;
                            this.groups_data = response.data;

                        }

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get groups');
                    });
            },
            saveGroups(){
                axios.get('/save-group', {
                    params: {
                        name: this.name_model,
                        comment: this.comment_model
                    }
                })
                    .then((response) => {
                        this.$message.success('Your data is saved');
                        this.getGroups();
                           this.amount_model = this.comment_model = '';
                    })
                    .catch((error) => {
                        this.$message.error('Oops, this is a error message.');
                    });
            },
        }
    }
</script>
