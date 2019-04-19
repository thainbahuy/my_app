<template>
    <div class="user-dashboard">
       <div class="list-user-comp">
           <!-- Listen event 'userSelected' emitted from child and process it using 'childrenSelectUser' -->
            <!--@<Tên sự kiện của con gửi lên>=<Hàm xử lý ở cha>-->
           <ListUser @userSelected = "childrenSelectUser"></ListUser>
       </div>
        <div class="user-detail-comp">
            <!-- pass param 'userSelectedFromChild', child will use props 'userDetailInfo' -->
            <UserDetail :userDetailInfo="userSelectedFromChild"></UserDetail>
        </div>
    </div>
</template>

<script>
    import ListUser from './ListUser.vue'
    import UserDetail from './UserDetail.vue'
    export default {
        components : {
            ListUser,
            UserDetail
        },
        data(){
            return {
                userSelectedFromChild: {}
            }
        },
        methods : {
            childrenSelectUser (user){
                console.log(user)
                this.userSelectedFromChild = user
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>
