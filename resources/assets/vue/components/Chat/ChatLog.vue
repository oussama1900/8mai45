<template lang="html">
    <div class="chat-log" >
        <chat-message v-for="message in messages" :message="message"></chat-message>
        <div class="empty" v-if="messages.length === 0">
            <p>لا توجد اي محادثة بعد</p>
            <p>ابدأ واحدة</p>

        </div>
    </div>
</template>

<script>
    export default {
        props:['messages']
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
</style>