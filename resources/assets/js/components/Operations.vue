<template>
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading">Example Component</div>
               <div class="panel-body">
                  <el-table :data="oldData" style="width: 100%">
                     <el-table-column prop="items_id" label="Статья" width="180">
                        <template slot-scope="scope">
                           <el-select v-model="items_selected" placeholder="Select">
                              <el-option
                                    v-for="item in items_data"
                                    :key="item.id"
                                    :label="item.name"
                                    :value="item.id">
                              </el-option>
                           </el-select>
                        </template>
                     </el-table-column>
                     <el-table-column prop="amount" label="Сумма"></el-table-column>
                     <el-table-column prop="comment" label="Комментарий" width="180"></el-table-column>
                  </el-table>
               </div>
            </div>
         </div>
      </div>
      <el-button type="primary" @click="test">Primary</el-button>
   </div>
</template>
<script>
    export default {
        props: [
            'items_prop'
        ],
        mounted() {
            console.log('Component mounted.', this.items_prop)
   this.items_data = JSON.parse(this.items_prop);
           /*   axios.get('/get-items')
            .then(function (response) {
            console.log(response.data);
            })
            .catch(function (error) {
            console.log(error);
            });*/

        },
        data() {
            return {
                items:[],
                newData: {},
                defaultData: {},
                oldData: [{
                    items_id: '',
                    comment: '',
                    amount: ''
                }],
                items_data: [{
                    id: 'Option1',
                    name: 'Option1'
                }, {
                    id: 'Option2',
                    name: 'Option2'
                }, {
                    id: 'Option3',
                    name: 'Option3'
                }, {
                    id: 'Option4',
                    name: 'Option4'
                }, {
                    id: 'Option5',
                    name: 'Option5'
                },],
                items_selected: '',

            }
        },
        methods:{
            test(){
                console.log(this.items_data);
            }
        }
    }
</script>
