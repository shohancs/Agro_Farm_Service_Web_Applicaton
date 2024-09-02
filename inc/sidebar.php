<aside class="sidebar">


	

	<div class="tabs tabs-dark mb-4 pb-2">
		<ul class="nav nav-tabs">
			<li class="nav-item active">
				<a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a>
			</li>
		</ul>
		<div class="tab-content">
			<!-- Recent Post -->
			<div class="tab-pane active" id="recentPosts">
				<ul class="simple-post-list">
					<?php  
						$recentSql = "SELECT * FROM post WHERE status=1 ORDER BY post_id DESC LIMIT 3";
						$recentQuery = mysqli_query($db, $recentSql);

						while ( $row = mysqli_fetch_assoc($recentQuery) ) {
							$post_id 		= $row['post_id'];
							$title 			= $row['title'];
							$post_desc 		= $row['post_desc'];
							$image 			= $row['image'];
							$category_id 	= $row['category_id'];
							$author_id 		= $row['author_id'];
							$tags 			= $row['tags'];
							$status 		= $row['status'];
							$post_date 		= $row['post_date'];
							?>
								<li>
									<div class="post-image">
										<div class="img-thumbnail img-thumbnail-no-borders d-block">
											<a href="details.php?dId=<?php echo $post_id; ?>">
											<?php 
												if (!empty($image)) {
													echo '<img src="admin/assets/images/posts/' . $image . '" alt="'. $title .'"  width="50" height="50">';
												}
												else {
													echo '<img src="img/blog/wide/blog-11.jpg" alt="" width="50" height="50">';
												}
											?>
											
										</a>
										</div>
									</div>
									<div class="post-info">
										<a href="blog_details.php?dId=<?php echo $post_id; ?>"><?php echo $title; ?></a>
										<div class="post-meta">
											 <?php echo $post_date; ?>
										</div>
									</div>
								</li>
							<?php
						}
					?>
					
				</ul>
			</div>
		</div>
	</div>
</aside>