<template>

 <div class="messages" id="msg_his" style="overflow-y: auto; width:100%; background-color:#e6e6e6;">
    <ul>
        <li v-if="pagenums > 1">
            <center>
                <p 
                    @click="fetchmore" 
                    style="cursor:pointer; float:none; background-color: #c9cacc;color: #485e78;width: 150px;text-align: center; font-size:14px; font-weight:bold;"
                    class="mb-0 mr-0 ml-0"
                    >Show more
                </p>
            </center>
        </li>
        <div v-for="message in messages" :key="message.id">
             <li :id="message.id + 'msg'" v-if="user.id !== message.user.id" class="sent">
                <h5 style="font-size: 0.9rem;">{{ message.user.user_name }}</h5>
                <img :src="message.user.avatar" alt="" />
                 <p v-if="!message.file" class="mb-0" style="word-break: break-all">{{ message.message }}
                      <span class="time_date">
                    {{
                        message.created_at | moment("from", "now", true)
                    }}
                ago</span>
                 </p>
                 <div v-else-if="message.file.type.includes('image')"  >
                    <p style="min-width:280px;word-break: break-all;" class="m-0">
                    <a :href="message.file.path" class="mb-0 text-primary" target="_blank" style=" text-decoration:underline;"> {{message.file.name}}  </a>
                    <img @click="showModal(message.id)" :src="message.file.path" :alt="message.file.name"  class="circular--landscape mr-0 ml-0" id="sent_img" @load="onImageLoad"/>
                        <span class="time_date">
                            {{ message.created_at | moment("from", "now", true)}} ago
                        </span>
                    </p>
               </div>
               <div v-else-if="message.file.type.includes('audio')"  >
                   audio/mpeg
                    <p style="min-width:280px;word-break: break-all" class="m-0">
                    <a :href="message.file.path" class="mb-0 text-primary" target="_blank" style=" text-decoration:underline;"> {{message.file.name + message.file.type}}  </a>
                    <audio controls>
                        <source :src="message.file.path" type="audio/ogg">
                        Your browser does not support the audio element.
                    </audio>
                        <span class="time_date">
                            {{ message.created_at | moment("from", "now", true)}} ago
                        </span>
                    </p>
               </div>
                <div v-else-if="message.file.type.includes('video')"  >
                   audio/mpeg
                    <p style="min-width:280px;word-break: break-all;" class="m-0">
                    <a :href="message.file.path" class="mb-0 text-primary" target="_blank" style=" text-decoration:underline;"> {{message.file.name + message.file.type}}  </a>
                   <video controls>
                        <source :src="message.file.path" type="video/ogg">
                        <source :src="message.file.path" type="video/mp4">
                        Your browser does not support the audio element.
                    </video>
                        <span class="time_date">
                            {{ message.created_at | moment("from", "now", true)}} ago
                        </span>
                    </p>
               </div>
               <p  v-else-if="message.file.type.includes('pdf')" class="m-0">
                    <a :href="message.file.path" class="mb-0" target="_blank"> <i class="fa fa-file-pdf-o fa-2x mr-2"></i> {{message.file.name}}  </a>
                    <span class="time_date">
                        {{ message.created_at | moment("from", "now", true)}} ago
                    </span>
               </p>
               <p  v-else-if="message.file.type.includes('text')" class="m-0">
                    <a :href="message.file.path" class="mb-0" target="_blank">  <i class="fa fa-file-word-o fa-2x mr-2"></i>{{message.file.name}}  </a>
                    <span class="time_date">
                        {{ message.created_at | moment("from", "now", true)}} ago
                    </span>
               </p>

               <p v-else>
                <a :href="message.file.path" target="_blank" class="mb-0" style="width: 20%;
                    text-align: center; padding: 3px;margin: 4px;border-radius: 20px;"> <i class="fa fa-file-o fa-2x mr-2"></i>{{message.file.name}} 
                     <span class="time_date">
                    {{
                        message.created_at | moment("from", "now", true)
                    }}
                ago</span>
                 </a>
               </p>
                <!-- <p>{{ message.message }}</p> -->
               
            </li>
            <!-- ============================================== Sent ================================= -->
            <li v-else class="replies"  :id="message.id + 'msg'">
                <img :src="message.user.avatar" alt="" />
                <p v-if="!message.file" class="mb-0" style="word-break: break-all;" >{{ message.message }} 
                <span class="time_sent">
                    {{
                        message.created_at | moment("from", "now", true)
                    }}
                ago
                    <i v-if="message.status == 'read' " class="fa fa-check d-block" style="font-size: 0.7rem; margin-top:5px; color:#38c172; float:left; margin-right:10px;"></i>
                    <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light" style="font-size: 0.7rem; margin-top:5px; float:left; margin-right:10px;"></i>

                </span>
                </p>

                <div v-else-if="message.file.type.includes('image')"  >
                    <p style="min-width:280px;word-break: break-all;" class="mb-0">
                    <a :href="message.file.path" class="mb-0 text-primary" target="_blank" style=" text-decoration:underline;"> {{message.file.name}}  </a>
                    <img @click="showModal(message.id)" :src="message.file.path" :alt="message.file.name"  class="circular--landscape mr-0 ml-0" id="sent_img" @load="onImageLoad"/>
                        <span class="time_sent mt-0">
                            {{ message.created_at | moment("from", "now", true)}} ago
                            <i v-if="message.status == 'read' " class="fa fa-check" style="font-size: 0.7rem; margin-top:5px; color:#38c172;  margin-right: 10px; float:left;"></i>
                            <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light " style="font-size: 0.7rem; margin-top:5px;  margin-right: 10px; float:left;"></i>
                        </span>
                    </p>
                </div>
                <div v-else-if="message.file.type.includes('audio')"  >
                    <p style="width:80%;word-break: break-all;" class="mb-0">
                    <a :href="message.file.path" class="mb-0 text-primary" target="_blank" style=" text-decoration:underline;"> {{message.file.name + message.file.type}}  </a>
                    <audio controls>
                        <source :src="message.file.path" type="audio/ogg">
                        <source :src="message.file.path" type="audio/mp4">
                        Your browser does not support the audio element.
                    </audio>
                        <span class="time_sent mt-0">
                            {{ message.created_at | moment("from", "now", true)}} ago
                        <i v-if="message.status == 'read' " class="fa fa-check" style="font-size: 0.7rem; margin-top:5px; color:#38c172;  margin-right: 10px; float:left;"></i>
                        <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light " style="font-size: 0.7rem; margin-top:5px;  margin-right: 10px; float:left;"></i>

                        </span>
                    </p>
               </div>
               <div v-else-if="message.file.type.includes('video')" >
                    <p style="width:80%; word-break: break-all" class="mb-0">
                    <a :href="message.file.path" class="mb-0 text-primary" target="_blank" style=" text-decoration:underline;"> {{message.file.name + message.file.type}}  </a>
                    <video controls>
                        <source :src="message.file.path" type="video/ogg">
                        <source :src="message.file.path" type="video/mp4">
                        Your browser does not support the audio element.
                    </video>
                        <span class="time_sent mt-0">
                            {{ message.created_at | moment("from", "now", true)}} ago
                            <i v-if="message.status == 'read' " class="fa fa-check" style="font-size: 0.7rem; margin-top:5px; color:#38c172;  margin-right: 10px; float:left;"></i>
                            <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light " style="font-size: 0.7rem; margin-top:5px;  margin-right: 10px; float:left;"></i>

                        </span>
                    </p>
               </div>
                <p  v-else-if="message.file.type.includes('pdf')" class="mb-0">
                    <a :href="message.file.path" class="mb-0" target="_blank" style="float:left; margin-right:4.8rem;"> <i class="fa fa-file-pdf-o fa-2x mt-2" style="margin-right:5px;"></i> {{message.file.name}} </a>
                    <span class="time_sent mt-0">
                        {{ message.created_at | moment("from", "now", true)}} ago
                        <i v-if="message.status == 'read' " class="fa fa-check" style="font-size: 0.7rem; margin-top:5px; color:#38c172;  margin-right: 10px; float:left;"></i>
                        <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light " style="font-size: 0.7rem; margin-top:5px;  margin-right: 10px; float:left;"></i>
                    </span>
               </p>
               <p  v-else-if="message.file.type.includes('text')" class="mb-0">
                    <a :href="message.file.path" class="mb-0 d-block" target="_blank" style="float:left; margin-right:4.8rem;"> <i class="fa fa-file-word-o fa-2x mt-2" style="margin-right:5px;"></i> {{message.file.name}} </a>
                    <span class="time_sent mt-0">
                        {{ message.created_at | moment("from", "now", true)}} ago
                        <i v-if="message.status == 'read' " class="fa fa-check" style="font-size: 0.7rem; margin-top:5px; color:#38c172;  margin-right: 10px; float:left;"></i>
                        <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light " style="font-size: 0.7rem; margin-top:5px;  margin-right: 10px; float:left;"></i>
                    </span>
               </p>
               <p v-else class="mb-0">
                <a  :href="message.file.path" target="_blank" class="mb-0 ml-0" style="float:left; margin-right:4.8rem;"><i class="fa fa-file-o fa-2x mt-2" style="margin-right:5px;"></i> {{message.file.name}} </a>
                    <span class="time_sent mt-0">
                            {{
                                message.created_at | moment("from", "now", true)
                            }}
                        ago
                        <i v-if="message.status == 'read' " class="fa fa-check d-block" style="font-size: 0.7rem; margin-top:5px; color:#38c172;  margin-right: 10px; float:left;"></i>
                        <i v-else-if="message.status == 'sent' " id="sent_msg" class="fa fa-check text-light" style="font-size: 0.7rem; margin-top:5px; margin-right: 10px; float:left;"></i>
                    </span> 
                                
               </p>
            </li>

            <b-modal  v-if=" message.file && message.file.type.includes('image')"
                :id="message.id + 'mod'" 
                :title="message.file.name"
                header-class="text-header_modal"
                hide-footer
                body-class="bg_modal_color"
            >
            
            <img :src="message.file.path" :alt="message.file.name"  class=" " style="width: 100% !important; max-height:500px;"/>
            </b-modal>
        </div>    
    </ul>
    </div>
