<?php
/*
Plugin Name: Wordpress SEO-Rank
Plugin URI: http://nexxuz.com/wordpress-seo-rank-plugin.html
Description: Seo report on your  dashboard of all your statistics ranking in web:<br>\n<br>- PageRank Google<br>- Alexa Rank	<br>- Backlinks Google	<br>- Backlinks Yahoo	<br>- Users Registered	<br>- FeedBurner Subscribers	<br>- Followers Twitter	<br>- Youtube Subscribers <br> - Facebook Likes <br> - Google +1  <br> - Widget <br> 
Author: jodacame
Author URI: http://nexxuz.com/
Version: 1.9.1



*/
function wp_seo_rank_widget_admin_function() {
	global $wpdb;
  $data = get_option('wp_seo_rank');
  
  if (isset($_POST['wp_seo_rank_save'])){
    $data['feedburner'] = attribute_escape($_POST['wp_seo_rank_feedburner']);
    $data['twitter'] = attribute_escape($_POST['wp_seo_rank_twitter']);
    $data['youtube'] = attribute_escape($_POST['wp_seo_rank_youtube']);
    $data['facebook'] = attribute_escape($_POST['wp_seo_rank_facebook']);
    $data['autoupdate'] = attribute_escape($_POST['wp_seo_rank_autoupdate']);
    update_option('wp_seo_rank', $data);
  }
   if (isset($_POST['wp_seo_rank_update'])){
	   update_seo(1);
	  
	}
	?>
	
	
	
	
  <?php


	$data = get_option('wp_seo_rank');
	?>
	
		<center>
		<!--<img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/logo.png">-->
		
		</center>
		<table  id="wp-seo-rank"  class="adsTable" style="width:95%"  CELLSPACING="5px">
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/pr.png" align="absmiddle" style="padding-right:10px">PageRank</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="http://pagerank.nexxuz.com/?url=<?php echo site_url(); ?>"><?php echo $data['ValPageRank'] ?>/10</a></span>
						
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/alexa.png" align="absmiddle" style="padding-right:10px">Alexa Rank</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="http://www.alexa.com/siteinfo/<?php echo site_url(); ?>"><?php echo number_format($data['ValAlexaRank']); ?></a></span>
						
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/google.png" align="absmiddle" style="padding-right:10px">Backlinks Google</span> 
				</td>
			<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="http://www.google.com/search?oe=utf8&ie=utf8&source=uds&start=0&filter=0&hl=en&q=link:<?php echo site_url(); ?>"><?php echo number_format(intval($data['ValBacklinksGoogle'])); ?></a></span>
						
				</td>
			</tr>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/yahoo.png" align="absmiddle" style="padding-right:10px">Backlinks Yahoo</span> 
				</td>
			<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="http://siteexplorer.search.yahoo.com/search;_ylt=A0oG7zbdV5ZMIt8AdFddhMkF?p=<?php echo site_url(); ?>&y=Explore+URL&fr=sfp"><?php echo number_format($data['ValBacklinksYahoo']); ?></a></span>
						
				</td>
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/user.png" align="absmiddle" style="padding-right:10px">Users Registered</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users");
																?><a href="<?php echo site_url(); ?>/wp-admin/users.php"><?php echo $users ?></a></span>
						
				</td>
			</tr>
			
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/feedburner.png" align="absmiddle" style="padding-right:10px">FeedBurner Subscribers</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_Blank" href="http://feeds.feedburner.com/<?php echo $data['feedburner']; ?>"><?php echo number_format($data['ValFeedBurner']); ?></a></span>
						
				</td>
			</tr>
			
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/twitter.png" align="absmiddle" style="padding-right:10px">Followers</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="http://twitter.com/<?php echo $data['twitter']; ?>/followers"><?php echo number_format($data['ValFollowers']); ?></a></span>
						
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/facebook.png" align="absmiddle" style="padding-right:10px">Facebook</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="https://www.facebook.com/<?php echo $data['facebook']; ?>"><?php echo number_format($data['ValFacebook']); ?></a></span>
						
				</td>
			</tr>
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/youtube.png" align="absmiddle" style="padding-right:10px">Youtube Subscribers</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><a target="_blank" href="http://www.youtube.com/user/<?php echo $data['youtube']; ?>"><?php echo number_format($data['ValYoutube']); ?></a></span>
						
				</td>
			</tr>
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/plus.png" align="absmiddle" style="padding-right:10px">Google +1</span> 
				</td>
				<td align="right">
					<span style="color:#5C8AB6;font-weight:bold;"><?php echo number_format($data['ValPlus']); ?></span>
						
				</td>
			</tr>
			
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/update.png" align="absmiddle" style="padding-right:10px">Last Update</span> 
				</td>
				<td align="right">
					<span style="color:#000000;font-weight:bold;"><?php echo $data['ValLastUpdate']; ?></span>
						
				</td>
			</tr>
			
			
		</table>
		<br>
		
		
		
	<span style="width:100%;text-align:center;display:block"><a target="_Blank" href="http://nexxuz.com/donate.php"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/donate.png" border="0" align="top" style="padding-right:2px"> Donate</a></span><br>
	<span style="width:100%;text-align:right;display:block"><span style="cursor:pointer" onclick="jQuery('#settingSeo').slideToggle(200);"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/settings.png" border="0" align="top" style="padding-right:2px"> Settings</span></span><br>

	<div id="settingSeo" style="display:none">
		<form method="POST">
		<table width="100%">
		<tr>
			<td>FeedBurner </td><td><input name="wp_seo_rank_feedburner" type="text" value="<?php echo $data['feedburner']; ?>" /></td>
		</tr>
		<tr>
			<td>Twitter </td><td><input name="wp_seo_rank_twitter" type="text" value="<?php echo $data['twitter']; ?>" /></td>
		</tr>
		<tr>
			<td>Youtube </td><td><input name="wp_seo_rank_youtube" type="text" value="<?php echo $data['youtube']; ?>" /></td>
		</tr>
		<tr>
			<td>Facebook Page </td><td><input name="wp_seo_rank_facebook" type="text" value="<?php echo $data['facebook']; ?>" /></td>
		</tr>
		
		<tr>
		<?php
		
		if($data['autoupdate']=='on'){
			$checkedSeo="CHECKED";
		}
		
		?>
		<td></td><td><label><input name="wp_seo_rank_autoupdate" type="checkbox" <?php echo $checkedSeo; ?> /> Auto Update Every Day</label></td>
		</tr>
		<tr>
		<td valign="bottom"  align="right"><br><br><input name="wp_seo_rank_save" type="submit" value="Save"></td><td valign="bottom"><input type="submit" name="wp_seo_rank_update"  value="Force Update Now!"> <span style="cursor:pointer;color:#FF0000" onclick="jQuery('#seoHelp').toggle(200)";> <strong>?</strong> </span></td>
		</tr>
	</table>
	<div id="seoHelp" style="display:none;color:#FF0000">
	This may take several minutes

	</div>
		
		
	
	</form>
	</div>
	<br>
	<center>
	<small>Wordpress SEO-Rank <strong>Powered By <a href="http://nexxuz.com/mis-proyectos/wordpress-2">Jodacame</a></strong></small>
		</center>

	<?
	
} 


