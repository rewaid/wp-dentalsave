<?php
global $dfd_ronneby;
$footer_style_option = isset($dfd_ronneby['footer_variant']) ? $dfd_ronneby['footer_variant'] : '';
$footer_style = !empty($footer_style_option) ? $footer_style_option : '1';
$footer_class = 'footer-style-'.$footer_style;
$footer_class .= (isset($dfd_ronneby['footer_bg_dark']) && strcmp($dfd_ronneby['footer_bg_dark'], '1') === 0) ? ' dfd-background-dark' : '';
$footer_class .= (strcmp($footer_style_option, '4') === 0) ? ' no-paddings' : '';

$dark_sub_footer_bg = (isset($dfd_ronneby['sub_footer_bg_dark']) && strcmp($dfd_ronneby['sub_footer_bg_dark'], '1') === 0) ? ' dfd-background-dark' : '';
?>

<?php if($footer_style != '4') : ?>

<div id="footer-wrap">
	
	<section id="footer" class="<?php echo esc_attr($footer_class); ?>">

		<?php get_template_part('templates/footer/style', $footer_style); ?>

	</section>

	<?php if(
				isset($dfd_ronneby['copyright_footer']) &&
				//strcmp($dfd_ronneby['copyright_footer'], '1' === 0) &&
				isset($dfd_ronneby['enable_subfooter']) &&
				(strcmp($dfd_ronneby['enable_subfooter'], '1') === 0) &&
				isset($dfd_ronneby['footer_copyright_position']) &&
				(strcmp($dfd_ronneby['footer_copyright_position'], 'footer') !== 0)
			) : ?>
		<section id="sub-footer" class="<?php echo esc_attr($dark_sub_footer_bg); ?>">
			<div class="row">
				<div class="twelve columns subfooter-copyright text-center">
					<?php echo $dfd_ronneby['copyright_footer']; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

</div>
<?php endif; ?>

<?php if(isset($dfd_ronneby['site_boxed']) && $dfd_ronneby['site_boxed']) : ?>
	</div>
	<script type="text/javascript">
		(function($) {
			var sideHeaderSetter = function() {
				var header = $('#header-container');
				if(header.hasClass('header-style-5')) {
					var bodyWrapper = $('.boxed_layout');
					var bodyWrapperOffset = bodyWrapper.offset().left;
					if(header.hasClass('left')) {
						header.find('#header').css('left', bodyWrapperOffset);
					}
					if(header.hasClass('right')) {
						header.find('#header').css('right', bodyWrapperOffset);
					}
				}
			};
			sideHeaderSetter();
			$(window).on('load resize', sideHeaderSetter);
		})(jQuery);
	</script>
<?php endif; ?>

<?php echo isset($dfd_ronneby['custom_js']) ? $dfd_ronneby['custom_js'] : ''; ?>

</div>

<div id="sidr">	
	<div class="widget-vertical-scroll">
		<?php dynamic_sidebar('sidebar-sidearea'); ?>
	</div>
</div>
<a href="#sidr-close" class="dl-trigger dfd-sidr-close"></a>

<?php
if($_SERVER['SERVER_NAME'] ==  "rnbtheme.com" ||  $_SERVER['SERVER_NAME'] ==  "themes.dfd.name" || $_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === 'localhost'){
	require_once locate_template('inc/dfd_buttons.php'); //Custom style Panel
}
?>
<?php wp_footer(); ?>

<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
// custom configuration goes here (www.olark.com/documentation) /
olark.identify('1591-165-10-1525');/*]]>*/</script><noscript><a href="https://www.olark.com/site/1591-165-10-1525/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->

</body>
</html>
