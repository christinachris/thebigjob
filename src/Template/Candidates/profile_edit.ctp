
<?php use Cake\I18n\Time;
use \Cake\I18n\FrozenTime;
?>



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

    .ct{
        margin-top: 20px;
    }

</style>

<div class="site-section bg-light">
    <div class="container">

        <div class="p-5 bg-white">
            <div class="mb-4 mb-md-5 mr-5">
                <div class="job-post-item-header d-flex align-items-center">
                    <?= $this->Flash->render(); ?>
                    <h2 class="mr-3 text-black h4">Create your profile</h2>
                </div>
                <p><?= $this->Form->create($candidate,['enctype'=>'multipart/form-data'
                    ])?>

                <fieldset>
                    <?php $dateObject = \Cake\Database\Type::build('date')->marshal($candidate->created);
                    ?>
                    <?php echo $this->Form->control('first_name',['required'=>true,'label'=>'* FIRST NAME:']);?>
                    <?php echo $this->Form->control('last_name',['required'=>true,'label'=>'* LAST NAME:']);?>
                    <?php echo $this->Form->control('email',['required'=>true,'label'=>'* EMAIL:']);?>
                    <?php echo $this->Form->control('phone_no',['required'=>true,'label'=>'* PHONE']);?>
                    <?php echo $this->Form->control('state',['required'=>false,'label'=>'STATE:']);?>
                    <?php echo $this->Form->control('country',['required'=>false,'label'=>'COUNTRY:']);?>
                <?php echo $this->Form->control('link',['required'=>false,'label'=>'YOUR YOUTUBE EMBED LINK:']);?>
                <p>eg: https://www.youtube.com/embed/xxxxxx</p>
                    <label class="ct" for="ct">Upload personal CV</label>
                    <td><?= $this->Html->link('View CV', $candidate->postpath, ['class' => 'btn btn-info btn-sm', 'style' => 'margin-top:10px']); ?></td>
                    <?php echo $this->Form->file('file',['class'=>'form-control']);?>
                </fieldset>
                <div style="margin-top: 4%">
                    <label>Your skills:</label>
                    <table id="dynamic_field">
                        <?php for($i=0;$i<sizeof($candidate->skills);$i++) { ?>
                            <tr id="row<?php echo $i ?>">
                                <td><?php echo $this->Form->control('Skills.'. $i . '.name', ['value' => $candidate->skills[$i]->skill_name,'required'=>true,'label'=>false,'placeholder' => 'Enter your skill name', 'class' => 'form-control']) ?></td>
                                <td><br>
                                    <button style="margin-left:50%;" type="button" name="remove"
                                            id=<?php echo $i ?> class=" btn_remove btn btn-danger
                                            btn-elevate btn-pill btn-sm
                                    ">Delete
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <button type="button" name="add" id="add"
                        class="btn btn-primary">Add More
                </button>

                <div style="margin-top: 4%">
                    <label>Your Job Histories:</label>

                    <table id="dynamic_field2">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span class="form-text text-muted">Please enter the start time.</span></td>
                            <td><span class="form-text text-muted">Please enter the finish time.</span></td>
                        </tr>
                        <?php for($i=0;$i<sizeof($candidate->job_histories);$i++) { ?>
                            <tr id="row2<?php echo $i ?>">
                                <td><?php echo $this->Form->control('Job.'. $i . '.title', ['value'=>$candidate->job_histories[$i]->title,'required'=>true,'label'=>false,'placeholder' => 'Job Title', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Job.'. $i . '.company', ['value'=>$candidate->job_histories[$i]->company,'required'=>true,'label'=>false,'placeholder' => 'Company', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Job.'. $i . '.desc', ['value'=>$candidate->job_histories[$i]->job_description,'required'=>false,'label'=>false,'placeholder' => 'Description', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Job.'. $i . '.start', [ 'value'=>$candidate->job_histories[$i]->date_start->i18nFormat('yyyy-MM-dd'),'required'=>true,
                                        'label'=>false,'type'=>'date','placeholder' => 'start Time', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Job.'. $i . '.finish', ['value'=>$candidate->job_histories[$i]->date_finish->i18nFormat('yyyy-MM-dd'),'required'=>false,'type'=>'date','label'=>false,'placeholder' => 'End Time', 'class' => 'form-control']) ?></td>
                                <td><button style="margin-left:50%;"  type="button" name="remove"
                                            id=<?php echo $i ?> class=" btnremove2 btn btn-danger
                                            btn-elevate btn-pill btn-sm
                                    ">Delete
                                    </button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <button type="button" name="add" id="add2"
                        class="btn btn-primary">Add More
                </button>

                <div style="margin-top: 4%">
                    <label>Your Qualifications:</label>
                    <table id="dynamic_field3">
                        <tr>
                            <td></td>
                            <td></td>
                            <td><span class="form-text text-muted">Please enter the Expected Graduation Date.</span></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <!--<?php var_dump($candidate);?>-->
                        <?php for($i=0;$i<sizeof($candidate->qualifications);$i++) { ?>
                            <tr id="row3<?php echo $i ?>">
                                <td><?php echo $this->Form->control('Qua.'. $i . '.degree_name', ['value'=>$candidate->qualifications[$i]->degree_name,'required'=>true,'label'=>false,'placeholder' => 'Degree Name', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Qua.'. $i . '.degree_level', ['value'=>$candidate->qualifications[$i]->degree_level,'required'=>false,'label'=>false,'placeholder' => 'Degree Level', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Qua.'. $i . '.expected_graduation_date', ['value'=>$candidate->qualifications[$i]->expected_graduation_date->i18nFormat('yyyy-MM-dd'),'type'=>'date','required'=>false,'label'=>false,'placeholder' => 'Expected graduation date', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Qua.'. $i . '.gpa', ['value'=>$candidate->qualifications[$i]->gpa,'required'=>false,'label'=>false,'placeholder' => 'GPA','class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Qua.'. $i . '.major', ['value'=>$candidate->qualifications[$i]->major,'required'=>false,'label'=>false,'placeholder' => 'Major', 'class' => 'form-control']) ?></td>
                                <td><?php echo $this->Form->control('Qua.'. $i . '.institution', ['value'=>$candidate->qualifications[$i]->institution,'required'=>true,'label'=>false,'placeholder' => 'Institution', 'class' => 'form-control']) ?></td>
                                <td><button style="margin-left:50%;"  type="button" name="remove"
                                            id=<?php echo $i ?> class=" btnremove3 btn btn-danger
                                            btn-elevate btn-pill btn-sm
                                    ">Delete
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <button type="button" name="add" id="add3"
                        class="btn btn-primary">Add More
                </button>

                <div class="bt">
                    <?= $this->Form->button('Submit', array('name' => 'btn1')) ?>
                </div>

                <?= $this->Form->end() ?>
                </p>
            </div>
        </div>

    </div>
</div>

<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') ?>

<script>
    $(document).ready(function () {
        var i ="<?php echo sizeof($candidate->skills);?>"

        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '">' +
                '<td><br><input type="text" required="required" placeholder="Enter your skill name" name="Skills[' + (i - 1) + '][name]" class="form-control name_list" /></td>' +

                '<td><br><button style="margin-left:50%;" type="button" name="remove" id="' + i + '" class=" btn_remove btn btn-danger btn-elevate btn-pill btn-sm">Delete</button></td></tr>');

        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();

        });
    });
</script>

<script>
    $(document).ready(function () {
        var i ="<?php echo sizeof($candidate->job_histories);?>";
        $('#add2').click(function () {
            i++;
            $('#dynamic_field2').append('<tr id="row2' + i + '">' +
                '<td><br><input type="text" required="required" placeholder="Job Title" name="Job[' + (i - 1) + '][title]" class="form-control name_list" /></td>' +
                '<td><br><input type="text" required="required" placeholder="Company" type="text" name="Job[' + (i - 1) + '][company]" class="form-control name_list" /></td>' +
                '<td><br><input type="text" placeholder="Description" name="Job[' + (i - 1) + '][desc]" class="form-control name_list" /></td>' +
                '<td><br><input type="date" required="required"  name="Job[' + (i - 1) + '][start]" class="form-control name_list" /></td>' +
                '<td><br><input type="date"  name="Job[' + (i - 1) + '][finish]" class="form-control name_list" /></td>' +

                '<td><br><button style="margin-left:50%;" type="button" name="remove" id="' + i + '" class=" btnremove2 btn btn-danger btn-elevate btn-pill btn-sm">Delete</button></td></tr>');
        });
        $(document).on('click', '.btnremove2', function () {
            var button_id = $(this).attr("id");
            $('#row2' + button_id + '').remove();
        });
    });
</script>


<script>
    $(document).ready(function () {
        var i = "<?php echo sizeof($candidate->qualifications);?>";
        $('#add3').click(function () {
            i++;
            $('#dynamic_field3').append('<tr id="row3' + i + '">' +
                '<td><br><input type="text" required="required" placeholder="Degree Name" name="Qua[' + (i - 1) + '][degree_name]" class="form-control name_list" /></td>' +
                '<td><br><input type="text"  placeholder="Degree Level" type="text" name="Qua[' + (i - 1) + '][degree_level]" class="form-control name_list" /></td>' +
                '<td><br><input type="date" required="required" name="Qua[' + (i - 1) + '][expected_graduation_date]" class="form-control name_list" /></td>' +
                '<td><br><input type="text" placeholder="GPA" name="Qua[' + (i - 1) + '][gpa]" class="form-control name_list" /></td>' +
                '<td><br><input type="text" placeholder="Major" name="Qua[' + (i - 1) + '][major]" class="form-control name_list" /></td>' +
                '<td><br><input type="text"  placeholder="Institution" required="required" name="Qua[' + (i - 1) + '][institution]" class="form-control name_list" /></td>' +
                '<td><br><button style="margin-left:50%;" type="button" name="remove" id="' + i + '" class=" btnremove3 btn btn-danger btn-elevate btn-pill btn-sm">Delete</button></td></tr>');
        });
        $(document).on('click', '.btnremove3', function () {
            var button_id = $(this).attr("id");
            $('#row3' + button_id + '').remove();
        });
    });
</script>
