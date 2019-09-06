<?php
$this->assign('title', 'About Us');
?>

<div class="site-section bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-lg-8 mb-5">



                <div class="p-5 bg-white">

                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Who we are</h2>
                        </div>
                    </div>

                    <p><strong>At The Big Job we know that securing a job is a full time job.   We also know that through following specific techniques and strategies it can be a lot easier than you think – and we are here to help.</strong></p>
                    <p>Our job tips have been developed over 14 years of screening resumes, writing CVs and helping people win work.  The Big Job is a group of corporate employers, recruitment consultants and small business professionals who have recruited and placed people in all types of jobs from graduate to senior executive roles.  We have worked across sectors from hospitality to construction to technology and many more. </p>
                    <p><strong>We have found that regardless of the role or sector, the same job formula applies.  </strong></p>
                    <p>Upon reflection, we discovered we had collectively conducted over 17,000 face to face interviews and successfully placed over 3000 people in roles – part time, full time, contract, permanent. We have the inside info on how to get a job – the dos and the donts – and are here to share the truth with you.  If the truth isn’t told then you are simply not happy, and you will end up in a job that doesn’t deliver…. or wasting a lot of your time talking to potential employers who just aren’t open to your charm and offerings.</p>
                    <p><strong>We have the experience and we look forward to sharing it all with you.</strong></p>
                    <hr>
                    <h2 class="mr-3 text-black h4">Why Us</h2>
                    <h2 class="mr-3 text-black h5">We Can Help You Stand Out</h2>
                    <p><strong>In a competitive job market, standing out is your biggest challenge.</strong></p>
                    <p>Landing a job is not all about great qualifications or what you have done.  It is mostly about what you have to offer.  Your value proposition or unique offering you can bring to an organisation is what counts. That is why at The Big Job we have created a profile which enables you to express your value proposition.  Our profile page also enables you to express the cool things about you that only you can bring.</p>
                    <p><button class="btn btn-primary  py-2 px-4"><?= $this->Html->link(__('Free tips'), ['controller'=>'pages','action' => 'freetips']) ?></button></p>
                    <hr>
                    <h2 class="mr-3 text-black h5">Video Resume</h2>
                    <p><strong>A CV paints a 1000 words but a video is so much better! </strong></p>
                    <p>Expressing yourself in words is often very hard.  A video on the other hand is so much easier and much more engaging for recruiters.  That is why at the Big Job we have enabled you to develop short, sharp and super engaging videos to woo your next boss. Our video creation tips are the key to making sure you are reflected in the best possible light.
                    <p><button class="btn btn-primary  py-2 px-4"><?= $this->Html->link(__('Upload Video Resume'), ['controller'=>'pages','action' => 'home']) ?></button></p>
                    <hr>
                    </p>
                </div>
            </div>

            <div class="col-lg-4">


                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">Our recent free tips</h3>

                    <p><button class="btn btn-primary  py-2 px-4"><?= $this->Html->link(__('Find out more'), ['controller'=>'pages','action' => 'home']) ?></button></p>
                </div>
            </div>
        </div>
    </div>
</div>

