<?php 
    $user_nombre_real = $this->Session->read("Auth.User.nombre");
    $user_id = $this->Session->read("Auth.User.id");
?>
    <div class="ui-layout-north topbar">
        <h1><?php echo $this->Html->image('clarity-logo.png', array('alt' => 'GEO CECO'))?> GEO C.E.C.O</h1>
        <div class="notifyHeader">
       <!-- <div class="dropdown notifications" id="menu2">
            <a class="dropdown-toggle" id="notifyNumber" data-toggle="dropdown" href="#menu2">
              3
            </a>
            <ul class="dropdown-menu">
              <li>NOTIFICATIONS:</li>
              <li><a href="#"><img alt="profile image" src="img/4.jpg" />
                            <h5>Catalina Butnaru</h5>
                             <i class="icon-envelope"></i> Sent you a message.<p>3 minutes ago.</p></a></li>
              <li><a href="#"><img alt="profile image" src="img/BryanMcAnulty.png" />
                            <h5>Bryan McAnulty</h5>
                             <i class="icon-comment"></i> Posted a comment.<p>5 hours ago.</p></a></li>
              <li><a href="#"><img alt="profile image" src="img/2.jpg" />
                            <h5>Ashley Green</h5>
                             <i class="icon-plus"></i> Uploaded a new file.<p>Yesterday</p></a></li>
              <li><a href="#"><img alt="profile image" src="img/1.jpg" />
                            <h5>Matt Brink</h5>
                             <i class="icon-ok"></i> Completed a task.<p>Yesterday</p></a></li>
              <li><a href="#"><img alt="profile image" src="img/3.jpg" />
                            <h5>Jack Koner</h5>
                             <i class="icon-comment"></i> Posted a comment.<p>Two days ago.</p></a></li>
              <li><a href="#">View all notifications.</a></li>
            </ul>
        </div> -->
        </div>
        <!--
        <ul id="headerNav">
            <li class="headerNavList"><div class="dropdown" id="menu3">
                <a class="dropdown-toggle btn-navbar" data-toggle="dropdown" href="#menu3">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="index.html"><i class="icon-home"></i> Dashboard</a></li>
                  <li class="divider"></li>
                  <li><a href="message-view.html"><i class="icon-inbox"></i> Messages</a></li>
                  <li class="divider"></li>
                  <li><a href="graph-view.html"><i class="icon-signal"></i> Graphs</a></li>
                  <li class="divider"></li>
                  <li><a href="list-view.html"><i class="icon-check"></i> Todo List</a></li>
                  <li class="divider"></li>
                  <li><a href="calendar.html"><i class="icon-calendar"></i> Calendar</a></li>
                  <li class="divider"></li>
                  <li><a href="widgets.html"><i class="icon-cog"></i> Widgets &amp; More</a></li>
                  <li class="divider"></li>
                  <li><a href="typography.html"><i class="icon-font"></i> Typography</a></li>
                  <li class="divider"></li>
                  <li><a href="ui-elements.html"><i class="icon-plus-sign"></i> UI Elements</a></li>
                  <li class="divider"></li>
                  <li><a href="buttons.html"><i class="icon-ok-sign"></i> Buttons</a></li>
                  <li class="divider"></li>
                  <li><a href="gallery.html"><i class="icon-picture"></i> Gallery</a></li>
                </ul>
            </div></li>
        </ul>
        -->
        <a class="btn theme-btn" data-toggle="modal" href="#myModal" >Nueva Nota</a>
        
        <div id="search">
          <i class="icon-search search-inside"></i><input placeholder="Buscar..." type="text" />
        </div>
        <div class="login">
            <div class="dropdown" id="menu1">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                  <?php echo $this->Html->image('user.png')?><span><?php echo $user_nombre_real;?></span>
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="settings.html">Su Cuenta</a></li>
                  <li><a href="settings.html">Configuracion</a></li>
                  <li class="divider"></li>
                  <li><?php echo $this->Html->link('Salir',array('controller' => 'users', 'action' => 'logout'), array('escape' => FALSE)); ?> </li>
                </ul>
            </div>
        </div>
    </div> <!-- END Layout North -->