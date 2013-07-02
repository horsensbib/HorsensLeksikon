<?php
/**
 * HorsensLeksikon skin (based on modern), derived from monobook template.
 *
 * @todo document
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

require( $GLOBALS['wgStyleDirectory'] . '/MonoBook.php' );

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @ingroup Skins
 */
class SkinHorsensLeksikon extends SkinTemplate {
	var $skinname = 'horsensleksikon', $stylename = 'horsensleksikon',
		$template = 'HorsensLeksikonTemplate', $useHeadElement = true;

	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		
		$out->addModuleScripts('skins.horsensleksikon');
		$out->addMeta('verify-v1', 'kf+SBp4bmMokUCSXBemAuWUwOibpXNRYDThZQFqCG8k='); #Google Sitemap owner verification
	}

	function setupSkinUserCss( OutputPage $out ){
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles ('skins.horsensleksikon');
		$out->addStyle( 'horsensleksikon/ie-hacks.css', 'screen', 'lt IE 7' );
		$out->addStyle( 'horsensleksikon/rtl.css', 'screen', '', 'rtl' );
	}
}

/**
 * @todo document
 * @ingroup Skins
 */
class HorsensLeksikonTemplate extends MonoBookTemplate {

	/**
	 * @var Skin
	 */
	var $skin;
	/**
	 * Template filter callback for Modern skin.
	 * Takes an associative array of data set from a SkinTemplate-based
	 * class, and a wrapper for MediaWiki's localization database, and
	 * outputs a formatted page.
	 *
	 * @access private
	 */
	function execute() {
		$this->skin = $skin = $this->data['skin'];

		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

		$this->html( 'headelement' );
		
?>

<!--[if lt IE 7]>
<div id="kill-ie6">
<h3>Vidste du, at din browser er for&aelig;ldet?</h3>
<p>For at f&aring; den bedst mulige oplevelse p&aring; nettet, anbefaler vi, at du <a href="http://www.microsoft.com/danmark/windows/internet-explorer/default.aspx">opgraderer <strong>Internet Explorer</strong> til en nyere version</a>. Opgradering er gratis. Bruger du en PC p&aring; dit arbejde, b&oslash;r du tale med din IT-administrator. Du kan ogs&aring; pr&oslash;ve en af disse popul&aelig;re browsere: <a href="http://www.apple.com/dk/safari/">Safari</a>, <a href="http://www.google.dk/chrome/">Google Chrome</a>, <a href="http://www.mozilla.com/firefox/">Firefox</a> eller <a href="http://www.opera.com/download/">Opera</a>.</p>
</div> 
<![endif]-->

<div id="headerwrap">
	<div id="header">
  	<div id="sitename">
	  	<a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"<?php 
			echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('n-mainpage')) ?>>HorsensLeksikon</a>
    </div><!--/sitename-->
    
		<div class="portlet" id="usertools">
			<h5><?php $this->msg('personaltools') ?></h5>
			<ul>
				<?php foreach($this->data['personal_urls'] as $key => $item) { ?>
				<li id="<?php echo Sanitizer::escapeId( "pt-$key" ) ?>"<?php
					if ($item['active']) { ?> class="active"<?php } ?>><a href="<?php
					echo htmlspecialchars($item['href']) ?>"<?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('pt-'.$key)) ?><?php
					if(!empty($item['class'])) { ?> class="<?php
					echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
					echo htmlspecialchars($item['text']) ?></a></li>
				<?php } ?>
		</ul>
		</div><!--/usertools-->
  </div> <!--/header-->
</div><!--/headerwrap-->

<div id="navigationwrap">  
  <div id="globalmenu">
  	<ul id="globalnav">
    	<li class="home"><a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href'])?>"<?php 
		echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('n-mainpage')) ?>><b><span>Forsiden</span></b></a></li>
    	<li class="categories"><?php echo Linker::linkKnown( Title::newFromText( 'Kategorier', NS_SPECIAL ), '<b><span>Kategorier</span></b>'); ?></li>
    	<!-- li class="changes"><?php echo Linker::linkKnown( Title::newFromText( 'Seneste &aelig;ndringer', NS_SPECIAL ), '<b><span>Seneste &aelig;ndringer</span></b>'); ?></li -->
	<li class="series"><?php echo Linker::linkKnown( Title::newFromText( 'Borgerne fort&aelig;ller', NS_MAIN ), '<b><span>Borgerne fort&aelig;ller</span></b>'); ?></li>
    	<li class="newsletter"><?php echo Linker::linkKnown( Title::newFromText( 'Nyhedsbrev', NS_PROJECT ), '<b><span>Nyhedsbrev</span></b>'); ?></li>
    	<li class="help"><?php echo Linker::linkKnown( Title::newFromText( 'Hj&aelig;lp', NS_HELP ), '<b><span>Hj&aelig;lp</span></b>'); ?></li>
    </ul>

		 <form action="<?php $this->text('searchaction') ?>" id="searchform">
    	<div>
      <label for="searchInput"><?php $this->msg('search') ?></label>
			<input id="searchInput" name="search" type="text"<?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs('search'));
			if( isset( $this->data['search'] ) ) {
			?> value="<?php $this->text('search') ?>"<?php } ?> />
			<!-- span><input type='submit' name="go" class="searchButton" id="searchGoButton"	value="<?php $this->msg('searcharticle') ?>"<?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs( 'search-go' )); ?> /></span --> <span><input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs( 'search-fulltext' )); ?> /></span>
      </div>
		</form> 
  </div> <!--/globalmenu-->
