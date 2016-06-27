<?php //call by id
 $my_postid = 47;

$content_post = get_post($my_postid);

 $content= $content_post->post_content;

 echo $content;
?>

  <?php //get post by specific category 
  $args = array(  'numberposts' => 3, 'cat'=>'3', 'post_status'=>"publish",'post_type'=>"post",'orderby'=>"post_date");

	$the_query = new WP_Query( $args );

while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<h5><b><a href="<?php the_permalink()?>"><?php  the_time('l, F jS, Y')?></a></b></h5>
 <p><?php echo get_field('short_description');?></p>
  <?php endwhile;?>
						
// give path in js or css
<?php  bloginfo('template_directory')?>/

//call widget
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('our-clients')) : ?><?php endif; ?>
	 
<?php  
	 //call data using post_type
 $args = array(   'post_type' => 'testimonial', 'posts_per_page'=>3 );

				
$myposts = get_posts( $args );

	foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
   <li>
 <blockquote>
  <?php the_content(); ?>
 <p class="testimonial-author">-<b>
   <?php the_title() ; ?>
      </b></p>
 </blockquote>
     </li>
 <?php endforeach;?>
			
            
            //search form
            
            <form class="navbar-form width-aut" role="search"  style="float:right; " action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="input-group" >
                    <input type="text" class="form-control" placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>"  style="background-color:#555; border:none; height:32px;">
                    <div class="input-group-btn" >
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
                    </div>
                </div>
            </form>
            
            
            // wp_nav_menu
            
             <?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'nav navbar-nav') ); ?>
			 
             
           <?php  //create new connection and fetch data
             
             global $wpdb;
$mydb = new wpdb('root','','base_crm_info','localhost');
$rows = $mydb->get_results("select * from make_base");
?>

  <?php 
  //call featured image
  $feat_image= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

if ($feat_image !=""):?>

<img class="media-object" src="<?php echo $feat_image;?>" alt="">

                        
  <?php else: echo " ";?>

<?php endif;?> 

//create directory before wordpress directory then edit in .htaccess file

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_URI} ^/other/(.*)$ [OR]
RewriteRule ^.*$ - [L]
</IfModule>

//other is directory name
