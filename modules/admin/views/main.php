<?php
/** @var $params array */
/** @var $size array */

?>

<div id="<?php echo SS_SHARE_TEXT_DOMAIN ?>" class="admin">
    <form method="post">

        <h3>Platforms list</h3>
		<?php foreach ( $params['platformList'] as $platform ) : ?>
            <div class="mb-10">
                <input id="platform-<?php echo esc_attr( $platform['id'] ) ?>"
                       type="checkbox"
                       name="platformList[]"
                       value="<?php echo esc_attr( $platform['id'] ) ?>"
					<?php echo esc_attr( $platform['checked'] ? 'checked' : null ) ?>>
                <label for="platform-<?php echo esc_attr( $platform['id'] ) ?>">
                    <img class="platform-logo" src="<?php echo esc_url( $platform['img'] ) ?>">
					<?php echo esc_html__( $platform['name'], SS_SHARE_TEXT_DOMAIN ) ?>
                </label>
            </div>
		<?php endforeach ?>

        <hr>

        <h3>Size</h3>
		<?php foreach ( $params['size'] as $size ) : ?>
            <div class="mb-10">
                <input id="size-<?php echo esc_attr( $size['id'] ) ?>"
                       type="radio"
                       name="size"
                       value="<?php echo esc_attr( $size['id'] ) ?>"
					<?php echo esc_attr( $size['checked'] ? 'checked' : null ) ?>>
                <label for="size-<?php echo esc_attr( $size['id'] ) ?>">
					<?php echo esc_html__( $size['name'] ) ?>
                </label>
            </div>
		<?php endforeach ?>

        <hr>

        <h3>Pages to display</h3>
		<?php foreach ( $params['pageTypeList'] as $pageType ) : ?>
            <div class="mb-10">
                <input id="page-type-<?php echo esc_attr( $pageType['id'] ) ?>"
                       type="checkbox"
                       name="pageTypeList[]"
                       value="<?php echo esc_attr( $pageType['id'] ) ?>"
					<?php echo esc_attr( $pageType['checked'] ? 'checked' : null ) ?>>
                <label for="page-type-<?php echo esc_attr( $pageType['id'] ) ?>">
                    Show in <?php echo esc_html__( $pageType['name'] ) ?>
                </label>
            </div>
		<?php endforeach ?>

        <hr>

        <h3>Position in page</h3>
		<?php foreach ( $params['position'] as $position ) : ?>
            <div class="mb-10">
                <input id="position-<?php echo esc_attr( $position['id'] ) ?>"
                       type="radio"
                       name="position"
                       value="<?php echo esc_attr( $position['id'] ) ?>"
					<?php echo esc_attr( $position['checked'] ? 'checked' : null ) ?>>
                <label for="position-<?php echo esc_attr( $position['id'] ) ?>">
					<?php echo esc_html__( $position['name'] ) ?>
                </label>
            </div>
		<?php endforeach ?>

        <hr>

        <h3>Responsiveness</h3>
		<?php foreach ( $params['responsive'] as $responsive ) : ?>
            <div class="mb-10">
                <input id="responsive-<?php echo esc_attr( $responsive['id'] ) ?>"
                       type="radio"
                       name="responsive"
                       value="<?php echo esc_attr( $responsive['id'] ) ?>"
					<?php echo esc_attr( $responsive['checked'] ? 'checked' : null ) ?>>
                <label for="responsive-<?php echo esc_attr( $responsive['id'] ) ?>">
					<?php echo esc_html__( $responsive['name'] ) ?>
                </label>
            </div>
		<?php endforeach ?>

        <input type="submit" class="mt-10" name="form-submit" value="Submit">
    </form>
</div>