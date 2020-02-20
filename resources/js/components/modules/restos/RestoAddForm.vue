<template>
    <div class="resto_add_form_wrapper">
        <h3>Add New Resturant</h3>
        <div class="form-group">
            <label for="name">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Resturant Name"
                v-model="resto.name"
            />
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <input
                type="text"
                class="form-control"
                name="Address"
                placeholder="Resturant Address"
                v-model="resto.location"
            />
        </div>
        <div class="form-group">
            <label for="Tables">Number of Table</label>
            <input
                type="number"
                class="form-control"
                name="tables"
                placeholder="Resturant Tables"
                v-model.number="resto.tables"
            />
        </div>
        <div class="btn btn-primary" @click="handeleAdd">Add</div>
        <div class="btn btn-warning" @click="cancel">Cancel</div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            resto: this.basicResto()
        }
    },
    methods: {
        cancel () {
            this.$emit('cancelModal');
        },
        basicResto(){
            return { name: '', location: '', tables: 0}
        },
        handeleAdd(){        
            this.$emit('add-resturant', this.resto)
        }
   },
}
</script>