<?php

namespace ssShare;

use ssShare\modules\admin\AdminController;
use ssShare\modules\admin\AdminModel;
use ssShare\modules\front\FrontController;

class Bootstrap {

	public function run() {
		if ( is_admin() ) {
			register_activation_hook( SS_SHARE_DIR . '/index.php', [ $this, 'enable' ] );
			register_deactivation_hook( SS_SHARE_DIR . '/index.php', [ $this, 'disable' ] );
			add_filter( 'plugin_action_links_' . SS_SHARE_TEXT_DOMAIN . '/index.php', [ $this, 'registerLinks' ] );
			new AdminController();
		} else {
			new FrontController();
		}
	}

	public function enable() {
		$ssShareModel = new AdminModel();
		update_option( SS_SHARE_TEXT_DOMAIN, $ssShareModel->getJson() );
	}

	public function disable() {
		delete_option( SS_SHARE_TEXT_DOMAIN );
	}

	public function registerLinks( $links ) {
		$link[]  = '<a href="' . admin_url( 'admin.php?page=' . SS_SHARE_TEXT_DOMAIN ) . '">';
		$link[]  = esc_html__( 'Settings' );
		$link[]  = '</a>';
		$links[] = implode( null, $link );

		return $links;
	}
}