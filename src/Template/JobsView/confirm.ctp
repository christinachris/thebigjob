
<style>
        .cont{
            height: 700px;
        }

    .display-3{
        padding: 100px;
        color: #00bf00;
        text-align: center;
    }

    .div1{
        align-content: center;
    }



</style>
<div class="site-section bg-light">
    <div class="container" style="margin-bottom: 80px">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-5">
                <div class="p-5 bg-white">
                    <div class="mb-4 mb-md-5 mr-5">
                        <h1 class="display-3">Thank You!<br>&#10004;</br></h1>

                        <p class="lead">We appreciate your application. <strong>Your application has been sent.</strong> Wait for us to approve it!</p>
                        <hr>

                        <p class="lead">
                            <a><?= $this->Html->link(__('> Find out more fabulous jobs'), ['controller' => 'JobsView', 'action' => 'index']) ?></a>
                        </p>
                </div>
            </div>

        </div>
    </div>
</div>
