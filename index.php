<?php
declare(strict_types=1);

/**
 * User: overnet
 * Date: 2022-05-08
 * Time: 06:41
 */


defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\User\User;

require_once "library/settings.php";

/** @var User $user */
/** @var string $siteName */
/** @var string|null $pageClass */
/** @var int|null $itemId */
/** @var bool $stickyHeader */
/** @var bool $fullScreenLayout */
/** @var bool $showImageLogo */
/** @var bool $dropDownFavorite */
/** @var bool $dropDownBasket */
/** @var string $option */
/** @var string $view */
/** @var string $layout */
/** @var string $task */
/** @var int $itemId */
/** @var object $menu */
/** @var string|null $pageClass */

//dd($user);

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <jdoc:include type="metas"/>
    <jdoc:include type="styles"/>
    <jdoc:include type="scripts"/>
</head>

<body<?php if ($pageClass) : ?> class="<?= $pageClass ?>"<?php endif ?> data-id="<?= $itemId ?>">
<div id="wrapper">


    <div id="content-container">


        <div id="top-navigation"<?php if ($stickyHeader) : ?> class="sticky-top"<?php endif ?>>

            <div class="<?php if ($fullScreenLayout) : ?>container-fluid<?php else : ?>container-lg<?php endif ?>">

                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>

        </div>

        <!-- // HEADER START // -->
        <header>
            <div class="container<?php if ($fullScreenLayout) : ?>-fluid<?php endif ?> mobile-tablet-fix-container">

                <div class="row">


                    <div class="col-md-5 col-lg-4">
                        <div class="header-logotype">
							<?php if ($showImageLogo) : ?>
                                <a href="<?= homeUrl() ?>"
                                   title="<?= $siteName ?>"><?= HTMLHelper::_('image', 'logotypes/logotype.png', $siteName, [
										'class' => 'img-fluid'
									], true) ?>
                                </a>
							<?php else : ?>
                                <a href="<?= homeUrl() ?>"
                                   title="<?= $siteName ?>"><?= $siteName ?></a>
							<?php endif ?>
                        </div>
                    </div>


                </div>

            </div>
        </header>
        <!-- // HEADER END // -->

        <!-- // CONTENT START // -->
        <div class="<?php if ($fullScreenLayout) : ?>container-fluid<?php else : ?>container-lg<?php endif ?>">
            <div class="row">
                <div class="col-md-12">
                    <jdoc:include type="message"/>
					<?php if ($itemId === 101) : ?>
						<?php if ($this->countModules('frontpage')) : ?>
                            <div class="frontpage">
                                <jdoc:include type="modules" name="frontpage" style="frontpage"/>
                            </div>
						<?php endif; ?>
					<?php else : ?>
						<?php if ($this->countModules('breadcrumbs')) : ?>
                            <div class="breadcrumbs">
                                <jdoc:include type="modules" name="breadcrumbs" style="none"/>
                            </div>
						<?php endif; ?>
                        <jdoc:include type="component"/>
					<?php endif; ?>

                </div>
            </div>
        </div>
        <!-- // CONTENT END // -->

        <!-- // FOOTER START // -->
        <footer>
            <div class="container<?php if ($fullScreenLayout) : ?>-fluid<?php endif ?>">
                <div class="row">
                    <div class="col-lg-12">

                </div>
            </div>

        </footer>
        <!-- // FOOTER END // -->


    </div>








    <jdoc:include type="modules" name="debug" style="none"/>
</div>
</body>
</html>
