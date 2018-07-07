<template>

<div class="container col-md-11 col-sm-11 col-xs-11 text-center card" style="background-color: transparent">
    <div class="row">
        <h1>استمارة</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="input-field col s12">
                <input id="champ1" type="text" data-length="10" style="height: 50px">
                <label for="champ1"><h4>champ1</h4></label>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-field col s12">
                <input id="champ2" type="text" data-length="10" style="height: 50px">
                <label for="champ2"><h4>champ2</h4></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-field col s12">
                <input id="champ3" type="text" data-length="10" style="height: 50px">
                <label for="champ3"><h4>champ3</h4></label>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="input-field col s12">
                <input id="champ4" type="text" data-length="10" style="height: 50px">
                <label for="champ4"><h4>champ4</h4></label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="input-field col s12">
                <input id="champ5" type="text" data-length="10" style="height: 50px">
                <label for="champ5"><h4>champ5</h4></label>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="input-field col s12">
                <input id="champ6" type="text" data-length="10" style="height: 50px">
                <label for="champ6"><h4>champ6</h4></label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <button type="button" class="btn btn-info" style="width: 100%">تطبيق</button>
        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-outline-info waves-effect" style="width: 100%">تعديل</button>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "NewForm"
    }
</script>

<style scoped>

    .card{
        margin-top:7%;
        margin-left: 75px;
        background-color: white;
    }

    .input-field{
        margin-top: 15px;
        margin-bottom: 0;
    }

    .btn{
        font-size: large;
    }

    .btn-outline-info  {
        border-color: #5bc0de;
        background-color: transparent;
        color: inherit;
        transition: all .5s;
    }


</style>