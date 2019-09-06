<?php
$this->assign('title', 'Home');
?>
<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-blocks-cover" style="background-image: url(img/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row row-custom align-items-center">
                <div class="col-md-10">
                    <h1 class="mb-2 text-black w-75"><span class="font-weight-bold">Looking for a job</span> Is a big job</h1>
                    <div class="job-search">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active py-3" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="true">Find A Job</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-3" id="pills-candidate-tab" data-toggle="pill" href="#pills-candidate" role="tab" aria-controls="pills-candidate" aria-selected="false">Find A Candidate</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <input type="text" class="form-control" placeholder="eg. Web Developer">
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <div class="select-wrap">
                                                <span class="icon-keyboard_arrow_down arrow-down"></span>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Category</option>
                                                    <option value="fulltime">Full Time</option>
                                                    <option value="fulltime">Part Time</option>
                                                    <option value="freelance">Freelance</option>
                                                    <option value="internship">Internship</option>
                                                    <option value="internship">Termporary</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Location" onFocus="geolocate()">
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <input type="submit" class="btn btn-primary btn-block" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-candidate" role="tabpanel" aria-labelledby="pills-candidate-tab">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <input type="text" class="form-control" placeholder="eg. Carl Smith">
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <div class="select-wrap">
                                                <span class="icon-keyboard_arrow_down arrow-down"></span>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Category</option>
                                                    <option value="fulltime">Full Time</option>
                                                    <option value="fulltime">Part Time</option>
                                                    <option value="freelance">Freelance</option>
                                                    <option value="internship">Internship</option>
                                                    <option value="internship">Termporary</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Location" onFocus="geolocate()">
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <input type="submit" class="btn btn-primary btn-block" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade" >
                    <h2 class="text-black">Why THE<strong>BIG</strong>JOB </h2>
                </div>
            </div>
            <div class="row hosting">
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">

                    <div class="unit-3 h-100 bg-white">

                        <div class="d-flex align-items-center mb-3 unit-3-heading">
                            <div class="unit-3-icon-wrap mr-4">
                                <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                </svg><i class="unit-3-icon icon fa fa-id-badge" aria-hidden="true"></i>
                            </div>
                            <h2 class="h5">Create profile</h2>
                        </div>
                        <div class="unit-3-body">
                            <p>using our superstar tips</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="200">

                    <div class="unit-3 h-100 bg-white">

                        <div class="d-flex align-items-center mb-3 unit-3-heading">
                            <div class="unit-3-icon-wrap mr-4">
                                <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                </svg><i class="unit-3-icon icon fa fa-file-video-o" aria-hidden="true"></i>
                            </div>
                            <h2 class="h5">Video resume</h2>
                        </div>
                        <div class="unit-3-body">
                            <p>Create the wow factor with a cool selfie video!</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="300">

                    <div class="unit-3 h-100 bg-white">

                        <div class="d-flex align-items-center mb-3 unit-3-heading">
                            <div class="unit-3-icon-wrap mr-4">
                                <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                </svg><i class="unit-3-icon icon fa fa-paper-plane-o" aria-hidden="true"></i>
                            </div>
                            <h2 class="h5">Top Careers</h2>
                        </div>
                        <div class="unit-3-body">
                            <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="400">

                    <div class="unit-3 h-100 bg-white">

                        <div class="d-flex align-items-center mb-3 unit-3-heading">
                            <div class="unit-3-icon-wrap mr-4">
                                <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                </svg><i class="unit-3-icon icon fa fa-user" aria-hidden="true"></i>
                            </div>
                            <h2 class="h5">Search Expert Candidates</h2>
                        </div>
                        <div class="unit-3-body">
                            <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="500">

                    <div class="unit-3 h-100 bg-white">

                        <div class="d-flex align-items-center mb-3 unit-3-heading">
                            <div class="unit-3-icon-wrap mr-4">
                                <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                </svg><i class="unit-3-icon icon fa fa-folder-open-o" aria-hidden="true"></i>
                            </div>
                            <h2 class="h5">Easy To Manage Jobs</h2>
                        </div>
                        <div class="unit-3-body">
                            <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="600">

                    <div class="unit-3 h-100 bg-white">

                        <div class="d-flex align-items-center mb-3 unit-3-heading">
                            <div class="unit-3-icon-wrap mr-4">
                                <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                                    <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                                </svg><i class="unit-3-icon icon fa fa-check-square-o" aria-hidden="true"></i>
                            </div>
                            <h2 class="h5">Online Reviews</h2>
                        </div>
                        <div class="unit-3-body">
                            <p>Lorem ipsum dolor sit amet consectetur is a nice adipisicing elita ssumenda a similique perferendis dolorem eos.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="site-section block-4 bg-light">

        <div class="container">

            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade" >
                    <h2 class="text-black">Happy Employers</h2>
                </div>
            </div>

            <div class="nonloop-block-4 owl-carousel" data-aos="fade">
                <div class="item col-md-8 mx-auto">

                    <div class="block-38 text-center bg-white p-4">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <?php echo $this->Html->image('person_1.jpg', ['alt' => 'Image placeholder']);?>
                                <h3 class="block-38-heading">Elizabeth Graham</h3>
                                <p class="block-38-subheading">Creative Director, XYG Company</p>
                            </div>
                            <div class="block-38-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="item col-md-8 mx-auto">
                    <div class="block-38 text-center bg-white p-4">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <?php echo $this->Html->image('person_2.jpg', ['alt' => 'Image placeholder']);?>
                                <h3 class="block-38-heading">Jennifer Greive</h3>
                                <p class="block-38-subheading">Lead Designer, Mig Company</p>
                            </div>
                            <div class="block-38-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item col-md-8 mx-auto">

                    <div class="block-38 text-center bg-white p-4">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <?php echo $this->Html->image('person_1.jpg', ['alt' => 'Image placeholder']);?>
                                <h3 class="block-38-heading">Elizabeth Graham</h3>
                                <p class="block-38-subheading">Creative Director, XYG Company</p>
                            </div>
                            <div class="block-38-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="item col-md-8 mx-auto">
                    <div class="block-38 text-center bg-white p-4">
                        <div class="block-38-img">
                            <div class="block-38-header">
                                <?php echo $this->Html->image('person_2.jpg', ['alt' => 'Image placeholder']);?>
                                <h3 class="block-38-heading">Jennifer Greive</h3>
                                <p class="block-38-subheading">Lead Designer, Mig Company</p>
                            </div>
                            <div class="block-38-body">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit distinctio recusandae doloribus ut fugit officia voluptate soluta. </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade" >
                    <h2 class="text-black">Latest Blog</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-5 mb-lg-0 col-lg-3" data-aos="fade">
                    <div class="position-relative unit-8">
                        <a href="#" class="mb-3 d-block img-a"><?php echo $this->Html->image('img_1.jpg', ['alt' => 'Image','class'=>'img-fluid rounded']);?></a>
                        <span class="d-block text-gray-500 text-normal small mb-3">By <a href="#">Colorlib</a> <span class="mx-2">&bullet;</span> Jan 20th, 2019</span>
                        <h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In pariatur nostrum asperiores corrupti delectus.</p>
                    </div>

                </div>
                <div class="col-md-6 mb-5 mb-lg-0 col-lg-3" data-aos="fade">
                    <div class="position-relative unit-8">
                        <a href="#" class="mb-3 d-block img-a"><?php echo $this->Html->image('img_2.jpg', ['alt' => 'Image','class'=>'img-fluid rounded']);?></a>
                        <span class="d-block text-gray-500 text-normal small mb-3">By <a href="#">Colorlib</a> <span class="mx-2">&bullet;</span> Jan 20th, 2019</span>
                        <h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In pariatur nostrum asperiores corrupti delectus.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-5 mb-lg-0 col-lg-3" data-aos="fade">
                    <div class="position-relative unit-8">
                        <a href="#" class="mb-3 d-block img-a"><?php echo $this->Html->image('img_3.jpg', ['alt' => 'Image','class'=>'img-fluid rounded']);?></a>
                        <span class="d-block text-gray-500 text-normal small mb-3">By <a href="#">Colorlib</a> <span class="mx-2">&bullet;</span> Jan 20th, 2019</span>
                        <h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In pariatur nostrum asperiores corrupti delectus.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-5 mb-lg-0 col-lg-3" data-aos="fade">
                    <div class="position-relative unit-8">
                        <a href="#" class="mb-3 d-block img-a"><?php echo $this->Html->image('img_4.jpg', ['alt' => 'Image','class'=>'img-fluid rounded']);?></a>
                        <span class="d-block text-gray-500 text-normal small mb-3">By <a href="#">Colorlib</a> <span class="mx-2">&bullet;</span> Jan 20th, 2019</span>
                        <h2 class="h5 font-weihgt-normal line-height-sm mb-3"><a href="#" class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In pariatur nostrum asperiores corrupti delectus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
