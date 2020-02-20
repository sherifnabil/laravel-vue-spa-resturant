<template>
      <table class="table table-bordered table-hovered table-stripped">
        <thead class="text-center">
            <th>#</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Customer Details</th>
            <th>Actions</th>
        </thead>
        <order-items :orderes="orderes"></order-items>
    </table>
</template>
<script>
import OrderItems from './OrderItems';
export default {
    props: ['orderes'],
    components:{
        OrderItems
    }
}
</script>