<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<style>
    * {
        -moz-box-shadow:0 0 3px #cbcccf;
    }


    /* Float four columns side by side */
    .column1 {
        float: left;
        width: 50%;
        padding: 0 10px;
    }
    .column2 {
        float: left;
        width: 50%;
        padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }
    /* Style the counter cards */
    .card1 {
        padding: 16px;
        text-align: left;
        background-color: transparent;
        width: 100%;
        display: inline-block;
    }
    .card2 {
        padding: 16px;
        text-align: left;
        background-color: transparent;
        width: 100%;
        display: inline-block;
    }
    input{
        width:100%;
    }
    select{
        width: 100%;
    }
    label{
        font-size: 16px;
        font-weight: bold;
        width: 100%;
        color: #6b6b6b;
    }
    div.bt{
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    /*form {*/
        /*background: #ffffff;*/
        /*text-align: left;*/
        /*-webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);*/
        /*box-shadow: 2px 2px 3px rgba(0,0,0,0.1);*/
        /*padding: 30px;*/
    /*}*/
    div.input{
        background-color: #FFFFFF;
    }
    span.sentence{
        font-size: 20px;
    }

    h1 {
        text-align: center;
        font-family: Tahoma, Arial, sans-serif;
        color: #06D85F;

    }

    .box {
        width: auto;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        padding: 2px;
        border: 2px ;
        border-radius: 20px/50px;
        background-clip: padding-box;
        text-align: center;
    }

    .button {
        font-size: 1em;
        font-family: Arial, Helvetica, sans-serif;
        padding: 4px;
        color: #fff;
        border: 2px solid #a8a9ac;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease-out;
    }
    .button:hover {
        background: lightgrey;
    }

    .overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .popup {
        margin: 70px auto;
        padding: 20px;
        background: #fff;
        border-radius: 2px;
        width: 30%;
        position: relative;
        transition: all 5s ease-in-out;
    }

    .popup h2 {
        margin-top: 0;
        color: #333;
        font-family: Tahoma, Arial, sans-serif;
    }
    .popup .close {
        position: absolute;
        top: 20px;
        right: 30px;
        transition: all 200ms;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }
    .popup .close:hover {
        color: #06D85F;
    }
    .popup .content {
        max-height: 30%;
        overflow: auto;
    }
    .aside-list{
        list-style-type: none;
    }


</style>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="p-5 bg-white">
                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Create new account</h2>
                        </div>
                            <p><?= $this->Form->create($user)?>

                                <fieldset>
                                    <?php echo $this->Form->control('email');?>
                                    <?php echo $this->Form->control('username');?>
                                    <div class="input type" style="height: 70px; padding: auto">
                                        <label>User type</label>
                                        <?php echo $this->Form->select(
                                            'type',
                                            ['Candidate'=>'Candidate'
                                                , 'Employer'=>'Employer'
                                            ],
                                            ['empty' => '(Choose One)']);?>
                                    </div>
                                    <?php echo $this->Form->control('password');?> Between 8-25 characters
                                    <?php echo $this->Form->control('Confirm_password',['type'=>'password']);?>

                                    <div class="column1" style="margin-top: 20pt;width: 20%">
                                        <?php echo $this->Form->checkbox('check',['checked' => false,'hiddenField'=>'false','error' => [false => __('Please read and agree to continue.')]]);?>
                                    </div>
                                    <div class="column2" style="padding-top: 5%;width: 80%">
                                        I agree to the <a class="content" style="color: #2c353e;" href="#popup1">Terms and conditions</a>
                                    </div>
                                    <?php if(isset($errors))
                                    { ?>
                            <p style="color: red;text-align: center"><?php echo $errors; ?></p>
                            <?php } ?>


                            <div id="popup1" class="overlay">
                                <div class="popup">
                                    <h2>Terms and conditions</h2>
                                    <a class="close" href="#">&times;</a>
                                    <div class="content">
                                        Wait for client privacy terms and conditions to replace here.Wait for client privacy terms and conditions to replace here.
                                    </div>
                                </div>
                            </div>
                            </fieldset>

                            <div class="bt">
                                <?= $this->Form->button(__('Sign up'),['class'=>'btn btn-primary  py-2 px-4']) ?>
                            </div>

                        <?= $this->Html->link('Already have an acount? Click Here to Log In',['action'=>'login']);?>
                            <?= $this->Form->end() ?>
                            </p>


                </div>
            </div>

        </div>
            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">By creating an account, you will be able to:</h3>
                    <p><i class="fas fa-comment-dots"></i> Get free job tips</p>
                    <p><i class="fas fa-hand-holding-usd"></i> Apply for jobs</p>
                    <p><i class="fas fa-video"></i> Upload your video CV</p>
                    <p><i class="fas fa-user-graduate"></i></i> Book online coaching course</p>
                </div>
            </div>
    </div>
</div>




