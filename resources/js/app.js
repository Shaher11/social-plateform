/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Echo } = require('laravel-echo');

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-moment'));
Vue.use(require('bootstrap-vue'));
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
Vue.component('chat-rooms', require('./components/ChatRooms.vue').default);
Vue.component('chat-profile', require('./components/Profile.vue').default);
// Vue.component('layout', require('./components/Layout.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#frame',

    data: {
        messages: [],
        unread_messages : [],
        rooms: [],
        room_selected: false,
        room: {},
        developer: {},
        error_file: "",
        current_page: 0,
        page_nums: 0,
        updateMessages: async function (message, callback) {
            await this.messages.push(message);
            callback();
           
        },
        updateRoom: async function (messages, callback) {
            messages.forEach(message => {
                this.messages.map(msg => {
                    if (msg.id == message.id) {
                        msg.status = message.status;
                        console.log(msg, message);
                    }
                });
            })
            callback();
        }
    },

    created() {
        this.fetchMyRooms();
    },

    methods: {
        fetchMessages(room) {
            axios.get('rooms/' + room.id + '/messages/').then(response => {
                this.messages = response.data.data;
                this.current_page = response.data.current_page;
                this.room = room;
                this.room_selected = true;
                console.log(this.messages);
                this.messages.sort((el1, el2) => {
                    return el1.id - el2.id
                });
                axios.get('rooms/' + room.id + '/developer').then(response => {
                    this.developer = response.data;
                });
            }).then(() => {
                this.updateScroll();
                document.getElementById("myForm").focus();
            });
            this.readMessage(room);
            var all_messages = room.messages;
            this.page_nums = Math.ceil(all_messages.length / 20);
        },

        fetchMoreMessages() {  
            this.current_page += 1;
            this.page_nums -= 1;
            axios.get('rooms/' + this.room.id + '/messages/?page=' + this.current_page).then(response => {
                var last_msg_id = this.messages[0].id + 'msg';
                var messages_new = this.messages.concat(response.data.data);
                messages_new.sort((el1, el2) => {
                    return el1.id - el2.id
                }); 
                this.messages = messages_new;
                document.getElementById(`${last_msg_id}`).scrollIntoView();
                this.current_page = response.data.current_page;
            });
        },

        fetchMyRooms() {
            axios.get('rooms').then(response => {
                this.rooms = response.data.rooms;
                this.rooms.forEach(async(room) => {
                    if (room.messages.length > 0) room.last_msg =room.messages.slice(-1)[0].created_at;
                    else room.last_msg = "";  
                });
            });
        },
        async addMessage(message) {
            // this.messages.push(message);S
            await axios.post('rooms/' + message.room_id + '/messages/', message).then(response => {
                this.messages.push(response.data); 
            });
            document.getElementById("myForm").focus();
            this.updateScroll();
        },
        readMessage(room) {
            if (Object.keys(room.unread_messages).length  != 0) {
                axios.post(`messages/${room.id}/read`).then(response => {
                    console.log(response.data);
                    var elem = document.getElementById('msg_nums')
                    if(elem != undefined) elem.remove();
                    
                });
            }
        },
        uploadFile(data) {
            var formData = new FormData();
            formData.append("name", data.file.name);
            formData.append("type", data.file.type);
            formData.append("path", data.file);
            axios.post('rooms/'+data.room.id+'/files', formData,{
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            }).then(response => {
              this.messages.push(response.data);
            }).catch(e => {
                if (e.response.status == 413) {
                    this.error_file = "Your File Size is larger than 25MB";
                }
            }).then(() => {
                this.updateScroll()
                $("#progre").addClass("d-none")
            });
        },
        updateScroll(){
            var element = document.getElementById("msg_his");
            element.scrollTop = element.scrollHeight;
        }

    }

});