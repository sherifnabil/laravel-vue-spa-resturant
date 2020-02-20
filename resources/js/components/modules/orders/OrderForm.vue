<template>
    <div class="wrapper">
        <form action="#">
            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="customer.name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input v-model.number="customer.phone" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input v-model="customer.address" type="text" class="form-control">
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            customer: {
                name: '',
                phone: '',
                address: '',
            }
        }
    },
    watch: {
        customer: {
            handler(val){
               let customer = {
                    name: val.name,
                    phone: val.phone,
                    address: val.address
                };
                this.$emit('CustomerDetailsChange', customer);
                
            }, deep: true
        }
    }
    
}
</script>