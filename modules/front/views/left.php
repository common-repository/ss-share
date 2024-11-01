<?php

/**
 * @var $params array
 * @var $size string
 */

use ssShare\modules\common\BaseModel;

?>

<div>
    <ul id="<?php echo SS_SHARE_TEXT_DOMAIN ?>"
        class="front fixed left <?php echo esc_attr( $params['responsive'] === 'enabled' ? 'responsive' : null ) ?>">
		<?php foreach ( $params['platformList'] as $value ) : ?>
            <li>
				<?php if ( $params['size'] === BaseModel::SIZE_LARGE['id'] ) : ?>
                    <a href="<?php echo esc_url( $value['url'] ) ?>" target="_blank">
                        <img src="<?php echo esc_url( $value['img'] ) ?>" class="img-lg" alt=""></a>
				<?php else : ?>
                    <a href="<?php echo esc_url( $value['url'] ) ?>" target="_blank">
                        <img src="<?php echo esc_url( $value['img'] ) ?>" class="img-sm" alt=""></a>
				<?php endif ?>
            </li>
		<?php endforeach ?>
    </ul>
</div>