</div><!--/navigationwrap-->

<div id="contentwrap">
 	<div id="tools">
    
		<div id="views">
			<h5><?php $this->msg('views') ?></h5>
			<ul>
			<?php	foreach($this->data['content_actions'] as $key => $tab) {
				echo '
				<li id="' . Sanitizer::escapeId( "view-$key" ) . '"';
					if( $tab['class'] ) {
						echo ' class="'.htmlspecialchars($tab['class']).'"';
						}
						echo'><a href="'.htmlspecialchars($tab['href']).'"';
						# We don't want to give the watch tab an accesskey if the
						# page is being edited, because that conflicts with the
						# accesskey on the watch checkbox.  We also don't want to
						# give the edit tab an accesskey, because that's fairly su-
						# perfluous and conflicts with an accesskey (Ctrl-E) often
						# used for editing in Safari.
					 	if( in_array( $action, array( 'edit', 'submit' ) )
				 		&& in_array( $key, array( 'edit', 'watch', 'unwatch' ))) {
				 			echo Linker::tooltip( "view-$key" );
				 		} else {
				 			echo Xml::expandAttributes(Linker::tooltipAndAccesskeyAttribs( "view-$key" ));
					 	}
				 	echo '><span>'.htmlspecialchars($tab['text']).'</span></a></li>';
				} ?>
			</ul>
		</div><!--/views-->
    
    <div id="toolstab">
 	  	<p><strong>Flere v&aelig;rkt&oslash;jer</strong></p>
   	</div><!--/toolstab-->
    <div id="toolbox">
 	  	<div id="portlets">
					<?php 
					$sidebar = $this->data['sidebar'];		
					if ( !isset( $sidebar['SEARCH'] ) ) $sidebar['SEARCH'] = true;
					if ( !isset( $sidebar['TOOLBOX'] ) ) $sidebar['TOOLBOX'] = true;
					if ( !isset( $sidebar['LANGUAGES'] ) ) $sidebar['LANGUAGES'] = true;

					foreach ($sidebar as $boxName => $cont) {
						if ( $boxName == 'SEARCH' ) {
							$this->searchBox();
						} elseif ( $boxName == 'TOOLBOX' ) {
							$this->toolbox();
						} elseif ( $boxName == 'LANGUAGES' ) {
							$this->languageBox();
						} else {
							$this->customBox( $boxName, $cont );
						}
					}
				?>
			</div><!--/portlets -->
   		<small><span>Luk</span></small>  
    </div><!--/toolbox-->
	</div><!--/tools-->
	<div id="content">
    
	<div class='mw-topboxes'>
		<div id="mw-js-message" style="display:none;"></div>
		<div class="mw-topbox" id="siteSub"><?php $this->msg('tagline') ?></div>
		<?php if($this->data['newtalk'] ) {
			?><div class="usermessage mw-topbox"><?php $this->html('newtalk')  ?></div>
		<?php } ?>
		<?php if($this->data['sitenotice']) {
			?><div class="mw-topbox" id="siteNotice"><?php $this->html('sitenotice') ?></div>
		<?php } ?>
	</div>
	<h1 id="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
	<div id="contentSub"><?php $this->html('subtitle') ?></div>

	<?php if($this->data['undelete']) { ?><div id="contentSub2"><?php $this->html('undelete') ?></div><?php } ?>
	<?php if($this->data['showjumplinks']) { ?><div id="jump-to-nav"><?php $this->msg('jumpto') ?> <a href="#mw_portlets"><?php $this->msg('jumptonavigation') ?></a>, <a href="#searchInput"><?php $this->msg('jumptosearch') ?></a></div><?php } ?>

	<?php $this->html('bodytext') ?>
	<?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
	<?php $this->html ('dataAfterContent') ?>

	  <hr class="clear" />
	</div><!--/content -->
</div><!--/contentwrap-->

<div id="footerwrap">
	<div id="footer">
			<ul id="f-list">
<?php
		$footerlinks = array(
			'lastmod', 'viewcount', 'numberofwatchingusers', 'credits', /* 'copyright', */
			'privacy', 'about', 'disclaimer', 'tagline', /*'newsletter',*/
		);
		/* $this->data['newsletter'] = '<a style="font-size:11px;margin:0 2px 20px 13px;float:left;display:inline;" href="/index.php/Nyhedsbrev" title="Nyhedsbrev">Nyhedsbrev</a>'; */
		foreach( $footerlinks as $aLink ) {
			if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
?>				<li id="<?php echo$aLink?>"><?php $this->html($aLink) ?></li>
<?php 		}
		}
?>
			</ul>
	</div><!--/footer-->
</div><!--/footerwrap-->
<div id="poweredby"><?php echo $this->html("poweredbyico"); ?></div>

<?php if ( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>
-->
<?php endif; ?>
<!-- Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2100734-11");
pageTracker._trackPageview();
} catch(err) {}</script>

<!--[if lt IE 7]><script type="text/javascript" src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js"></script><![endif]-->

	<?php $this->printTrail(); ?>
</body></html>
<?php
	wfRestoreWarnings();
	} // end of execute() method
} // end of class


