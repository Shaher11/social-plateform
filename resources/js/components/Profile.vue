<template>
 <div class="contact-profile" v-if="user.role_id == 2">
    <img  :src="developer ? developer.avatar : ''" alt="" />
    <p class="mt-3 mb-0" style="color:#2c3e50;">{{developer ? developer.user_name : 'Not Specified yet'}}</p>
    <a :href="'http://127.0.0.1:8000/orders/' +room.order_id" class="btn btn-sm float-right m-3 text-light" style="background-color: #d21e2b;">Order</a>
    
</div>
<div class="contact-profile" v-else>
    <img  :src="room.photo" alt="" />
    <p class="mt-3 mb-0" style="color:#2c3e50;">{{room.name}}</p>
    <a :href="'http://127.0.0.1:8000/orders/' +room.order_id" class="btn btn-sm float-right m-3 text-light" style="background-color: #d21e2b;">Order</a>
</div> 
</template>

<script>
export default {
    props: ["developer", "user", "room"],
    methods: {
    }
};
</script>