<template>
    <div class="wrapper">
        <div class="row mb-3">
            <div class="col-md-12">
                <button @click.prevent="handleOrderSave" class="btn btn-success float-right">Save</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="mb-5">
                    <h2>Customer Details</h2><br>
                    <order-form @CustomerDetailsChange="handleCustomer"></order-form>
                </div>
                <div class="mb-5">
                    <h3>Order Details <span v-if="totalAmount > 0" class="float-right">{{ totalAmount }}</span> </h3>
                    <order-details :order-details="orderDetails"></order-details>
                </div>
            </div>
            <div class="col-md-5">
                <h2>Menu</h2>
                <order-menu-items @menu-item-dispatch="newMenuItem" :items="menuItems"></order-menu-items>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import OrderForm from './OrderForm';
import OrderDetails from './OrderDetails';
import OrderMenuItems from './OrderMenuItems';
export default {
    components:{
        OrderForm,
        OrderMenuItems,
        OrderDetails
    },
    computed: {
        totalAmount(){
            let price = 0;
            this.orderDetails.forEach(order => price += order.price)
            return price;
        }
    },
    props: ['restoId'],
    data(){
        return {
            menuItems: [],
            originalMenuItems: [],
            orderDetails: [],
            customerDetails: null,
        }
    },
    created() {
        this.loadRestoMenuItems();
        window.bus.$on('menu-item-dispatch', this.newMenuItem);
        window.bus.$on('filteredList', this.filteredList);
        window.bus.$on('clearFilteredList', this.unfilteredList);
        window.bus.$on('removeOrderedItem', this.removeOrderItem) ;
        

    },
    methods: {
        loadRestoMenuItems(){
            let data = {restoId :this.restoId}
            axios.post('/api/resto/menu', data)
            .then( res => {
                this.menuItems = res.data
                this.originalMenuItems  = res.data
            })
            .catch(error => console.log(error.response));
        },
        newMenuItem(item){
            this.orderDetails.unshift(item);
        },
        filteredList(list){
            this.menuItems = list;
        },
        unfilteredList(){
            this.menuItems = this.originalMenuItems;
        },
        handleCustomer(customerDetails){
            this.customerDetails = customerDetails;
            
        },
        removeOrderItem(item){
            this.orderDetails = this.orderDetails.filter(orderedItem => orderedItem.id != item.id);
        },
        handleOrderSave(){
            let orderItemsIds = [];
            this.orderDetails.forEach(item => orderItemsIds.push(item.id));
            let OrderData = {
                resturant_id: this.restoId,
                order_data: {
                    orderDetails: orderItemsIds,
                    customerDetails: this.customerDetails,
                    totalPrice: this.totalAmount,
                }
            };
            axios.post('/api/resto/order', OrderData)
            .then(response => console.log(response.data))
            .catch(error => console.log(error.response))
            
        },
    },
    
    
}
</script>