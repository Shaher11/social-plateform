<template>
      <ul id="room_ul_sl">
        <li class="contact" 
          @click="clicked($event, room)"
          v-for="room in rooms"
          :key="room.id"
        >

            <div class="wrap">
                <i v-if="room.order.latest_order_status == 'pending'" class="fa fa-spinner" style="font-size:34px;"></i>
                <i v-else-if="room.order.latest_order_status == 'processing'" class="fa fa-cogs" style="font-size:34px;" ></i>
                <i v-else-if="room.order.latest_order_status == 'cancelled'" class="fa fa-close" style="font-size:34px;" ></i>
                <i v-else-if="room.order.latest_order_status == 'finished'" class="fa fa-check" style="font-size:34px;" ></i>
                <i v-else-if="room.order.latest_order_status == 'need_details'" class="fa fa-bell-o" style="font-size:34px;" ></i>
                <div class="meta">
                     <h5 class="name text-light d-inline" id="par_room">
                        {{ room.name }} 
                        <h5 v-if="Object.keys(room.unread_messages).length  != 0" id="msg_nums" class="d-inline" style="font-size: 14px; color:#ffffff; background-color:#d2232b; padding: 1px 5px; border-radius: 50%;">{{  Object.keys(room.unread_messages).length  }}</h5>   
                        <h5  class="d-inline" style="font-size: 14px; color:#999; " >{{ room.last_msg | moment("from", "now", true) }}</h5>
                    </h5>
                    
                    <p class="preview">status: {{room.order.latest_order_status}} {{room.order.delivered_at != null? "Time: " + room.order.delivered_at : "Time: not-specified"}}</p>
                </div>
            </div>
        </li>
      </ul>
</template>

<script>
export default {
    props: ["rooms", "message", "user"],

     async mounted(){
       await setTimeout(function(){ 
            var elem = $("#room_ul_sl")[0]
            // console.log($("ul#room_ul_sl")[0].children.get(0));
            elem.click();
           
        }, 100);
        // $("#room_select")[0].addClass("active");
        
    },
    methods: {
        clicked(event, room) {
            this.$emit("clicked", room);
            // this.$emit("updateroom", room)
            var elems = document.querySelectorAll(".selectedRoom");
            [].forEach.call(elems, function(el) {
                el.classList.remove("selectedRoom");
            });
            // event.target.classList.add("selectedRoom");
            $(event.target).closest('li').addClass("selectedRoom");
        }
    }
};
</script>
