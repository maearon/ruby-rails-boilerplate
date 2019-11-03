<?php if (SiteModule::$siteInfo->gaCode): ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo SiteModule::$siteInfo->gaCode; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo SiteModule::$siteInfo->gaCode; ?>');
</script>

<?php if (SiteModule::$siteInfo->gaAnonymizeIp): ?>
<script>
	(function() {
		var anonymize = function() {
			if (!('ga' in window) || !window.ga) {
				setTimeout(function() {
					anonymize();
				}, 50);
			} else {
				ga('set', 'anonymizeIp', true);
			}
		};
		anonymize();
	})();
</script>
<?php endif; ?>
<?php endif;