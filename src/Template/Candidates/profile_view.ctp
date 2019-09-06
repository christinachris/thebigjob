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

<div class="animated fadeIn">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Your profile</strong>
                    <button><?= $this->Html->link('Edit profile', ['controller' => 'Candidates','action'=>'profile_edit',$this->request->getSession()->read('Auth.User.id')]) ?></button>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered ">
                        <tr>
                            <td style="width: 30%">First Name:</td>
                            <td><?php echo $candidate->first_name; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Last Name:</td>
                            <td><?php echo $candidate->last_name; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Email</td>
                            <td><?php echo $candidate->email; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Phone:</td>
                            <td><?php echo $candidate->phone_no; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">State:</td>
                            <td><?php echo $candidate->state; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Country:</td>
                            <td><?php echo $candidate->country; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">CV:</td>
                            <td><?= $this->Html->link('View CV', $candidate->postpath, ['class' => 'btn btn-info btn-sm', 'style' => 'margin-top:10px']); ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Your Skills:</td>
                            <td><?php for($i=0;$i<sizeof($candidate->skills);$i++){ ?>
                                <p><?php echo $candidate->skills[$i]->skill_name;?></p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Your Qualifications:</td>
                            <td>
                                <table style="border: 1px">
                                    <tr>
                                        <th>Degree Name</th>
                                        <th>Degree Level</th>
                                        <th>Expected Graduation Date</th>
                                        <th>GPA</th>
                                        <th>Major</th>
                                        <th>Institution</th>
                                    </tr>
                                    <?php for($i=0;$i<sizeof($candidate->qualifications);$i++){ ?>
                                    <tr>
                                        <td><?php echo $candidate->qualifications[$i]->degree_name ?></td>
                                        <td><?php echo $candidate->qualifications[$i]->degree_level ?></td>
                                        <td><?php echo $candidate->qualifications[$i]->expected_graduation_date ?></td>
                                        <td><?php echo $candidate->qualifications[$i]->gpa; ?></td>
                                        <td><?php echo $candidate->qualifications[$i]->major; ?></td>
                                        <td><?php echo $candidate->qualifications[$i]->institution; ?></td>
                                    </tr>
                                    <?php } ?>
                                </table>

                            </td>
                        </tr>

                        <tr>
                            <td style="width: 30%">Your Job History:</td>
                            <td>
                                <table style="border: 1px">
                                    <tr>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Job Description</th>
                                        <th>Date start</th>
                                        <th>Date finish</th>
                                    </tr>
                                    <?php for($i=0;$i<sizeof($candidate->job_histories);$i++){ ?>
                                    <tr>
                                        <td><?php echo $candidate->job_histories[$i]->title ?></td>
                                        <td><?php echo $candidate->job_histories[$i]->company ?></td>
                                        <td><?php echo $candidate->job_histories[$i]->job_description ?></td>
                                        <td><?php echo $candidate->job_histories[$i]->date_start; ?></td>
                                        <td><?php echo $candidate->job_histories[$i]->date_finish; ?></td>
                                    </tr>
                                    <?php } ?>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td>Your video:</td>
                            <td><iframe width="450" height="300" src="<?php echo $candidate->link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

