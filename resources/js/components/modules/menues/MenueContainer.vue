<template>
    <div class="wrapper menue__container">
       <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">Menu Items</template>
                    <template slot="body">
                        <div class="section">
                            <multiselect
                            v-model="menu"
                            :options="categories"
                            :close-on-select="true"
                            ></multiselect><br>
                            <menue-groups :menus="currentMenuItems"></menue-groups>
                        </div>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4">

                <card-component> 
                <template slot="title">Add Item</template>
                    <template slot="body">
                       <menue-add-form
                       :categories="categories"
                       v-on:newItemAdded="addItem"
                       :resturant="resturantId"
                       ></menue-add-form>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
import _ from 'lodash';
import Multiselect from 'vue-multiselect';
import MenueGroups from './MenueGroups.vue';
import MenueAddForm from './MenueAddForm.vue';
export default {
    props: ['menues', 'resturantId'],
    components: {
        Multiselect,
        MenueGroups,
        MenueAddForm
    },

    created(){
        _.forEach(this.menues, (menu, key) => {
            this.categories.push(key)
        });
       
        this.menu = this.categories[0];
        this.localItems = this.menues; 
    },

    data(){
        return {
            menu: '',
            categories: [],
            localItems: ''
        }
    },
    computed: {
        currentMenuItems(){
            return this.localItems[this.menu]
        }
    },

    methods: {
        addItem(item, food){
            console.log(item, food);
            this.localItems[food.category].unshift(item);
        }
    },
}
</script>