function wp_seo_rank_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_seo_rank_dashboard_widget', 'Wordpress SEO-Rank', 'wp_seo_rank_widget_admin_function');	
} 

function update_seoA(){
	$data = get_option('wp_seo_rank');
	
		
		if($data['autoupdate']=='on'){
			update_seo();
		}
}
function update_seo($force=null){
	$data = get_option('wp_seo_rank');
	$data['feedburner'] = $data['feedburner'];
    $data['twitter'] = $data['twitter'];
    $data['youtube'] = $data['youtube'];
    $data['autoupdate'] = $data['autoupdate'];
    $data['facebook'] = $data['facebook'];
		
		
	
	$url=site_url();
	$fecha=explode(' ',$data['ValLastUpdate']);
	$hoy=date('Y-m-d');
	if($force==1){
		$hoy="1900-01-01";
	}
	
	if($hoy!=$fecha[0]){
		
		$data['ValPageRank'] = getprSeo($url);
		$data['ValAlexaRank'] = alexaRank($url);
		$data['ValBacklinksGoogle'] = get_backlinks_google($url);
		$data['ValBacklinksYahoo'] = getYahooLinks($url);
		$data['ValFeedBurner'] = getFeedBurner($data["feedburner"]);
		$data['ValFollowers'] = followerSeo($data["twitter"]);
		$data['ValYoutube'] = GetSubscriberCountYoutube($data["youtube"]);
		$data['ValFacebook'] = GetFacebook($data["facebook"]);
		$data['ValPlus'] = getPlus($url);
		$data['ValLastUpdate'] = date('Y-m-d');
		update_option('wp_seo_rank', $data);
	}

}
add_action('wp_dashboard_setup', 'wp_seo_rank_add_dashboard_widgets' );