</template>

<style  scoped>
/deep/ .close {
    font-size: 30px;
    color: red;
}
/deep/ .text-header_modal  {
    padding: 4px 16px;
    border: 0;
}
/deep/ .text-header_modal h5 {
    font-size: 15px;
    padding-top: 3px;
}
/deep/ .bg_modal_color{
    background-color: #364f6b;
}
/deep/ .modal-backdrop{
    opacity: 0.56;
}
</style>

<script>
export default {
    props: ["messages", "user", "update", "room", "updateroom", "readmessage","fetchmore", "pagenums"],
    data () {
        return {
            isLoaded : false,
            show:false,
        };
    },

    methods: {
        onImageLoad (){
            this.isLoaded = true;
            var element = document.getElementById("msg_his");
            element.scrollTop = element.scrollHeight
        },
        showModal (id) {
            this.$bvModal.show(id + 'mod')
        }
    },
    mounted() {
        Echo.join(`room.${this.room.id}`).listen(".MessageSent", msg => {
            
            this.update(msg.message,() => {
                var elem = document.getElementById('msg_his');
                elem.scrollTop = elem.scrollHeight;
                this.readmessage(this.room);

                // var num_ms = document.getElementById("msg_nums")
                // if(Object.keys(room.unread_messages).length != 0){
                //     num_ms.text = Object.keys(room.unread_messages).length
                // }
            });
            // this.readmessage(this.room);
        }).listen(".MessageSeen", msg => {

            this.updateroom(msg.messages, () => {
                // console.log(elem);
                // var elem = document.querySelectorAll("#sent_msg");
                // while(elem !== undefined) {elem.style.color = "#38c172"};
            });
        })
    },
};
</script>
