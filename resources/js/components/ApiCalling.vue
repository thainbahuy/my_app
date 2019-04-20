<template>
    <div class="api-calling">
        <div class="error" v-if="errors.length">
           <span v-for="err in errors">
               {{ err }}
           </span>
            <hr>
        </div>
        <div class="create-form">
            <div class="product-name-input">
                <p>Name :</p>
                <input type="text" v-model="product.name">
            </div>
            <div class="product-name-input">
                <p>title :</p>
                <input type="text" v-model.number="product.title">
            </div>
            <div class="product-name-input">
                <p>Price :</p>
                <input type="text" v-model.number="product.price">
            </div>
            <div class="button-create">
                <button @click="createProduct">Create</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return  {
                product :{
                    name : '',
                    title: '',
                    price : 0
                },
                errors : []
            }
        },
        methods : {
            createProduct() {
                this.errors = []
                axios.post('/products/store', {name: this.product.name,title: this.product.title ,price: this.product.price})
                    .then(response => {
                        console.log(response.data.result)
                    })
                    .catch(error => {
                        this.errors = []
                        if (error.response.data.errors.name){
                            this.errors.push(error.response.data.errors.name)
                        }
                        if (error.response.data.errors.title){
                            this.errors.push(error.response.data.errors.title)
                        }
                        if (error.response.data.errors.price){
                            this.errors.push(error.response.data.errors.price)
                        }
                    })
            }
        }
    }
</script>

<style scoped>

</style>
