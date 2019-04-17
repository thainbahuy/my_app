<!--<template>-->
<!--   <div>-->
<!--       <p>Hello chris nguyen</p>-->
<!--   </div>-->
<!--</template>-->
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ message }}</div>

                    <div class="card-body">
                        Hello Chris Nguyen.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        data(){
            return{
                message : 'bin du lieu'
            }
        }
    }
</script>
<style scoped>
.card-header{
    color: red;
}
</style>
