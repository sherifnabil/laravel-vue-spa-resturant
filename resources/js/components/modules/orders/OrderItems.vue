<template>
      <tbody>
            <tr v-for="order in orderes.data" :key="order.id">
                <td class="text-center" v-text="order.id"></td>
                <td class="text-center" v-text="order.amount"></td>
                <td class="text-center" v-text="order.isComplete ? 'Done' : 'Pending'"></td>
                <td>
                    Name:  @{{ order['order_details']['customer_name'] }} <br>
                    Phone: @{{ order['order_details']['phone'] }} <br>
                    Address: @{{ order['order_details']['customer_address'] }}
                </td>
                <td>
                    <button class="btn btn-sm btn-success">Done</button><br><br>
                    <button class="btn btn-sm btn-warning">Cancel</button>
                </td>
            </tr>
        </tbody>
</template>
<script>
export default {
    props: ['orderes'],
}
</script>