/*************************
 * FUNCIONES SEO
 *************************/

function GetFacebook($pageF) 
{
	/*
	$data = php_curl('http://graph.facebook.com/?id='.$pageF);

	$json = $data;

	$obj = json_decode($json);
	$like_no = $obj->{'shares'};
	
	return intval(trim($like_no));*/

	$url = $pageF;
	$url2 = "http://api.facebook.com/method/fql.query?query=select%20like_count%20from%20link_stat%20where%20url='$url'&format=atom";
	$xml=simplexml_load_file($url2);
	$f = intval($xml->link_stat->like_count);
	/* Facebook FanPage */
	if($f == 0)
	{
		$url = "http://graph.facebook.com/".$pageF;
		$page_id= json_decode(php_curl($url));
		$f =  intval($page_id->likes);
	}
	return $f;	
	
}

function getPlus($url){
 
 $ch = curl_init();  
 curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '/","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
 
   
 $curl_results = curl_exec ($ch);
 curl_close ($ch);
 
 $parsed_results = json_decode($curl_results, true);
 
 return intval($parsed_results[0]['result']['metadata']['globalCounts']['count']);

}
 
function followerSeo($user){
	if (trim($user)=='')
		return 0;

	$xml=simplexml_load_file("http://twitter.com/users/show.xml?screen_name=$user");
	$resp=$xml->followers_count;
	return intval(trim($resp));

}
function GetSubscriberCountYoutube($user){
	if (trim($user)=='')
		return 0;
	$xmlData = php_curl('http://gdata.youtube.com/feeds/api/users/' . strtolower($user));  
	if(strlen($xmlData)<20)
		return 0;
	$xmlData = str_replace('yt:', 'yt', $xmlData); 
	$xml = new SimpleXMLElement($xmlData);   
	$resp=$xml->ytstatistics['subscriberCount'];
	return intval(trim($resp));
}

function alexaRank($domain){
    $remote_url = 'http://data.alexa.com/data?cli=10&dat=snbamz&url='.trim($domain);
    $search_for = '<POPULARITY URL';
    if ($handle = @fopen($remote_url, "r")) {
        while (!feof($handle)) {
            $part .= fread($handle, 100);
            $pos = strpos($part, $search_for);
            if ($pos === false)
            continue;
            else
            break;
        }
        $part .= fread($handle, 100);
        fclose($handle);
    }
    $str = explode($search_for, $part);
    $str = array_shift(explode('"/>', $str[1]));
    $str = explode('TEXT="', $str);
 
    return $str[1];
}
function get_backlinks_google($url){
	$content = php_curl('http://ajax.googleapis.com/ajax/services/search/web?v=1.0&filter=0&key=ABQIAAAA6f5Achoodo5s2Q2049vn6BSIkO30j4gnxwlOBxQkFXOonq3PsBQ0hUYBhAxwx8DYL03zbFQWDSv_nA&q=link:' . urlencode($url));		
	$data = json_decode($content);
	return intval($data->responseData->cursor->estimatedResultCount);	
 
}
function getYahooLinks($dominio) {
	$appid = "31245124213";
	$feed="http://search.yahooapis.com/SiteExplorerService/V1/inlinkData?appid=".$appid."&query=$dominio&entire_site=1&omit_inlinks=domain";
	$contenido = php_curl($feed);
	preg_match('/totalResultsAvailable=("(.*)"?)/', $contenido, $treffer);
	$total=str_replace('"','',$treffer[1]);
	return intval($total);			
 
}

function getFeedBurner($user){

	$xml=php_curl("https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=http://feeds.feedburner.com/$user");
	
	return get_match('/circulation="(.*)"/isU',$xml);

}
function get_match($regex,$content){
  preg_match($regex,$content,$matches);
  return $matches[1];
}

function getprSeo($url){
	$dc = "http://toolbarqueries.google.com/";
	$gpr =& new GooglePageRank(trim($url));
	$pagerank = $gpr->getPageRank($dc);
	return $pagerank;
	
}

