<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.5">

        <title>PMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
          <link rel="stylesheet" href="css/bootstrap.min.css" />
          <link rel="stylesheet" href="css/fontawesome.min.css" />
          <link rel="stylesheet" href="css/solid.min.css" />
          <link rel="stylesheet" href="css/brands.min.css" />
          <!--My Stylesheet css-->
          <link rel="stylesheet" href="css/main.css" />

    
    </head>
    <body>
        <!--Start Navbar-->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><span class="pm">PM</span>.COM</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse  navbar-right" id="navbarSupportedContent">
            <ul class="nav navbar-nav">

              <li class="active"><a href="#home">Home<span class="sr-only">(current)</span></a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#pricing">Pricing</a></li>
              <li><a href="#review">Review</a></li>
              <li><a href="#connect">Contact</a></li>
            </ul>

            <form class="navbar-form navbar-left">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <ul class="nav navbar-nav">
              <li class="dropdown">
                  <div class="btn-group">
                      @if (Route::has('login'))
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span>
                    </button>
                      @auth
                      <button class="btn btn-primary"><a class="main" href="{{ url('/home') }}">{{ Auth::user()->name }}</a></button>
                      @else
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('login') }}">Login</a></li>
                        <li role="separator" class="divider"></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                      @endauth
                  </div>

              </li>
            </ul>
          </div><!-- /.navbar-collapse -->@endif
        </div><!-- /.container -->
      </nav>

      <!--End Navbar-->

       <!--Start Header-->
      <div class="header" id="home">
          <div class="overly" >
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6">
                          <h1>PROJECT MANAGEMENT</h1>
                          <h2>Manage Your Project,<br>By Easy Way.</h2>
                          <p class="lead">Whatever you want,<br>we will help you to do it right</p>
                          <button class="btn btn-primary uppercase"><a href="{{ route('register') }}">Get Started</a></button>
                      </div>
                      <div class="header-img col-lg-6 ">
                          <img src="{{ asset('images/pensioen-voor-je-medewerkers-32eedc88.png') }}" />
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--End Header-->

      <!--Start Social Media-->
      <div class="social_media">
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <h4>Social Media</h4>
                      <p>You can follow us on social media, we response all time.</p>
                  </div>
                  <div class="col-md-8">
                      <ul>
                          <i class="fab fa-facebook-f fa-3x"></i>
                          <i class="fab fa-twitter fa-3x"></i>
                          <i class="fab fa-google-plus-g fa-3x"></i>
                          <i class="fab fa-stumbleupon fa-3x"></i>
                          <i class="fab fa-pinterest-p fa-3x"></i>
                          <i class="fab fa-instagram  fa-3x"></i>
                          <i class="fas fa-wifi fa-3x"></i>
                      </ul>
                  </div>
              </div>

          </div>
      </div>
      <!--End Social Media-->


      <!--Start Features section-->
      <div class="features" id="features">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Manage your projects intuitively,<span>With out leaving your creative flow.</span> </h1>
                      <p class="lead">Everyone know that admin work is the most productive thing we all do</p>
                      <p class="p2">No wait, that doesn't sound right. So why do we let project management add much extra time to our work?</p>
                      <p class="p3">PM has reimagined project management from the ground up to make it more intuitve for taems.Instead of distracting you from your creative work, We'll help you focus on getting things done saving you time.</p>
                  </div>
                  <div class="col-md-6">
                      <img src="images/features.gif">
                  </div>
              </div>
          </div>
      </div>
      <!--End Features section-->


      <!--Start Can Do Section-->
      <div class="can-do  text-center" id="about">
          <div class="overly">
              <div class="container">
                  <h1>What can you do on PM</h1>
                  <p class="lead">PM"Project Management" com gives you everything you need to create anything you want.It’s flexible, secure, and powerful, just like you want your business to be.</p>
                  <div class="row">
                      <div class="col-md-3">
                          <i class="fas fa-dollar-sign fa-3x"></i>
                          <h1>Budget</h1>
                          <p class="lead">Thousands of themes means there’s a layout that’s just right for you, while storage and design options ensure you can upload anything you need to and give your work the stage it deserves.</p>
                      </div>
                      <div class="col-md-3">
                          <i class="fas fa-tasks fa-3x"></i>
                          <h1>Task</h1>
                          <p class="lead">Thousands of themes means there’s a layout that’s just right for you, while storage and design options ensure you can upload anything you need to and give your work the stage it deserves.</p>
                      </div>
                      <div class="col-md-3">
                          <i class="fas fa-clock fa-3x"></i>
                          <h1>Time</h1>
                          <p class="lead">Thousands of themes means there’s a layout that’s just right for you, while storage and design options ensure you can upload anything you need to and give your work the stage it deserves.</p>
                      </div>
                      <div class="col-md-3">
                          <i class="fas fa-users fa-3x"></i>
                          <h1>Employees</h1>
                          <p class="lead">Thousands of themes means there’s a layout that’s just right for you, while storage and design options ensure you can upload anything you need to and give your work the stage it deserves.</p>
                      </div>
                  </div>
                  <h1>Getting started is easy.</h1>
                    <button class="btn btn-primary"><a href="{{ route('register') }}">Sign up for free</a></button>
              </div>
          </div>
      </div>
      <!--Start Can Do Section-->


      <!--start Pricing Section-->
      <div class="pricing" id="pricing">
          <div class="container">
              <h1>Upgrade anytime.</h1>
              <div class="row">
                  <div class="one col-md-3">
                      <p>Standard</p>
                      <h1>$24.00</h1>
                      <p>user/month</p>
                      <p>Our core plan-add as many users as  you need.</p>
                      <ul>
                          <li>Unlimited Active Jobs </li>
                          <li>Unlimited Archived Jobs </li>
                          <li>T Do Based Timesheet </li>
                          <li>Jpb Planning </li>
                          <li>Quoting  &amp; Invoicing </li>
                          <li>Productivity Analytics </li>
                      </ul>
                  </div>
                  <div class="two col-md-3">
                      <p>Standard</p>
                      <h1>$24.00</h1>
                      <p>user/month</p>
                      <p>Our core plan-add as many users as  you need.</p>
                      <ul>
                          <li>Unlimited Active Jobs </li>
                          <li>Unlimited Archived Jobs </li>
                          <li>Quickbooks integrations </li>
                          <li>Xero integrations</li>
                          <li>T Do Based Timesheet </li>
                          <li>Jpb Planning </li>
                          <li>Quoting  &amp; Invoicing </li>
                          <li>Productivity Analytics </li>
                      </ul>
                  </div>
                  <div class="three col-md-3">
                      <p>Standard</p>
                      <h1>$24.00</h1>
                      <p>user/month</p>
                      <p>Our core plan-add as many users as  you need.</p>
                      <ul>
                          <li>Unlimited Active Jobs </li>
                          <li>Unlimited Archived Jobs </li>
                          <li>Team Scheduling</li>
                          <li>Purchase Order</li>
                          <li>Multi Currency</li>
                          <li>Quickbooks integrations </li>
                          <li>Xero integrations</li>
                          <li>T Do Based Timesheet </li>
                          <li>Jpb Planning </li>
                          <li>Quoting  &amp; Invoicing </li>
                          <li>Productivity Analytics </li>
                      </ul>
                  </div>
                  <div class="four col-md-3">
                      <img src="images/Capture.PNG">
                  </div>
              </div>
          </div>
      </div>
      <!--start Pricing Section-->


      <!--Start Tabs Section-->
      <div class="tabs" id="review">
          <div class="container">
              <div class="row">
                  <div class="col-md-2">
                      <ul class="list-unstyled tab-switch text-center">
                          <li class="selected" data-class="tab-one" id="i1">Tab 1</li>
                          <li data-class="tab-two"  id="i2">Tab 2</li>
                          <li data-class="tab-three"  id="i3">Tab 3</li>
                      </ul>
                  </div>
                  <div class="col-md-6">
                      <div class="tab-content">
                      <div class="tab-one">
                          <h1>Plan Project</h1>
                          <p class="lead">Start With a budget, then allocate team members to each task, estimate hours and set deadlines with a few drags of your mouse.</p>
                          <p class="lead">
                              Stay on time and on budget easily. Your taem's progress is tracked on the job page, and you can easily move tasks from person to person in the schedule.
                          </p>
                      </div>
                      <div class="tab-two">
                          <h1>Tasks of project</h1>
                          <p class="lead">Start With a budget, then allocate team members to each task, estimate hours and set deadlines with a few drags of your mouse.</p>
                          <p class="lead">
                              Stay on time and on budget easily. Your taem's progress is tracked on the job page, and you can easily move tasks from person to person in the schedule.
                          </p>
                      </div>
                      <div class="tab-three">
                          <h1>Time of tasks</h1>
                          <p class="lead">Start With a budget, then allocate team members to each task, estimate hours and set deadlines with a few drags of your mouse.</p>
                          <p class="lead">
                              Stay on time and on budget easily. Your taem's progress is tracked on the job page, and you can easily move tasks from person to person in the schedule.
                          </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="tab-content-img">
                          <div class="tab-one">
                              <img src="images/plan.gif">
                          </div>
                          <div class="tab-two">
                              <img class="tab-two" src="images/grafic-ascendent.png">
                          </div>
                          <div class="tab-three">
                              <img class="tab-three" src="images/antnodeskdb.gif">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--Start Tabs Section-->


      <!--Start Engineering Section-->
      <div class="engineer">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <h1>Engineering Happiness</h1>
                          <p class="lead">Our 24/7 support is powered by actual people. We call them Happiness Engineers.</p>
                          <p class="lead">they’re all ears, all smiles, and all human. Happiness Engineers also work all around the world—and around the clock, so there’s always someone there when you need them.</p>
                  </div>
                  <div class="col-md-6">
                      <div class="rate">
                          <div class="first col-md-6">
                              <p>MORE THAN</p>
                              <h1>300</h1>
                              <p>Humans</p>
                          </div>
                          <div class="second col-md-6">
                              <p>AVILABLE</p>
                              <h1>24/7</h1>
                              <p>Instantly</p>
                          </div>
                     </div>
                  </div>
              </div>
          </div>
      </div>
      <!--Start Engineering Section-->


      <!--Start Help Section-->
      <div class="help">
          <div class="container">
              <div class="row">
                  <div class="col-md-4">
                      <img src="images/help.gif">
                  </div>
                  <div class="col-md-8">
                      <h1>You can.You will.<br> We’ll help.</h1>
                      <p class="lead">Hardware project, Software project, Archtictur project, any project naeed to management by true way —that’s where we come in.</p>
                       <button class="btn btn-primary"><a href="{{ route('register') }}">Start Your Project</a></button>
                  </div>
              </div>
          </div>
      </div>
      <!--End Help Section-->


      <!--Start Section Contact us-->
      <div class="contact center-block" id="connect">
          <div class="overly ">
              <div class="container">
                  <h1 class="content text-center">CONTACT US</h1>
                  <p class="lead text-center">You can contact us by easy way just fill this items.
                  </p>

                  <div class="row">
                      <form class="contact-form">
                          <div class="col-md-6">
                              <input class="form-control input-lg" type="text" name="username" placeholder="name">
                              <input class="form-control input-lg" type="email" name="email" placeholder="Email">
                              <input class="form-control input-lg " type="text" name="subject" placeholder="Subject">
                          </div>
                          <div class="col-md-6">
                              <textarea class="form-control input-lg" placeholder="Message"></textarea>
                          </div>
                      </form>
                  </div>
                  <button class="btn btn-primary">Send Massege</button>
              </div>
          </div>
      </div>
      <!--End Section Contact us-->
        <div class="footer">
            <div class="container text-center">
                &copy; PMS.COM Team
            </div>
            
        </div>


        <!--Classes of Java script-->
        <script src="js/jquery-2.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         <script src="js/all.min.js"></script>
        <!--My Java Script class-->
        <script src="js/main.js"></script>
    </body>
</html>
