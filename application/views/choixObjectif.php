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
	<?= form_open('RedirectingChoice/redirectObjectif')?>
    <div class="txt_field">
        <p>Je veux reduire mon poids</p>
		<input type="hidden" name="idObjectif" value="1">
		<button type="submit" >Reduire</button>
    </div>
	<?= form_close()?>
</div>
<div class="center" id="objectif">
    <div class="txt_field">
        <img src="<?php echo base_url("assets/images/images.jpg"); ?>">
    </div>
    <hr>
	<?= form_open('RedirectingChoice/redirectObjectif') ?>
    <div class="txt_field">
        <p>Je veux augmenter mon poids</p>
		<input type="hidden" name="idObjectif" value="2">
		<button type="submit" >Augmenter</button>
    </div>
	<?= form_close() ?>
</div>
</center>
