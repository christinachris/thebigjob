
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


    div.input{
        background-color: #FFFFFF;
        margin-top: 30px;
    }
    span.sentence{
        font-size: 20px;
    }
    .aside-list{
        list-style-type: none;
    }
    a.login{
        color:lightpink;
    }
</style>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="p-5 bg-white">
                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Login</h2>
                        </div>
                            <?= $this->Form->create(
                                null,
                                [
                                    'url' => [
                                        'controller' => 'Users',
                                        'action' => 'login',
                                        '?' => [
                                            'redirect' => $this->request->getQuery('redirect')
                                        ]
                                    ]
                                ]); ?>
                            <?= $this->Flash->render(); ?>
                            <fieldset>
                                <?= $this->Form->control('email',['label' => false,'class' => 'form-control','placeholder' => 'Email','tabindex' => '1','autofocus' => true]) ?>
                                <?= $this->Form->control('password',['type' => 'password','label' => false,'class' => 'form-control','placeholder' => 'Password','tabindex' => '2']) ?>

                            </fieldset>
                            <div class="cta-button"><?= $this->Html->link('Register an account',['action'=>'register'],['class'=>'login']);?></div>
                    </div>
                    <?= $this->Form->button('Login',['class'=>'btn btn-primary  py-2 px-4','tabindex' => '3']); ?>
                    <?= $this->Form->end(); ?>
                </div>
            </div>

            <div class="col-lg-4">


                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">By logging in, you will be able to:</h3>
                    <p><i class="fas fa-comment-dots"></i> Get free job tips</p>
                    <p><i class="fas fa-hand-holding-usd"></i> Apply for jobs</p>
                    <p><i class="fas fa-video"></i> Upload your video CV</p>
                    <p><i class="fas fa-user-graduate"></i></i> Book online coaching course</p>
                </div>
            </div>
        </div>
    </div>
</div>
