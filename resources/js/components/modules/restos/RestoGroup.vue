<template>
     <div class="wrapper menue__container mb-5">
       <div class="row">
           <div class="col-md-8">
               <div class="row">
                    <div class="col-md-6 mb-4" v-for="resto in localRestos" :key="resto.id">
                        <card-component>
                            <template slot="title">{{ resto.name }}</template>
                            <template slot="body">
                               <i class="fa fa-map-marker-alt"></i> {{ resto.location }} <br>
                               <i class="fa fa-table"></i> {{ resto.tables }} <br><br> 
                                <a class="card-link" :href="resto.slug"> Menu</a>
                                <a class="card-link" :href="resto.ordersSlug"> Orders</a>
                            </template>
                        </card-component>
                    </div>
               </div>
           </div>
            <div class="col-md-4" v-if="showAddForm">
                <card-component> 
                <template slot="title">Add new Resturant</template>
                    <template slot="body">
                      <button class="btn btn-primary" @click="handleNewResto" >+</button>
                    </template>
                </card-component>
                <modal name="add-new-resto" :draggable="true" height="50%">
                    <div class="container-padding">
                      <resto-add-form
                        @cancelModal="cancel"
                        @add-resturant="addResto"
                      ></resto-add-form>
                    </div>
                </modal >
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import RestoAddFprm from './RestoAddForm.vue';

export default {
    created(){
        this.localRestos = this.restos;
    },
    props: ['restos'],
    components: {
        'resto-add-form': RestoAddFprm
    },
    computed: {
        showAddForm(){
            return this.localRestos.length < 5;
        }
    },
   data(){
       return {
           localRestos: []
       }
   },
   methods: {
        handleNewResto () {
            this.$modal.show('add-new-resto');
        },
        cancel () {
            this.$modal.hide('add-new-resto');
        },
        addResto(resto){
            axios.post('api/resto', resto)
            .then( response => {
                this.localRestos.unshift(response.data)
                this.$modal.hide('add-new-resto')
                })
            .catch( error => console.log(error.response.data.errors));
        }
   },

}
</script>