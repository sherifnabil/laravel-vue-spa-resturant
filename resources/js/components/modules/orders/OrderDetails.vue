<template>
    <div>
        <ul class="list-group">
            <li v-for="(item, key) in orderDetails" :key="key" class="list-group-item">
                <div class="row">
                    <div class="col-md-10">
                        {{ item.name }} 
                        <span class="float-right">
                            {{ item.price }}
                            <span class="ml-3 pull-right">
                                <button @click="removeItem(item)" class=" pointer btn btn-danger">x</button>
                            </span>
                        </span><br>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    props: ['orderDetails'],
    methods: {
        removeItem(item){
            window.bus.$emit('removeOrderedItem', item) ;
        }
    },
}
</script>