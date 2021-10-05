<aside class="main-sidebar">
    <section class="sidebar">
    
      <ul class="sidebar-menu">
        <li>
          <a href="http://localhost/psicologiaitsur/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>

        <li>

        <?php
        echo '<a href="http://localhost/psicologiaitsur/alumnos">';
        ?>
            <i class="fa fa-users"></i>
            <span>Alumnos</span>
          </a>
        </li>

        <li>

        <?php

        echo '<a href="http://localhost/psicologiaitsur/citas/'.$_SESSION["id"].'">';

        ?>  
            <i class="fa fa-calendar"></i>
            <span>Citas</span>
          </a>
        </li>

        
        

      </ul>
    </section>
  </aside>