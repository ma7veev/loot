<template>
   <div class="container">
      <div class="row">
         <div class="col-md-12"></div>
      </div>
   </div>
</template><script>
    export default {
        props: [],
        mounted() {
            this.getAccounts();

        },
        data() {
            return {
                accounts_data: [],
            }
        },
        methods: {
            deleteAccount(index, rows) {
            },
        }
    }
</script>