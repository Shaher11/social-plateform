<template>
    <div class="wrap">
      <span v-if="error" id="error_msg" class="text-danger"><i class="fa fa-exclamation-circle ml-2"></i>{{ error }}</span>
      <b-progress-bar  id="progre" class="d-none w-100" :value="uploadPercentage" variant="danger" label="Loading" :max="100" show-progress animated></b-progress-bar>

      <input 
        v-if="!file" 
        type="text" 
        placeholder="Write your message..."
        name="message"
        v-model="newMessage"
        @keyup.enter="sendMessage"
        max="100"
        id="myForm"
         />
      <div id="fileName" class="d-inline" style="padding: 11px 32px 10px 20px;" v-else>{{file.name}}<a @click="nullFile"><i class="fa fa-times-circle text-danger"></i></a></div>
      <a @click="onPickFile"><i class="fa fa-paperclip attachment" aria-hidden="true"></i></a>
      <button class="submit" @click="sendMessage"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      <input
        type="file"
        style="display: none;"
        ref="fileInput"
        accept="file/*"
        @change="onFilePicked"
        />
    </div>
</template>

<script>
export default {
  props: ["user", "room","error",],
  data() {
    return {
      newMessage: "",
      file: null,
      uploadPercentage: 0
    };
  },
  methods: {
    sendMessage() {
      $("#submit_form_button").click(function(){        
        $("#myForm").submit();
       
      });
      if (this.newMessage !== "") {
        this.$emit("messagesent", {
          user: this.user,
          message: this.newMessage,
          room_id: this.room.id,
          room: this.room,
          created_at: Date.now(),
        });
      }
      else if(this.file)
      {
        $("#progre").removeClass("d-none");

        this.$emit('fileuploaded', {
          user: this.user,
          room: this.room,
          file: this.file
        })
        this.file = null
      }
      this.newMessage = ''
    },
    onPickFile () {
      this.$refs.fileInput.value = null;
      this.$refs.fileInput.click();
      if(document.getElementById("error_msg")) document.getElementById("error_msg").innerText ="";
    },
    nullFile () {
      this.file = null;
      this.newMessage = ''
    },
    onFilePicked (event) {

      const files = event.target.files
      let filename = files[0].name
      this.file = files[0];
      console.log(event);
    }
  },
};
</script>