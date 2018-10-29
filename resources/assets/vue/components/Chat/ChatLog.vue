<template lang="html">
    <div id="chat-log" class="chat-log" style="height:100%">
        <chat-message v-for="message in messages" :message="message"></chat-message>
        <div class="empty" v-if="messages.length === 0">
            <p>لا توجد اي محادثة بعد</p>
            <p>كن أول من يبدأ المحادثة</p>

        </div>
    </div>
</template>

<script>
    export default {
        props:['messages'],
        updated:function(){
            var objDiv = document.getElementById("chat-log");

            objDiv.scrollTop = objDiv.scrollHeight;
        }
    }
</script>

<style  lang="css">
    .empty {
        padding: 1rem;

    }
    .empty >p{
        text-align: center;
        color:white
    }
    #chat-log{




        overflow-y: scroll;


    }
    #chat-log::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }


    #chat-log::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    #chat-log::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }
</style>