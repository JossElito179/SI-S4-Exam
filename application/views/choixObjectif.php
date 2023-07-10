<style>
#objectif{
    display: inline-block;
    border: solid;
    margin: 100px;
    padding: 25px;
    width: fit-content;
    height: fit-content;
    border-radius: 10%;
}

p{
font-size: 15px;
}

button{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #243b55;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
    text-align: center;
}

a:hover{
    text-decoration: none;
    color: white;
}
</style>


<center>
<div class="center" id="objectif">
    <div class="txt_field">
        <img src="<?php echo base_url("assets/images/images.jpg"); ?>">
    </div>
    <hr>
    <div class="txt_field">
        <p>Je veux reduire mon poids</p>
        <a href=""><button>Reduire</button></a>
    </div>
</div>
<div class="center" id="objectif">
    <div class="txt_field">
        <img src="<?php echo base_url("assets/images/images.jpg"); ?>">
    </div>
    <hr>
    <div class="txt_field">
        <p>Je veux augmenter mon poids</p>
        <a href=""><button>Augmenter</button></a>
    </div>
</div>
</center>