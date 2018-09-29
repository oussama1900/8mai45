<template>
    <div class="chat-composer">
        <input type="text" placeholder="Start typing your message.."  v-model="messageText" style="color: black;background-color: white;height:31px;" @keyup.enter="sendMessage"/>
        <a class="btn btn-primary" @click="sendMessage" style="height:58px;border-radius: 0px"><i class="fa fa-send-o"></i></a>

    </div>
</template>

<script>
    export default {
       data(){
           return{
               messageText:'',
               image:'',
               fullname :'',
           }
       },
        created:function(){
           var vm = this;
           axios.get('/api/getsomeinfo').then(function (response) {


               vm.image = response.data.image;
               vm.fullname = response.data.fullname;

            });
       },
        methods:{
           sendMessage(){
               if(this.messageText===''){

               }else{
                   this.$emit('messagesent',{
                       message:this.messageText,
                       username:this.fullname,
                      scout:{image : this.image} ,

                   });
                   this.messageText="";




               }

           },
        }
    }
</script>

<style scoped>
    .chat-composer{
        display:flex;
    }
    .chat-composer input{
        margin-bottom:0px;
        margin-top:0;
        border-top: 1px solid #9C9C9C;
        border-right: 1px solid #9C9C9C;
        border-left: 1px solid #9C9C9C;

        padding: 5px;
        padding-bottom:20px
    }

    .chat-composer a {

        margin:0;
         height:53px;
    }
    .chat-composer a > i {

        margin:15px;
        height:32px;
    }

</style>