<?php
if (isset($_POST['signup'])) {
	$timi = "";
	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "rockygold";
	$msg_status = 'error';

	$con = mysqli_connect($server,$username,$password,$db_name);

	if(!$con)
		$msg = mysqli_error($con);
	else{
		function check_exist($con, $table, $tblcol, $tblval){
			$qry = "SELECT * FROM $table WHERE $tblcol = '".$tblval."'";
			$result = mysqli_query($con, $qry) or die("failed to check $table". mysql_error());
			if (mysqli_num_rows($result) > 0 ){
				return true;
			}else {
				return false;
			}
		}
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$first = $_POST['first'];
		$last = $_POST['last'];
	
		
		// echo "$email<br>";
		// echo "$password <br>";
		// echo "$first<br>";
		// echo "$last<br>";
		if(empty($email) || empty($password) || empty($first) || empty($last)) 
			$msg = "Fill all available fields";
		elseif(check_exist($con, "signup_base","username", $email)){
			$msg = "Email already exist";
		}else{
			$sql = "INSERT INTO signup_base (ID, username, password, firstname, lastname) VALUES ('','".$email."','".$password."','".$first."','".$last."')";
			$result = mysqli_query($con, $sql);
			if($result){
				$msg_status = 'success';
				$msg = "<center> signup successful. </center>";
			}
				
			else
				$msg = "failed to send";
		}
	}
}

  include "header.php";
  ?>


            <section class="page_title_2 bg_light_2 t_align_c relative wrapper">
				<div class="container">
					<h1 class="color_dark fw_light m_bottom_5">Sign Up</h1>
					<!--breadcrumbs-->
					
				</div>
            </section>
            
            
            <div class="container">
			<?php
					if(isset($msg)) echo "<div class='alert alert-".$msg_status."'></div>
					
					<div class='alert_box ".$msg_status." r_corners relative fs_medium m_bottom_10'>
						 ". $msg ."
						<i class='icon-cancel close_alert_box tr_all translucent circle t_align_c'></i>
					</div>
					";
				?>
            <form action=""  class="m_bottom_40 m_bottom_30" style="padding-top:15px;" method="post">
            
						<ul>
                            
							<li class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_10">
									<label for="input_1" class="required d_inline_b fw_light w_full m_top_8 m_xs_top_0">E-mail</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 m_bottom_10">
									<input type="email" id="input_1" class="r_corners fw_light color_dark w_full" name="email">
								</div>
							</li>
							<li class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_10">
									<label for="input_2" class="required d_inline_b fw_light w_full m_top_8 m_xs_top_0">Password</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 m_bottom_10">
									<input type="password" id="input_2" class="r_corners fw_light color_dark w_full" name="password">
								</div>
							</li>
						
							<li class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_10">
									<label for="input_3" class="required d_inline_b fw_light w_full m_top_8 m_xs_top_0" >First Name</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 m_bottom_10">
									<input type="text" id="input_3" class="r_corners fw_light color_dark w_full" name="first">
								</div>
							</li>
							<li class="row">
								<div class="col-lg-3 col-md-3 col-sm-3 m_bottom_10">
									<label for="input_4" class="required d_inline_b fw_light w_full m_top_8 m_xs_top_0">Last Name</label>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-9 m_bottom_10">
									<input type="text" id="input_4" class="r_corners fw_light color_dark w_full" name="last">
								</div>
							</li>

							
							
                            <li class="row">
						     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4">
								<button class="button_type_5 tr_all color_blue transparent fs_medium r_corners" name="signup">Signup</button>
                             </div>
                             
                        </ul>
        
                    </form>
        </div>
		    <footer>
               <section class="footer_bottom_part t_align_c color_navyblue bg_light_4 fw_light">
					<p>&copy; 2018 rockygold. All Rights Reserved.</p>
                </section>
        </footer> 							
											


        </body>
        </html>
