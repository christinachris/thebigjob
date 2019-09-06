<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<style>
    * {
        -moz-box-shadow:0 0 3px #cbcccf;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
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

    form {
        background: #ffffff;
        text-align: left;
        -webkit-box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
        box-shadow: 2px 2px 3px rgba(0,0,0,0.1);
        padding: 30px;
    }
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

<h2>Create new account</h2>

<div class="row">
    <div class="column1">
        <div class="card1">
            <p><?= $this->Form->create($employer)?>

                <fieldset>
                    <?php echo $this->Form->control('company_name');?>
                    <?php echo $this->Form->control('about');?>
                    <?php echo $this->Form->control('email');?>
                    <?php echo $this->Form->control('contact_no');?>
                    <?php echo $this->Form->control('web_url');?>
                    <?php echo $this->Form->control('location');?>
                    <?php echo $this->Form->control('industry');?>
                </fieldset>
            <div class="bt">
                <?= $this->Form->button(__('Submit')) ?>
            </div>

            <?= $this->Form->end() ?>
            </p>
        </div>

        <div class="back"><?= $this->Html->link('Back',['action'=>'']);?></div>
    </div>
    <div class="column2">
        <div class="card2">

            <ul class="aside-list">
                <h2 class="aside-title">By filling in your profile, you will be able to:</h2>
                <li id="aside-item1">
                    <span class="sentence"><i class="fas fa-comment-dots"></i>Post jobs</span>
                </li>
                <li id="aside-item2">
                    <span class="sentence"><i class="fas fa-hand-holding-usd"></i>Get recruitment consultation</span>
                </li>
                <li id="aside-item3">
                    <span class="sentence"><i class="fas fa-video"></i>Hire great employees</span>
                </li>
            </ul>
        </div>
    </div>
</div>




