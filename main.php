<?php 
session_start();
$id=$_GET['id'];
$con=mysqli_connect('localhost','root','root','social');
$query=mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
$result=$query->fetch_assoc();
$_SESSION['user'] = [
    'id' => $result['id'],
    'full_name' => $result['full_name'],
    'email' => $result['email'],
    'avatar' => $result['avatar']
];
    $userId = $_GET['id'];
    $_SESSION['userId'] = $userId;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chatty</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
   .log{
	color: red;
	}
	.head{
		color: black;
		font-weight: bolds;
	}

    </style>
</head>
<body class="bg-light ">
	<div class="container-fluid bg-white">
		
	</div>
	<div class="container">
		<div class="row">
			<!--левая колонка-->
			<div class="col-3">
				<div class="bg-white mt-2 rounded">
					<div>
						<img src="<?= $_SESSION['user']['avatar'] ?>" class="w-100">
					</div>

					<div class="row">
						<div class="col-8">
							<div>
								<a href="#" class="head"><?= $_SESSION['user']['full_name'] ?></a>
							</div>
							<div>
								<a href="#"><?= $_SESSION['user']['email'] ?></a>
							</div>
						</div>
					</div>
					<div class="row">
					</div>

				</div>
				<!--topics-->
				<div class="bg-white rounded ">
					<a href="vendor/logout.php" class="log">Выход</a>
					<a href="update.php?id=<?php echo $userId; ?>">Редактирование профиля</a>
				</div>
			</div>
			<!---middle колонка--->
			<div class="col-6">
				<div class="row">
					<div class="col-2">
						<img src="<?= $_SESSION['user']['avatar'] ?>" class="rounded-circle w-100">
					</div>
					<div class="col-10">
							 <form action="tweet.php" enctype="multipart/form-data" method="POST">
							 	<input type="hidden" name="nick" value="<?php echo $result['login']?>">
							 	<input type="hidden" name="id" value="<?php echo $result['id']?>">
							 	<input name="img" type="file">
							 	<input type="" name="text">
							 	<button >Добавить</button>
							 </form>
					</div>
				</div>
				<div class="row">
					<!--post1 begins-->
			        <?php 
			        $query = mysqli_query($con, 'SELECT * FROM post ORDER BY id DESC');
					?>
					<?php for ($i = 0; $i < $query->num_rows; $i++) { ?>
						<?php  $post=$query->fetch_assoc(); 
						  		$authorId = $post['author_id'];
    							$postId = $post['id'];

    							$userResult = mysqli_query($con, "SELECT * FROM users WHERE id=$authorId");
   								 $user = mysqli_fetch_assoc($userResult);
    							$avatar = $user['avatar'];

    							if($authorId == $_SESSION['userId']) { // проверяем соответствие идентификаторов?>
			            <div class="col-2">
			              <img src="<?= $avatar ?>" class="rounded-circle w-50">
			            </div>
			            <div class="col-10">
			              	<div class="row">
			                	<h5>
			                 	 	<a href="#" class="text-dark"><?php echo $post['name'] ?></a>
			                	</h5>
			              	</div>
			              	<div>
			                	<p><?php echo $post['text'] ?></p>
			              	</div>
			              	<div>
				                <img src="<?php  echo $post['img']?>" class="w-100 rounded">
				                <form action="delete.php" method="POST">
				                	<input type="hidden" name="<?php echo $result['id']?>">
				                	<a href="delete.php?post_id=<?= $post['id'] ?>">Удалить</a>
				                	</form>
				                	<form action="vendor/bca.php" method="POST">
				                		<input type="hidden" name="<?php echo $result['id']?>">
				                		<button name="change" value="<?php echo $post['id'] ?>">Редактировать</button>
				                	</form>
			              	</div>
			              	<div class="row">
				                <div class="col-3">
				                  <img src="images/like.png">
				                </div>
				                <div class="col-3">
				                  <img src="images/comment.png">
				                </div>
				                <div class="col-3">
				                   <img src="images/envelope.png">
				                </div>
				                <div class="col-3">
				                   <img src="images/retweet.png">
				                </div>
			              	</div>
			            </div>
			           <?php } else {?>
			            <div class="col-2">
			              <img src="<?= $avatar ?>" class="rounded-circle w-50">
			            </div>
			            <div class="col-10">
			              	<div class="row">
			                	<h5>
			                 	 	<a href="#" class="text-dark"><?php echo $post['name'] ?></a>
			                	</h5>
			              	</div>
			              	<div>
			                	<p><?php echo $post['text'] ?></p>
			              	</div>
			              	<div>
				                <img src="<?php  echo $post['img']?>" class="w-100 rounded">
			              	</div>
			              	<div class="row">
				                <div class="col-3">
				                  <img src="images/like.png">
				                </div>
				                <div class="col-3">
				                  <img src="images/comment.png">
				                </div>
				                <div class="col-3">
				                   <img src="images/envelope.png">
				                </div>
				                <div class="col-3">
				                   <img src="images/retweet.png">
				                </div>
			              	</div>
			            </div>
			           <?php } ?>
			          <?php } ?>
					<!--post 1 ends-->
				</div>
			</div>
			<!---right колонка--->
			<div class="col-3">
				<div class="bg-white rounded">
					<div class="row ml-2">
						<h2>Chatty</h2>
					</div>
					<div class="row">
						<div class="col-4">
							<img src="images/1.jpeg" class="rounded-circle w-100 ">
						</div>
						<div class="col-8">
							<h4>Welcome to Chatty</h4>
							<p class="text-secondary">@chatty</p>
						</div>
					</div>
				</div>
				<div class="col-12 bg-white mt-1 rounded">
					The best social network...ever
				</div>
			</div>
		</div>
	</div>
</body>
</html>
