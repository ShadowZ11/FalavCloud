<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175170986-1');
</script>
<script data-ad-client="ca-pub-3008414481804558" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<header>
	<div id="header">
		<div id="header1">
			<div class="cl-1-3"></div>
			<div>
				<a id="logo" href="index.php">FALA</a>
			</div>
			<script type="text/javascript">
				function cacher(){
					const div = document.getElementById("menu-1-2");
					div.style.visibility = "hidden";
				}

				function visible(){
					const div = document.getElementById("menu-1-2");
					div.style.visibility = "visible";
				}
			</script>
			<div id="headerConnect" class="cl-1-3">
				<?php if (isset($_SESSION["token"])) {
				?>
					<div id="menuHeaderLogout">
							<a id="headerUserPopUp"  onmouseout="cacher()" onmouseover="visible()">
								<div >
									<?php
										if(isset($_SESSION["userName"])){
											$pseudo = strtoupper($_SESSION["userName"]);
											echo $pseudo;
										}else{
											$prenom = strtoupper($_SESSION["prenom"]);
											echo $prenom;
										}
										
									?> &nbsp;	
								</div>
								<img id="popUserPP" src="<?php echo $_SESSION["userPic"]; ?>">
							</a>
						<div id="menu-1-2" onmouseout="cacher()" onmouseover="visible()">
							<div id="barRMenu"></div>
							<div id="optionMenu">
								<a class="oneOptionMenu" href="account1.php?ID_USERS=<?php echo $_SESSION['id'];?>">MON PROFIL</a>
								<a class="oneOptionMenu" href="setProfil.php?ID_USERS=<?php echo $_SESSION['id'];?>">PARAMETRES</a>
								<a class="oneOptionMenu" href="logout.php">LOG OUT</a>
							</div>
						</div>
					</div>
				<?php
				}else{
				?>					
					<div id="LoginSignin">
						<a id="headerLogin" href="Login.php">LOG IN</a>
						|
						<a id="headerSignin" href="signIn.php">SIGN IN</a>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="header2">
			<input class="navBtn" type="checkbox" id="navBtn" />
			<label class="menuNavIcon" for="navBtn"><span class="navIcon"></span></label>
			<ul class="menuNav">
			    <li><a href="NewSearch.php">NEWS</a></li>
			</ul>
		</div>
	</div>
	<?php 
		if (isset($_SESSION["rang"]) && $_SESSION["rang"] == 3 ) {
	?>
		<div id="adminHeader">
			<a  href="usersManager.php"><img class="iconHeaderAdmin" src="https://img.icons8.com/ios-glyphs/30/000000/group.png" alt="gestion d'uilisateur" /></a>
			<a href="addNews.php"><img class="iconHeaderAdmin" src="https://img.icons8.com/ios-glyphs/26/000000/pencil.png" alt="éditer"/></a>
			<?php 
				if (isset($_GET['id_news'])) {	
			?>
				<a href="assets/functions/deletePage.php?<?php echo ( isset($_GET['ID_NEWS']))?'ID_NEWS='.$_GET['ID_NEWS'].'':"";?>"><img class="iconHeaderAdmin" src="https://img.icons8.com/ios-glyphs/30/000000/delete-forever.png" alt="supprimer la page'"/></a>
			<?php
				}
			?>
		</div>
	<?php 
		}
	?>
</header>