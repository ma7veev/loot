<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="" v-if="!accounts_balance_exists">There is still no data here</div>
            <el-table :data="accounts_balance_data" style="width: 100%" v-if="accounts_balance_exists">
               <el-table-column prop="name" label="Name" width="180"></el-table-column>
               <el-table-column prop="result" label="Result" width="280"></el-table-column>
            </el-table>
         </div>
      </div>
   </div>
</template>
<script>
    export default {
        props: [],
        mounted() {
            this.getAccountsBalance();

        },
        data() {
            return {
                accounts_balance_data: [
                    {
                        result: '',
                        id: ''
                    }
                ],
                accounts_balance_exists: false,
            }
        },
        methods: {

            getAccountsBalance(){
                axios.get('/get-accounts-balance-data', {
                    params: {}
                })
                    .then((response) => {
                        //  console.log(response.data);
                        if (response.data.length > 0) {
                            this.accounts_balance_exists = true;
                            this.accounts_balance_data = response.data;

                        } else {
                            this.accounts_balance_exists = false;

                        }

                    })
                    .catch((error) => {
                        this.$message.error('Cannot get accounts balance');
                    });
            },
        }
    }
</script>