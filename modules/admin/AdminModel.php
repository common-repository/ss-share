<?php

namespace ssShare\modules\admin;

use ssShare\modules\common\BaseModel;
use ssShare\modules\common\CommonFunctions;

class AdminModel extends BaseModel {

	public function loadFromPost( $params ) {
		$this->size       = $params['size'];
		$this->responsive = $params['responsive'];
		$this->position   = $params['position'];
		if ( empty( $this->pageTypeList = $params['pageTypeList'] ) ) {
			$this->pageTypeList = [];
		}
		if ( empty( $this->platformList = $params['platformList'] ) ) {
			$this->platformList = [];
		}
	}

	public function loadFromDb( $params ) {
		$params             = json_decode( $params, true );
		$this->size         = $this->generateSize( $params['size'] );
		$this->responsive   = $this->generateResponsive( $params['responsive'] );
		$this->position     = $this->generatePositions( $params['position'] );
		$this->pageTypeList = $this->generatePageTypeList( $params['pageTypeList'] );
		$this->platformList = $this->generatePlatformList( $params['platformList'] );
	}

	public function validate() {
		if ( ! is_string( $this->size ) ) {
			return false;
		}
		if ( ! is_string( $this->responsive ) ) {
			return false;
		}
		if ( ! is_string( $this->position ) ) {
			return false;
		}
		if ( ! is_array( $this->pageTypeList ) ) {
			return false;
		}
		if ( ! is_array( $this->platformList ) ) {
			return false;
		}

		return true;
	}

	public function getJson() {
		return json_encode( [
			'size'         => $this->size,
			'responsive'   => $this->responsive,
			'position'     => $this->position,
			'pageTypeList' => $this->pageTypeList,
			'platformList' => $this->platformList,
		] );
	}

	public function save() {
		update_option( SS_SHARE_TEXT_DOMAIN, $this->getJson() );
	}

	private function generateSize( $input ) {
		$defaultList = [ self::SIZE_LARGE, self::SIZE_SMALL ];

		foreach ( $defaultList as $value ) {
			if ( $value['id'] === $input ) {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => true ];
			} else {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => false ];
			}
		}

		return $data;
	}

	private function generateResponsive( $input ) {
		$defaultList = [ self::RESPONSIVE_ENABLED, self::RESPONSIVE_DISABLED ];

		foreach ( $defaultList as $value ) {
			if ( $value['id'] === $input ) {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => true ];
			} else {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => false ];
			}
		}

		return $data;
	}

	private function generatePositions( $input ) {
		$defaultList = [ self::POS_AFTER_CONTENT, self::POS_LEFT, self::POS_RIGHT ];

		foreach ( $defaultList as $value ) {
			if ( $value['id'] === $input ) {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => true ];
			} else {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => false ];
			}
		}

		return $data;
	}

	private function generatePageTypeList( $inputList ) {
		if ( empty( $inputList ) ) {
			$inputList = [];
		}

		$defaultList = [ self::PAGE_TYPE_POST, self::PAGE_TYPE_PAGE ];

		foreach ( $defaultList as $value ) {
			if ( in_array( $value['id'], $inputList ) ) {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => true ];
			} else {
				$data[] = [ 'name' => $value['name'], 'id' => $value['id'], 'checked' => false ];
			}
		}

		return $data;
	}

	private function generatePlatformList( $inputList ) {
		if ( empty( $inputList ) ) {
			$inputList = [];
		}

		$defaultList = CommonFunctions::getPlatforms();

		$data = [];
		foreach ( $defaultList as $value ) {
			$checked = false;
			if ( in_array( $value['id'], $inputList ) ) {
				$checked = true;
			}
			$data[] = [
				'name'    => $value['name'],
				'id'      => $value['id'],
				'img'     => SS_SHARE_URL . '/modules/common/img/' . $value['id'] . '.svg',
				'checked' => $checked
			];
		}

		return $data;
	}
}