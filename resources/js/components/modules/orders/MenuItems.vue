<template>
    <div>
        <ul class="list-group">
            <li v-for="(item, key) in items" :key="key" class="list-group-item">
                <div class="row">
                    <div class="col-md-10">
                        {{ item.name }} <span class="float-right">{{ item.price }}</span><br>
                        <small class="badge badge-success">{{ item.category.name }}</small>
                    </div>
                    <div class="col-md-2">
                        <button @click="handleAddButton(item)" class="btn btn-primary btn-sm">Add</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props:['items'],
    methods: {
        handleAddButton(item){
            window.bus.$emit('menu-item-dispatch', item);
        }
    },
}
</script>