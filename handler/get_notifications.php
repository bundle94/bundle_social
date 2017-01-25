<?php
   require_once("../includes/functions.php");
   
  // sleep(1);
   
   $query=$connection->query("SELECT * FROM notifications WHERE main_person='{$_SESSION['username']}'");
   $query->setFetchMode(PDO::FETCH_ASSOC);
   if($query->rowCount()>0)
   {
       echo "<span style='text-align:center'><a href='#'style='font-size:12px'>Mark all as seen</a></span>";
       foreach($query as $r)
	   {
			echo   "<li>
                        <a href='#'onclick=\"update_notif('{$r['sender']}')\">
                          <div class='pull-left'>
                            <img src='uploads/".get_profile_photo($r['caused_person'])."'width='25' height='25' style='border-radius:50%' alt='User Image'/>
                          </div>
                          <h4>
                            {$r['caused_person']}
                            <small><i class='fa fa-clock-o'></i> ".get_time_interval_sm($r['date_time'])."</small>
                          </h4>
                          <p>{$r['message']}</p>
                        </a>
                      </li>";
	   }
   }
   else
   {
        echo"<h4 style='text-align:center'>No notifications</h4>";
   }

?>