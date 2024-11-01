<?php

namespace ssShare\modules\common;

class CommonFunctions {

	public static function getPlatforms() {
		return [
			[
				'name' => 'Facebook',
				'id'   => 'facebook',
				'url'  => 'https://www.facebook.com/sharer/sharer.php?u={URL}&t={TITLE}',
			],
			[
				'name' => 'Twitter',
				'id'   => 'twitter',
				'url'  => 'https://twitter.com/intent/tweet?text={TITLE}&url={URL}&via=TWITTER-HANDLE',
			],
			[
				'name' => 'Pinterest',
				'id'   => 'pinterest',
				'url'  => 'https://pinterest.com/pin/create/button/?url={URL}&description={DESCRIPTION}&media={IMG}',
			],
			[
				'name' => 'Reddit',
				'id'   => 'reddit',
				'url'  => 'https://www.reddit.com/submit?url={URL}&title={TITLE}',
			],
			[
				'name' => 'Linkedin',
				'id'   => 'linkedin',
				'url'  => 'https://www.linkedin.com/shareArticle?mini=true&url={URL}&title={TITLE}&summary={SUMMARY}&source={SOURCE}',
			],
			[
				'name' => 'Tumblr',
				'id'   => 'tumblr',
				'url'  => 'https://www.tumblr.com/share/link?url={URL}&description={DESCRIPTION}',
			],
		];
	}

	public static function render( $viewPath, $content, $params = [] ) {
		ob_start();
		require_once SS_SHARE_DIR . $viewPath;
		$output = ob_get_contents();
		ob_end_clean();

		return $content . $output;
	}
}