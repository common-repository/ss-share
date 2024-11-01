<?php

namespace ssShare\modules\admin;

use ssShare\modules\common\CommonFunctions;

class AdminController {

	public function __construct() {
		wp_enqueue_style( SS_SHARE_TEXT_DOMAIN . '-admin-styles', SS_SHARE_URL . '/modules/admin/css/styles.css' );
		add_action( 'admin_menu', [ $this, 'actionShowMenu' ] );
		add_action( 'admin_menu', [ $this, 'actionSave' ] );
	}

	public function actionShowMenu() {
		add_menu_page(
			esc_html__( SS_SHARE_NAME, SS_SHARE_TEXT_DOMAIN ),
			esc_html__( SS_SHARE_NAME, SS_SHARE_TEXT_DOMAIN ),
			'manage_options',
			SS_SHARE_TEXT_DOMAIN,
			[ $this, 'subActionShowMenu' ],
			SS_SHARE_URL . '/modules/admin/img/share.svg',
			1
		);
	}

	public function subActionShowMenu() {
		$options      = get_option( SS_SHARE_TEXT_DOMAIN );
		$ssShareModel = new AdminModel();
		$ssShareModel->loadFromDb( $options );
		echo CommonFunctions::render( '/modules/admin/views/main.php', null, $ssShareModel->get() );
	}

	public function actionSave() {
		if ( isset( $_POST['form-submit'] ) ) {
			$ssShareModel = new AdminModel();
			$ssShareModel->loadFromPost( $this->sanitizedParams() );
			if ( $ssShareModel->validate() ) {
				$ssShareModel->save();
			}
		}
	}

	private function sanitizedParams() {
		$data = [];
		foreach ( $_POST as $key => $value ) {
			if ( is_array( $value ) ) {
				$data[ $key ] = array_map( 'sanitize_text_field', $value );
			} else {
				$data[ $key ] = sanitize_text_field( $value );
			}
		}

		return $data;
	}
}