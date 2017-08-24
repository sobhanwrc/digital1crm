<html>
    <head>
        <title>Twilio</title>
    </head>
    <body>
        <?php
        $msg = $this->session->flashdata('succ_msg');
        if(!empty($msg)){
        ?>
        <div>
            <?php
            
            echo  $msg;
            ?>
        </div>
        <?php }?>
        <form action="<?php echo base_url();?>twilio/test" method="post">
            <label>Phone number:</label>
            <input type="text" value="" name="ph"/>
            <input type="submit" name="submit" value="submit"/>
        </form>
    </body>
</html>