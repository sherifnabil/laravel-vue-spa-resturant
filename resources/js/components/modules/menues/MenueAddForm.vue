<template>
    <div class="add_form_wrapper">
        <form action="#" @submit.prevent="handleSubmit">
            <div class="form-group">
                <label for="name">Food Item</label>
                <input type="text" class="form-control" v-model="food.item">
                <div class="validation-message" v-text="validation.getMessage('item')"></div>
            </div>
            <div class="form-group">
                <label for="name">Food Description</label>
                <textarea class="form-control" v-model="food.description"></textarea>
                <div class="validation-message" v-text="validation.getMessage('description')"></div>
            </div>
            <div class="form-group">
                <label for="category">Select Category</label>
                <multiselect
                    v-model="food.category"
                    :options="categories"
                    :close-on-select="true"
                ></multiselect>
                <div class="validation-message" v-text="validation.getMessage('category')"></div>

            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" v-model="food.price">
                <div class="validation-message" v-text="validation.getMessage('price')"></div>

            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import Validation from './../../../utils/Validation.js'
import axios from 'axios';
export default {
      components: {
        Multiselect,
    },
    props: ['categories', 'resturant'],
    methods:{
        handleSubmit(){
            let data = this.food;
            data.resturant_id = this.resturant,

            axios.post('/api/item/save', data)
            .then((res) => {
                this.$emit('newItemAdded', res.data, this.food);
                this.food = this.emptyItems()
            })
            .catch((err) => {
                console.log(err.response);
                if(err.response.status == 422){
                    this.validation.setMessages(err.response.data.errors);
                }
                
                
            });
            
        },
        emptyItems(){
            return {
                price: 100,
                item: '',
                category: '',
                description: ''
            }
        }
    },
    data(){
        return {
            food: this.emptyItems(),
            validation: new Validation()
        }
    }
}
</script>