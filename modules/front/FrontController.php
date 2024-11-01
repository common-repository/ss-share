<?php

namespace ssShare\modules\front;

use ssShare\modules\common\CommonFunctions;

class FrontController {

	public function __construct() {
		wp_enqueue_style( SS_SHARE_TEXT_DOMAIN . '-front-styles', SS_SHARE_URL . '/modules/front/css/styles.css' );
		add_filter( 'the_content', [ $this, 'actionIndex' ] );
	}

	public function actionIndex( $content ) {
		$options      = get_option( SS_SHARE_TEXT_DOMAIN );
		$ssShareModel = new FrontModel();
		$ssShareModel->loadFromDb( $options );
		if ( $ssShareModel->validate() !== true ) {
			return $content;
		}

		return CommonFunctions::render(
			'/modules/front/views/' . $ssShareModel->getViewFile() . '.php',
			$content,
			$ssShareModel->get()
		);
	}
}