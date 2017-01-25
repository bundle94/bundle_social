<?php
	require("../includes/functions.php");
	
											if(check_for_photos($user))
										{
											$pic=get_user_photos($user);
											$count=1;
											foreach($pic as $r)
											{
												if($r==NULL)
												{
													echo "";
												}
												else
												{
													echo "<div style='float:left;margin-left:10px;margin-bottom:5px'><img src='uploads/{$r}'width='75'height='75'/></div>";
												}
												$count++;
											}
										}
?>