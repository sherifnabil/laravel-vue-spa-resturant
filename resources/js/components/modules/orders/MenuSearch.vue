<template>
    <div class="wrapper">
        <input v-model="SearchString" type="text" class="form-control mb-3" placeholder="Search here....">
    </div>
</template>
<script>
export default {
    props: ['items'],
    data() {
        return {
            SearchString: ''
        }
    },
    computed: {
        fillteredList(){
            return this.items.filter(item => {
                return item.name.toLowerCase().includes(this.SearchString.toLowerCase());
            });
        }
    },
    watch: {
        SearchString(v){
            if (v != '') {
                window.bus.$emit('filteredList', this.fillteredList);
            } else {
                window.bus.$emit('clearFilteredList');
            }
            
        }
    },
}
</script>