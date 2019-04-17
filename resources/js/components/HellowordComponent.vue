
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ message.type }}</div>

                    <div class="card-body">
                        Hello Chris Nguyen.
                        <button @click="changeMessage()">Click to see magic</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: {
                    type : 'greeting',
                    text : 'how are you ?'
                }
            }
        },
        methods : {
            changeMessage()
            {
                this.message.type = 'have nice day'
            }
        },
        watch : {
           message : {
                handler :function () {
                    console.log('something change')
                },
               deep :true
            }
        }
    }
</script>
<style scoped>
.card-header{
    color: red;
}
</style>
