<template>
    <div>
        <div>
            Name: {{ person.name }}
        </div>
        <div>
            Nick name: {{ person.nickname }}
        </div>
        <div>
            <button @click="changeName">Change Name</button>
        </div>
        <div>
            <button @click="changeNickname">Change Nick Name</button>
        </div>
        <div>
            <button @click="changeNicknameProperly">Change NIck name properly</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                person: {
                    name: 'Edson'

                }
            }
        },
        methods: {
            changeName() {
                this.person.name = 'Arantes';
            },
            // khong update data theo method nay vi nickname se khong phai la relative data
            changeNickname() {
                this.person.nickname = Math.random().toString(36).substring(7);
                this.$forceUpdate()
            },
            changeNicknameProperly() {
                Vue.set(this.person, 'nickname', 'Louis');
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>