function php_curl($url){
	$c = curl_init($url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$xmlData = curl_exec($c);
	curl_close($c);	
	return $xmlData;
}
/*************************
 * FIN FUNCIONES SEO
 * ***********************/
add_action("widgets_init", array('wp_seo_rank', 'register'));
add_action("wp_login", 'update_seoA');


/*************************
 *  CSS
 * ***********************/
 
 function writeCSSSEO() {
  echo ( '
  <style>
  #wp-seo-rank td{
	  border:1px #F3F3F3 dashed;
  }
  
.adsTable
{
  
  background-color: #fff;
  border: 1px solid #ccc;
  -webkit-border-radius: 7px;
  -moz-border-radius: 7px;
  border-radius: 7px;
  margin-top:20px;
  margin-left:4px;
  margin-right:4px;
  padding: 3px;
  
}
.adsTable td
{
 font-size:0.8em;
 padding:0px;
  border-bottom: 1px dotted #ccc;
}  
  </style>' ); 
}
add_action('admin_head', 'writeCSSSEO');
 
 
 

register_activation_hook( __FILE__, array('wp_seo_rank', 'activate'));
register_deactivation_hook( __FILE__, array('wp_seo_rank', 'deactivate'));
class wp_seo_rank {
  function activate(){
    $data = array( 'option1' => 'Default value' ,'title' => 'Wordpress SEO-Rank');
    if ( ! get_option('wp_seo_rank')){
      add_option('wp_seo_rank' , $data);
    } else {
      update_option('wp_seo_rank' , $data);
    }
  }
  function deactivate(){
    delete_option('wp_seo_rank');
  }
function control(){
  $data = get_option('wp_seo_rank');
  $show_pr='';
  $show_alexa='';
  $show_google='';
  $show_yahoo='';
  $show_user='';
  $show_feedburner='';
  $show_twitter='';
  $show_youtube='';
  $show_facebook='';
  $show_plus='';

	if($data['show_pr']=='on')
		$show_pr="CHECKED";
	if($data['show_alexa']=='on')
		$show_alexa="CHECKED";
	if($data['show_google']=='on')
		$show_google="CHECKED";
	if($data['show_yahoo']=='on')
		$show_yahoo="CHECKED";
	if($data['show_user']=='on')
		$show_user="CHECKED";
	if($data['show_feedburner']=='on')
		$show_feedburner="CHECKED";			
	if($data['show_twitter']=='on')
		$show_twitter="CHECKED";
	if($data['show_youtube']=='on')
		$show_youtube="CHECKED";
	if($data['show_facebook']=='on')
		$show_facebook="CHECKED";
	if($data['show_plus']=='on')
		$show_plus="CHECKED";

    
	?>
	<table>
	<tr>
		<td>Title</td><td><input name="wp_seo_rank_title" type="text" value="<?php echo $data['title']; ?>" /></td>
	</tr>
	</table>

	<table  id="wp-seo-rank" style="width:95%"  CELLSPACING="5px">
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/pr.png" align="absmiddle" style="padding-right:10px">PageRank</span> 
				</td>
				<td>
				<input type="checkbox" <?php echo $show_pr; ?> name="wp_seo_rank_show_pr">
				</td>
				
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/alexa.png" align="absmiddle" style="padding-right:10px">Alexa Rank</span> 
				</td>
			<td>
				<input type="checkbox" <?php echo $show_alexa; ?> name="wp_seo_rank_show_alexa">
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/google.png" align="absmiddle" style="padding-right:10px">Backlinks Google</span> 
				</td>
		<td>
				<input type="checkbox" <?php echo $show_google; ?> name="wp_seo_rank_show_google">
				</td>
			</tr>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/yahoo.png" align="absmiddle" style="padding-right:10px">Backlinks Yahoo</span> 
				</td>
		<td>
				<input type="checkbox" <?php echo $show_yahoo; ?> name="wp_seo_rank_show_yahoo">
				</td>
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/user.png" align="absmiddle" style="padding-right:10px">Users Registered</span> 
				</td>
			<td>
				<input type="checkbox" <?php echo $show_user; ?> name="wp_seo_rank_show_user">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/feedburner.png" align="absmiddle" style="padding-right:10px">FeedBurner</span> 
				</td>
				<td>
				<input type="checkbox"  <?php echo $show_feedburner; ?> name="wp_seo_rank_show_feedburner">
				</td>
			</tr>
			
			
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/twitter.png" align="absmiddle" style="padding-right:10px">Followers</span> 
				</td>
			<td>
				<input type="checkbox" <?php echo $show_twitter; ?> name="wp_seo_rank_show_twitter">
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/facebook.png" align="absmiddle" style="padding-right:10px">Facebook</span> 
				</td>
			<td>
				<input type="checkbox" <?php echo $show_facebook; ?> name="wp_seo_rank_show_facebook">
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/youtube.png" align="absmiddle" style="padding-right:10px">Youtube Subscribers</span> 
				</td>
			<td>
				<input type="checkbox" <?php echo $show_youtube; ?> name="wp_seo_rank_show_youtube">
				</td>
			</tr>
			<tr>
				<td>
					<span style="color:#5C8AB6"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/plus.png" align="absmiddle" style="padding-right:10px">Google +1</span> 
				</td>
			<td>
				<input type="checkbox" <?php echo $show_plus; ?> name="wp_seo_rank_show_plus">
				</td>
			</tr>
			
			
		
			
			
		</table>
		<br>
		<span style="width:100%;text-align:center;display:block"><a target="_Blank" href="http://nexxuz.com/donate.php"><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/donate.png" border="0" align="top" style="padding-right:2px"> Donate</a></span><br>
		
  <?php
   if (isset($_POST['wp_seo_rank_title'])){
    $data['title'] = attribute_escape($_POST['wp_seo_rank_title']);
    $data['show_pr'] = attribute_escape($_POST['wp_seo_rank_show_pr']);
    $data['show_alexa'] = attribute_escape($_POST['wp_seo_rank_show_alexa']);
    $data['show_google'] = attribute_escape($_POST['wp_seo_rank_show_google']);
    $data['show_yahoo'] = attribute_escape($_POST['wp_seo_rank_show_yahoo']);
    $data['show_user'] = attribute_escape($_POST['wp_seo_rank_show_user']);
    $data['show_feedburner'] = attribute_escape($_POST['wp_seo_rank_show_feedburner']);
    $data['show_twitter'] = attribute_escape($_POST['wp_seo_rank_show_twitter']);
    $data['show_youtube'] = attribute_escape($_POST['wp_seo_rank_show_youtube']);
    $data['show_date'] = attribute_escape($_POST['wp_seo_rank_show_date']);
    $data['show_facebook'] = attribute_escape($_POST['wp_seo_rank_show_facebook']);
    $data['show_plus'] = attribute_escape($_POST['wp_seo_rank_show_plus']);
    
    update_option('wp_seo_rank', $data);
  }
}
  function widget($args){
	  global $wpdb;
	  $data = get_option('wp_seo_rank');
    echo $args['before_widget'];
    echo $args['before_title'] . $data['title'] . $args['after_title'];
    
    ?>
    <table  id="wp-seo-rank" style="width:95%"  CELLSPACING="5px">
    <?php if($data['show_pr']=='on'){ ?>
			<tr>
				<td>
					<span><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/pr.png" align="absmiddle" style="padding-right:10px">PageRank</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo $data['ValPageRank'] ?>/10</span>
						
				</td>
			</tr>
		
		<?php }if($data['show_alexa']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/alexa.png" align="absmiddle" style="padding-right:10px">Alexa Rank</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValAlexaRank']); ?></span>
						
				</td>
			</tr>
		<?php }if($data['show_google']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/google.png" align="absmiddle" style="padding-right:10px">Backlinks Google</span> 
				</td>
			<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValBacklinksGoogle']); ?></span>
						
				</td>
		
			</tr>
		<?php }if($data['show_yahoo']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/yahoo.png" align="absmiddle" style="padding-right:10px">Backlinks Yahoo</span> 
				</td>
			<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValBacklinksYahoo']); ?></span>
						
				</td>
			
			<tr>
			<?php }if($data['show_user']=='on'){ ?>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/user.png" align="absmiddle" style="padding-right:10px">Users Registered</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users");
																echo $users ?></span>
						
				</td>
			</tr>
			<?php }if($data['show_feedburner']=='on'){ ?>
			
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/feedburner.png" align="absmiddle" style="padding-right:10px">FeedBurner</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValFeedBurner']); ?></span>
						
				</td>
			</tr>
			
			<?php }if($data['show_facebook']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/facebook.png" align="absmiddle" style="padding-right:10px">Facebook</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValFacebook']); ?></span>
						
				</td>
			</tr>
			
				<?php }if($data['show_twitter']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/twitter.png" align="absmiddle" style="padding-right:10px">Followers</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValFollowers']); ?></span>
						
				</td>
			</tr>
			
			<?php }if($data['show_youtube']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/youtube.png" align="absmiddle" style="padding-right:10px">Youtube Subscribers</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValYoutube']); ?></span>
						
				</td>
			</tr>
			<?php }if($data['show_plus']=='on'){ ?>
			<tr>
				<td>
					<span ><img src="<?php echo WP_PLUGIN_URL ?>/wordpress-seo-rank/images/plus.png" align="absmiddle" style="padding-right:10px">Google +1</span> 
				</td>
				<td align="right">
					<span style="font-weight:bold;"><?php echo number_format($data['ValPlus']); ?></span>
						
				</td>
			</tr>
			<?php } ?>
			
					
		</table>

    <?
    echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('Worpress SEO-Rank', array('wp_seo_rank', 'widget'));
    register_widget_control('Worpress SEO-Rank', array('wp_seo_rank', 'control'));
  }
}

