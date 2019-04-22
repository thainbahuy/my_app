<template>
    <div class="api-calling">
        <div class="error" v-if="errors.length">
           <span v-for="err in errors">
               {{ err }}
           </span>
            <hr>
        </div>
        <div class="notification" v-if="notifications.length">
           <span v-for="noti in notifications">
               {{ noti }}
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
                <input type="text" v-model="product.title">
            </div>
            <div class="product-name-input">
                <p>Price :</p>
                <input type="text" v-model.number="product.price">
            </div>
            <div class="button-create">
                <button @click="createProduct">Add New</button>
                <button @click="updateProduct">Save Update</button>
            </div>
        </div>
            <div id="table product">
                <h1>Table Product </h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name Product</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tbody v-if="Object.keys(listProducts).length != 0">
                    <tr v-for="(item,index) in listProducts">
                        <td>{{item.Name}}</td>
                        <td>{{item.Title}}</td>
                        <td>{{item.Price}}</td>
                        <td>
                            <button @click="deleteProduct(item,index)" class="btn btn-danger">Delete</button>
                            <button @click="updateProductSelected(item)" class=" btn btn-primary">Update</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                product: {
                    id : '',
                    name: '',
                    title: '',
                    price: 0
                },
                notifications :[],
                errors: [],
                listProducts: []
            }
        },
        created (){
            this.getListProduct();
        },
        methods: {
            createProduct() {
                axios.post('/products/store', {
                    name: this.product.name,
                    title: this.product.title,
                    price: this.product.price
                })
                    .then(response => {
                        this.errors = []
                        this.notifications = []
                        this.notifications.push(response.data.result)
                        //add new product into list view
                        this.listProducts.push({
                            Id : this.listProducts[this.listProducts.length-1].Id+1,
                            Name: this.product.name,
                            Title: this.product.title,
                            Price: this.product.price
                        })
                    })
                    .catch(error => {
                        this.notifications = []
                        this.errors = []
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name)
                        }
                        if (error.response.data.errors.title) {
                            this.errors.push(error.response.data.errors.title)
                        }
                        if (error.response.data.errors.price) {
                            this.errors.push(error.response.data.errors.price)
                        }
                    })
            },
            getListProduct(){
                this.errors = []
                this.notifications = []
                axios.get('/products/getListProduct')
                    .then(response =>{
                        this.listProducts = response.data.result
                    }).catch(error =>{
                        this.errors.push(error.response.data.errors)
                })
            },
            deleteProduct(product,index){
                this.errors = []
                this.notifications = []
                axios.delete ('/products/'+ product.Id)
                    .then(response => {
                        this.listProducts.splice(index, 1)
                        this.notifications.push(response.data.result)

                }).catch(error =>{
                    this.errors.push(error.response.data.errors)
                })
            },
            updateProductSelected (product) {
                this.product.id = product.Id;
                this.product.name = product.Name;
                this.product.title = product.Title;
                this.product.price = product.Price;
            },
            updateProduct(){

            }
        }
    }
</script>

<style scoped>
.error{
    color: red;
}
.notification{
    color: blue;
}
</style>
