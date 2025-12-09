<nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation" style="background-color:black; color:black;">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.html">Titan</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a class="dropdown-toggle" href="<?php echo home_url();?>" data-toggle="dropdown">Home</a>
                </li>
                <li><a href="<?php echo get_page_link(get_page_object('PROJECTS')->ID);?>" data-toggle="dropdown">Projects</a> <!--  -->
                </li>
                <li><a href="<?php echo get_page_link(get_page_object('CONTACT')->ID);?>" data-toggle="dropdown">Contact</a>
                </li>
                <li><a href="<?php echo get_page_link(get_page_object('ARCHIVES')->ID);?>" data-toggle="dropdown">Archives</a>
                </li>
                <li><a href="<?php echo get_page_link(get_page_object('NEWS')->ID);?>" data-toggle="dropdown">News</a>
                </li>
          </div>
        </div>
      </nav>