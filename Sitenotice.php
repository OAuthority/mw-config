<?php

if ( $wmgSiteNoticeOptOut ) {
	// only show important notices when optout
	$wi->config->settings['wgNoticeProject']['default'] = 'optout';
}

// Global SiteNotice
// Increment this version number whenever you change the site notice
// and don't comment it out
$wgMajorSiteNoticeID = 48;

// Write your SiteNotice below.  Comment out this section to disable.
if ( !$wmgSiteNoticeOptOut ) {
	$wgHooks['SiteNoticeAfter'][] = 'onSiteNoticeAfter';
	function onSiteNoticeAfter( &$siteNotice, $skin ) {
		global $wmgSiteNoticeOptOut, $snImportant;

		$siteNotice .= <<<EOF
				<table class="wikitable" style="text-align:center;"><tbody><tr>
				<td style="font-size:125%">Miraheze plans to upgrade to the latest version of MediaWiki (1.35) today from 20:00 UTC time to approximately 20:30 UTC. Please save your edits 5 minutes before hand.</td>
				</tr></tbody></table>
EOF;

		return true;
	}
}

// Specific wiki sitenotice
if ( $wmgUseCrossReference ) {
$wgHooks['SiteNoticeAfter'][] = 'onSiteNoticeAfter2';
function onSiteNoticeAfter2( &$siteNotice, $skin ) {
	global $wmgSiteNoticeOptOut, $snImportant;

	$siteNotice .= <<<EOF
			<table class="wikitable" style="text-align:center;"><tbody><tr>
			<td>Unfortunately, the CrossReference extension is no longer maintained since 2018 and is not compatible with the newest version of MediaWiki. Therefore, CrossReference will be removed from all wikis at the same time as the upgrade. We apologize for the incovenience caused by this removal. </td>
			</tr></tbody></table>
EOF;
		return true;
}
}
