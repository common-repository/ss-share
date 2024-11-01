<?php

namespace ssShare\modules\common;

class BaseModel {

	const POS_AFTER_CONTENT = [ 'name' => 'After content', 'id' => 'after-content' ];
	const POS_LEFT = [ 'name' => 'Left', 'id' => 'left' ];
	const POS_RIGHT = [ 'name' => 'Right', 'id' => 'right' ];

	const SIZE_LARGE = [ 'name' => 'Large', 'id' => 'large' ];
	const SIZE_SMALL = [ 'name' => 'Small', 'id' => 'small' ];

	const PAGE_TYPE_POST = [ 'name' => 'Post', 'id' => 'post' ];
	const PAGE_TYPE_PAGE = [ 'name' => 'Page', 'id' => 'page' ];

	const RESPONSIVE_ENABLED = [ 'name' => 'Enabled', 'id' => 'enabled' ];
	const RESPONSIVE_DISABLED = [ 'name' => 'Disabled', 'id' => 'disabled' ];

	protected $size;
	protected $responsive;
	protected $position;
	protected $pageTypeList;
	protected $platformList;

	public function __construct() {
		$this->size         = self::SIZE_LARGE['id'];
		$this->responsive   = self::RESPONSIVE_ENABLED['id'];
		$this->position     = self::POS_AFTER_CONTENT['id'];
		$this->pageTypeList = [];
		$this->platformList = [];
	}

	public function get() {
		return [
			'size'         => $this->size,
			'responsive'   => $this->responsive,
			'position'     => $this->position,
			'pageTypeList' => $this->pageTypeList,
			'platformList' => $this->platformList,
		];
	}
}