/******************************
 * CLASS PAGERANK
 * ****************************/
 
 
class GooglePageRank {

	var $_GOOGLE_MAGIC = 0xE6359A60;
	var $_url = '';
	var $_checksum = '';

	function GooglePageRank($url)
	{
		$this->_url = $url;
	}

	function _strToNum($Str, $Check, $Magic)
	{
		$Int32Unit = 4294967296;

		$length = strlen($Str);
		for ($i = 0; $i < $length; $i++) {
			$Check *= $Magic;    

			if ($Check >= $Int32Unit) {
				$Check = ($Check - $Int32Unit * (int) ($Check / $Int32Unit));
				$Check = ($Check < -2147483647) ? ($Check + $Int32Unit) : $Check;
			}
			$Check += ord($Str{$i});
		}
		return $Check;
	}

	function _hashURL($String)
	{
		$Check1 = $this->_strToNum($String, 0x1505, 0x21);
		$Check2 = $this->_strToNum($String, 0, 0x1003F);

		$Check1 >>= 2;
		$Check1 = (($Check1 >> 4) & 0x3FFFFC0 ) | ($Check1 & 0x3F);
		$Check1 = (($Check1 >> 4) & 0x3FFC00 ) | ($Check1 & 0x3FF);
		$Check1 = (($Check1 >> 4) & 0x3C000 ) | ($Check1 & 0x3FFF);   

		$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) <<2 ) | ($Check2 & 0xF0F );
		$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000 );

		return ($T1 | $T2);
	}

	function checksum()
	{
		if($this->_checksum != '') return $this->_checksum;

		$Hashnum = $this->_hashURL($this->_url);

		$CheckByte = 0;
		$Flag = 0;

		$HashStr = sprintf('%u', $Hashnum) ;
		$length = strlen($HashStr);

		for ($i = $length - 1;  $i >= 0;  $i --) {
			$Re = $HashStr{$i};
			if (1 == ($Flag % 2)) {
				$Re += $Re;
				$Re = (int)($Re / 10) + ($Re % 10);
			}
			$CheckByte += $Re;
			$Flag ++;
		}

		$CheckByte %= 10;
		if (0 !== $CheckByte) {
			$CheckByte = 10 - $CheckByte;
			if (1 === ($Flag%2) ) {
				if (1 === ($CheckByte % 2)) {
					$CheckByte += 9;
				}
				$CheckByte >>= 1;
			}
		}

		$this->_checksum = '7'.$CheckByte.$HashStr;
		return $this->_checksum;
	}

	function pageRankUrl($dcchosen)
	{
		return $dcchosen . 'tbr?client=navclient-auto&features=Rank:&q=info:'.$this->_url.'&ch='.$this->checksum();
	}

	function getPageRank($dcchosen)
	{
		$fh = @fopen($this->pageRankUrl($dcchosen), "r");
		if($fh)
		{
			$contenido = '';
			while (!feof($fh)) {
			  $contenido .= fread($fh, 8192);
			}
			fclose($fh);
			ltrim($contenido);
			rtrim($contenido);
			$contenido=str_replace("Rank_1:1:","",$contenido);
			$contenido=str_replace("Rank_1:2:","",$contenido);
			//$contenido=intval($contenido);
			$contenido=intval($contenido);
			
			if(is_numeric($contenido))
				return $contenido;
			else
				return -2;
		}
		return -1;
	}

}
