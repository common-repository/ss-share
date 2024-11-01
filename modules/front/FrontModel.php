<?php

namespace ssShare\modules\front;

use ssShare\modules\common\BaseModel;
use ssShare\modules\common\CommonFunctions;

class FrontModel extends BaseModel {

	public function loadFromDb( $params ) {
		$params             = json_decode( $params, true );
		$this->size         = $params['size'];
		$this->responsive   = $params['responsive'];
		$this->position     = $params['position'];
		$this->pageTypeList = $params['pageTypeList'];
		$this->platformList = $this->generatePlatformList( $params['platformList'] );
	}

	public function validate() {
		if ( is_home() && ! in_array( 'home', $this->pageTypeList ) ) {
			return false;
		}
		if ( is_single() && ! in_array( 'post', $this->pageTypeList ) ) {
			return false;
		}
		if ( is_page() && ! in_array( 'page', $this->pageTypeList ) ) {
			return false;
		}

		return true;
	}

	public function getViewFile() {
		return $this->position;
	}

	private function generatePlatformList( $list ) {
		if ( empty( $list ) ) {
			$list = [];
		}
		$defaultList = CommonFunctions::getPlatforms();
		$data        = [];
		foreach ( $defaultList as $value ) {
			if ( in_array( $value['id'], $list ) ) {
				$img    = SS_SHARE_URL . '/modules/common/img/' . $value['id'] . '.svg';
				$url    = $this->handleMacros( $value['url'] );
				$data[] = [ 'img' => $img, 'url' => $url ];
			}
		}

		return $data;
	}

	private function handleMacros( $string ) {
		$images = get_attached_media( get_post() );
		$img    = $images[ key( $images ) ];
		$string = str_replace( '{TITLE}', get_the_title(), $string );
		$string = str_replace( '{DESCRIPTION}', get_the_title(), $string );
		$string = str_replace( '{URL}', get_the_permalink(), $string );
		$string = str_replace( '{IMG}', $img->guid, $string );

		return $string;
	}
}