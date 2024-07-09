<style>
    #banner-img{
        height: 85vh;
        object-fit: cover;
        object-position: center center;
        width: 100%;
        position: relative; /* Add this */
        border-radius: 5px;
    }
    #banner-text{
        position: absolute; /* Add this */
        top: 50%; /* Add this */
        left: 50%; /* Add this */
        transform: translate(-50%, -50%); /* Add this */
        text-align: center; /* Add this */
        color: white; /* Add this, adjust the color as needed */
        background-color: rgba(0, 0, 0, 0.5);
        padding: 30px; /* Add some padding around the text */
        border: 2px solid #000; /* Add a 2px black border */
        border-radius: 5px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <img src="<?= validate_image($_settings->info('cover'))?>" alt="Website Page" id="banner-img" class="img-fluid">
        <h1 id="banner-text">Welcome <?php echo ucwords($_settings->userdata('firstname').' '.$_settings->userdata('lastname')) ?> To <?php echo ucwords($_settings->info('name'))?></h1>
        
    </div>
</div>