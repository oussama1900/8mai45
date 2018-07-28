<template>
    <div class="chat-message" >

        <div  class="message">
        <div class="row" >
            <div class="col-sm-2" style="top: 20%;">  <img class="img-circle" src="images/governor.jpg" width="40" height="40"/></div>
            <div class="col-ms-9" style="top: 0px;padding-right: 0px;padding-left: 0px;">
                <div  class="card" style="  border-radius:15px;margin-right:12px">
                <p style="color: black;padding-right:5px;padding-left: 5px">{{message.message}}</p>
            </div>
            </div>

            <div  style="margin-top:-25px;float:right;margin-right:15px">
                <p style="color: white;font-size:xx-small;">{{message.username}}</p>
            </div>


        </div>
        </div>

    </div>
</template>

<script>
    export default {
        props:['message'],


    }

</script>

<style scoped>
    .chat-message{
        padding-bottom: 1.5rem;
        padding-left:5px;
        padding-right:5px;
        padding-top:10px
    }
    .chat-message .message .row .col-md-4 .card > p {
        margin-bottom: 0;
        padding-left: 10px;
        padding-right: 5px;
    }
    .chat-message  .message.row >div .card{
        margin-top: 0px;
        margin-bottom: 0px;

    }
</style>