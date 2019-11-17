<template>
    <div>
        <div class="router-button mb-2">
            <router-link :to="{ name: 'list-product' }">List product</router-link>
        </div>
        <hr/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Team
                </th>
                <th>
                    City
                </th>
                <th>
                    Nation
                </th>
            </tr>
            </thead>
            <tbody v-for="(item, index) in items" :key='index'>
            <tr>
                <td>{{ index+1 }}</td>
                <td>{{ item.team }}</td>
                <td>{{ item.city }}</td>
                <td>{{ item.nation }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                items: [
                    {'team': 'Arsenal', 'city': 'London', 'nation': 'England'},
                    {'team': 'Barcelona', 'city': 'Catalunya', 'nation': 'Spain'},
                    {'team': 'Real Madrid', 'city': 'Madrid', 'nation': 'Spain'},
                    {'team': 'Paris Saint Germain', 'city': 'Paris', 'nation': 'Franch'},
                    {'team': 'Manchester City', 'city': 'Manchester', 'nation': 'England'},
                ]
            }
        }
    }
</script>
<style type="text/css">
    tr > th {
        text-align: center !important;
    }
</style>
