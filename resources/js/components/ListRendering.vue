<!--<template>-->
<!--    <div class="list-rendering">-->
<!--        <ul>-->
<!--            <li v-for="(food,index) in foods">{{food.name}} at {{index}}</li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        data(){-->
<!--            return{-->
<!--                foods :[-->
<!--                    { name: 'Hamburger' },-->
<!--                    { name: 'Sandwich' },-->
<!--                    { name: 'Chicken chop' },-->
<!--                ]-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->


<!--<template>-->
<!--    <div class="list-rendering">-->
<!--        <ul>-->
<!--            <li v-for="(item,index) of myInfo">-->
<!--                {{ item }} {{index}}-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</template>-->

<!--<script>-->
<!--    export default {-->
<!--        data() {-->
<!--            return {-->
<!--                myInfo: {-->
<!--                    name: 'Mai Trung Duc',-->
<!--                    age: '2x',-->
<!--                    country: 'vietnam'-->
<!--                }-->
<!--            }-->
<!--        }-->
<!--    }-->
<!--</script>-->

<template>
    <ul >
        <li v-for="todo in todos" :key="todo.id">
            {{ todo }}
        </li>
    </ul>
</template>

<script>
    export default {
        data() {
            return {
               todos: [
                   {
                       name : 'learn laravel',
                       isComplete : true
                   },
                   {
                       name : 'learn VueJs',
                       isComplete : false
                   },
                   {
                       name : 'learn Git',
                       isComplete : false
                   },
               ]
            }
        }
    }
</script>
<style scoped>

</style>
