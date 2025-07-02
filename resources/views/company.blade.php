@extends('layouts.admin_layout')

@section('title', 'EcoFarm')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
                <section class="card">
                    <div class="card-body">
                        <div class="thumb-info mb-3">
                            
                            <img id="profile-photo" src="/storage/photos/logo-ecofarm.jpg" class="rounded img-fluid" alt="">
                            
                                <div id="upload-status" class="mt-3"></div>
                            <!--<div class="thumb-info-title">
                                 <span class="thumb-info-inner">EcoFarm</span>
                            </div> -->
                        </div>
                        <div class="widget-toggle-expand mb-3">
                            <div class="widget-header">
                                <h5 class="mb-2">Profile Completion</h5>
                                <div class="widget-toggle">+</div>
                            </div>
                            <div class="widget-content-collapsed">
                                <div class="progress progress-xs light">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                        60%
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-expanded">
                                <ul class="simple-todo-list mt-3">
                                    <li class="completed">Update Profile Picture</li>
                                    <li class="completed">Change Personal Information</li>
                                    <li>Update Social Media</li>
                                    <li>Follow Someone</li>
                                </ul>
                            </div>
                        </div>
                        <hr class="dotted short">
                        <h5 class="mb-2 mt-3">About</h5>
                        <p class="text-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam. Interdum et malesuada</p>
                        <div class="clearfix">
                            <a class="text-uppercase text-muted float-right" href="#">(View All)</a>
                        </div>
                        <hr class="dotted short">
                        <div class="social-icons-list">
                            <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
                            <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a>
                        </div>
                    </div>
                </section>
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>
                        <h2 class="card-title">
                            <span class="badge badge-primary label-sm font-weight-normal va-middle mr-3">298</span>
                            <span class="va-middle">Friends</span>
                        </h2>
                    </header>
                    <div class="card-body">
                        <div class="content">
                            <ul class="simple-user-list">
                                <li>
                                    <figure class="image rounded">
                                        <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle">
                                    </figure>
                                    <span class="title">Joseph Doe Junior</span>
                                    <span class="message truncate">Lorem ipsum dolor sit.</span>
                                </li>
                                <li>
                                    <figure class="image rounded">
                                        <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle">
                                    </figure>
                                    <span class="title">Joseph Junior</span>
                                    <span class="message truncate">Lorem ipsum dolor sit.</span>
                                </li>
                                <li>
                                    <figure class="image rounded">
                                        <img src="/admpanel/img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle">
                                    </figure>
                                    <span class="title">Joe Junior</span>
                                    <span class="message truncate">Lorem ipsum dolor sit.</span>
                                </li>
                                <li>
                                    <figure class="image rounded">
                                        <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle">
                                    </figure>
                                    <span class="title">Joseph Doe Junior</span>
                                    <span class="message truncate">Lorem ipsum dolor sit.</span>
                                </li>
                            </ul>
                            <hr class="dotted short">
                            <div class="text-right">
                                <a class="text-uppercase text-muted" href="#">(View All)</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control" name="s" id="s" placeholder="Search...">
                            <span class="input-group-append">
											<button class="btn btn-default" type="submit"><i class="bx bx-search"></i>
											</button>
										</span>
                        </div>
                    </div>
                </section>
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>
                        <h2 class="card-title">Popular Posts</h2>
                    </header>
                    <div class="card-body">
                        <ul class="simple-post-list">
                            <li>
                                <div class="post-image">
                                    <div class="img-thumbnail">
                                        <a href="#">
                                            <img src="/admpanel/img/post-thumb-1.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="#">Nullam Vitae Nibh Un Odiosters</a>
                                    <div class="post-meta">
                                        Jan 10, 2017
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post-image">
                                    <div class="img-thumbnail">
                                        <a href="#">
                                            <img src="/admpanel/img/post-thumb-2.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="#">Vitae Nibh Un Odiosters</a>
                                    <div class="post-meta">
                                        Jan 10, 2017
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="post-image">
                                    <div class="img-thumbnail">
                                        <a href="#">
                                            <img src="/admpanel/img/post-thumb-3.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="#">Odiosters Nullam Vitae</a>
                                    <div class="post-meta">
                                        Jan 10, 2017
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-lg-8 col-xl-6">
                <div class="tabs">
                    <div class="tab-content">
                        <div id="overview" class="tab-pane active">
                            <div class="p-3">
                                <h2 class="mb-3">EcoFarm</h2>
                                <h5 class="mb-3">Permaculture, agriculture</h5>
                                <h5 class="mb-3"><i style="color:#d2312d" class="fas fa-map-marker-alt"></i>   Bishkek, Kyrgyzstan</h5> 
                                
                                <h4 class="mb-3" style="">"The sustainable agricultural space that harmoniously blends organic farming, ecological balance, and community well-being. Unlike traditional farms, ecofarms prioritize environmental stewardship, using natural methods to grow food without harmful chemicals, preserving biodiversity, and enriching the soil."</h4>
                                
                                <!--<h4 class="mb-3"><i style="color:#0088cc" class="fa-solid fa-children"></i> Gemini</h4>-->
                                
                                <h4 class="mb-3 pt-4">My Feed</h4>
                                <div class="timeline timeline-simple mt-3 mb-3">
                                    <div class="tm-body">
                                        <div class="tm-title">
                                            <h5 class="m-0 pt-2 pb-2 text-uppercase">December 2024</h5>
                                        </div>
                                        <ol class="tm-items">
                                            <li>
                                                <div class="tm-box">
                                                    <p class="text-muted mb-0">7 months ago.</p>
                                                    <p>
                                                        It's awesome when we find a good solution for our projects, Porto Admin is <span class="text-primary">#awesome</span>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tm-box">
                                                    <p class="text-muted mb-0">7 months ago.</p>
                                                    <p>
                                                        What is your biggest developer pain point?
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tm-box">
                                                    <p class="text-muted mb-0">7 months ago.</p>
                                                    <p>
                                                        Checkout! How cool is that!
                                                    </p>
                                                    <div class="thumbnail-gallery">
                                                        <a class="img-thumbnail lightbox" href="/admpanel/img/projects/project-4.jpg" data-plugin-options='{ "type":"image" }'>
                                                            <img class="img-fluid" width="215" src="/admpanel/img/projects/project-4.jpg">
                                                            <span class="zoom">
																			<i class="bx bx-search"></i>
																		</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <h4 class="mb-3 mt-0">Bages</h4>
                <ul class="simple-card-list mb-3">
                    <li class="primary">
                        <h3>488</h3>
                        <p class="text-light">Nullam quris ris.</p>
                    </li>
                    <li class="primary">
                        <h3>$ 189,000.00</h3>
                        <p class="text-light">Nullam quris ris.</p>
                    </li>
                    <li class="primary">
                        <h3>16</h3>
                        <p class="text-light">Nullam quris ris.</p>
                    </li>
                </ul>
                <h4 class="mb-3 mt-4 pt-2">Projects</h4>
                <ul class="simple-bullet-list mb-3">
                    <li class="red">
                        <span class="title">Porto Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit.</span>
                    </li>
                    <li class="green">
                        <span class="title">Tucson HTML5 Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit amet</span>
                    </li>
                    <li class="blue">
                        <span class="title">Porto HTML5 Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit.</span>
                    </li>
                    <li class="orange">
                        <span class="title">Tucson Template</span>
                        <span class="description truncate">Lorem ipsom dolor sit.</span>
                    </li>
                </ul>
                <h4 class="mb-3 mt-4 pt-2">Messages</h4>
                <ul class="simple-user-list mb-3">
                    <li>
                        <figure class="image rounded">
                            <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle">
                        </figure>
                        <span class="title">Joseph Doe Junior</span>
                        <span class="message">Lorem ipsum dolor sit.</span>
                    </li>
                    <li>
                        <figure class="image rounded">
                            <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Junior" class="rounded-circle">
                        </figure>
                        <span class="title">Joseph Junior</span>
                        <span class="message">Lorem ipsum dolor sit.</span>
                    </li>
                    <li>
                        <figure class="image rounded">
                            <img src="/admpanel/img/!sample-user.jpg" alt="Joe Junior" class="rounded-circle">
                        </figure>
                        <span class="title">Joe Junior</span>
                        <span class="message">Lorem ipsum dolor sit.</span>
                    </li>
                    <li>
                        <figure class="image rounded">
                            <img src="/admpanel/img/!sample-user.jpg" alt="Joseph Doe Junior" class="rounded-circle">
                        </figure>
                        <span class="title">Joseph Doe Junior</span>
                        <span class="message">Lorem ipsum dolor sit.</span>
                    </li>
                </ul>
            </div>

        </div>

    </div>

    <!-- Specific Page Vendor -->
    <script src="/admpanel/vendor/autosize/autosize.js"></script>

    

@endsection
