    <div class="ui-layout-west">
        
        <ul class="nav nav-tabs sidebar-tabs">
          <li class="active"><a href="#1" data-toggle="tab">Menu</a></li>
          <li><a href="#2" data-toggle="tab">Calendario</a></li>
          <li><a href="#3" data-toggle="tab">Archivos</a></li>
        </ul>
        <div class="tab-content ui-layout-content">
            <div class="tab-pane active" id="1">
                <ul>
                    <li class="list-box"><li class="list-box"><?php echo $this->Html->link('<p><i class="icon-home icon-white"></i> Inicio </p>',array('controller' => 'dashboards', 'action' => 'index'), array('escape' => FALSE)); ?> </li>
                    <li class="list-box"><?php echo $this->Html->link('<p><i class="icon-table icon-white"></i> Padrones </p>',array('controller' => 'padrons', 'action' => 'index'), array('escape' => FALSE)); ?> </li>
                    <li class="list-box"><?php echo $this->Html->link('<p><i class="icon-map-marker icon-white"></i> Mapa </p>',array('controller' => 'dashboards', 'action' => 'sbm'), array('escape' => FALSE)); ?> </li>
                    <li class="list-box"><?php echo $this->Html->link('<p><i class="icon-user icon-white"></i> Usuarios </p><span class="badge">11</span>',array('controller' => 'users', 'action' => 'index'), array('escape' => FALSE)); ?> </li>
                    <!--<li class="list-box"><a href="calendar.html">
                      <p><i class="icon-paper-clip icon-white"></i> Notas </p><span class="badge">8</span>
                    </a></li>-->
                </ul>
                
            </div>
            <div class="tab-pane" id="2">
                <!--
                <div class="message-box">
                    <img alt="profile image" src="img/BryanMcAnulty.png" />
                    <h5>Bryan McAnulty <span>Today at 3:36pm</span></h5>
                    <p>Check out all the features here! Make sure to click around everywhere so you don't miss anything.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/2.jpg" />
                    <h5>Ashley Green <span>July 29th, 2012 12:31pm</span></h5>
                    <p>Make sure to check your notifictions by clicking the "3" in the top left corner.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/4.jpg" />
                    <h5>Catalina Butnaru <span>July 28th, 2012 11:26am</span></h5>
                    <p>Try collapsing and expanding the left and right sidebars using the buttons in the footer.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/3.jpg" />
                    <h5>Jack Koner <span>July 27th, 2012 2:16pm</span></h5>
                    <p>Also look through the different tabs on each of the sidebars.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/avatar-profile.png" />
                    <h5>New User <span>July 25th, 2012 3:01pm</span></h5>
                    <p>I need to add a profile image.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/1.jpg" />
                    <h5>Matt Brink <span>July 24th, 2012 5:02pm</span></h5>
                    <p>Uploaded a new file Build a Web App project.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/BryanMcAnulty.png" />
                    <h5>Bryan McAnulty <span>July 20th, 2012 1:42pm</span></h5>
                    <p>Added a new comment to the Build a Web App project.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div>
                <div class="message-box">
                    <img alt="profile image" src="img/avatar-profile.png" />
                    <h5>New User <span>July 19th, 2012 2:35pm</span></h5>
                    <p>Uploaded a new file to the Client Redesign Project.</p>
                    <a href="#replyModal" data-toggle="modal" class="reply-to"><i class="icon-share-alt icon-white"></i> Reply</a>
                </div> 
            -->
                <p>Date:</p> <div id="datepicker"></div>    
            </div>
            
            
            <div class="tab-pane files-pane" id="3">
                <strong>Archivos Cargados:</strong>
                <ul>
                <li class="folder"><i class="icon-folder-open icon-white"></i>Padrones
                  <ul>
                      <li><i class="icon-file icon-white"></i>Afiliados CECO</li>
                      <li><i class="icon-file icon-white"></i>PAMI</li>
                      <li><i class="icon-file icon-white"></i>Afiliados Activos</li>
                      <li><i class="icon-file icon-white"></i>Afiliados Baja</li>
                      <li><i class="icon-file icon-white"></i>OCECAC</li>
                  </ul>
                </li>
                <li class="folder"><i class="icon-folder-open icon-white"></i>Documentos
                  <ul>
                      <li><i class="icon-file icon-white"></i>Planilla 1.xls</li>
                      <li><i class="icon-file icon-white"></i>Planilla 2.xls</li>
                      <li><i class="icon-file icon-white"></i>Carta Afiliados.doc</li>
                      <li><i class="icon-file icon-white"></i>Publicidad 1.pdf</li>
                      <li><i class="icon-file icon-white"></i>Contrato1.doc</li>
                  </ul>
                </li>  

                </ul>
            </div>
        </div>
        
    <div class="sidebarFooterStats">
        <div>
            <i class="icon-chevron-up icon-white"></i>
            <strong>5.782</strong>
            <p>Activos</p> 
        </div>
        <div>
            <i class="icon-chevron-down icon-white"></i>
            <strong>780</strong>
            <p>Baja</p> 
        </div>
    </div>
    <div class="sidebarFooter">
        <!--<button id="newb">Info</button>
        <button id="settingsb">Configuracion</button>-->
        <div id="dragb" class="ui-layout-resizer
               ui-layout-resizer-west
               ui-layout-resizer-open
               ui-layout-resizer-west-open">
        </div>
    </div>

    </div> <!-- END Layout West -->