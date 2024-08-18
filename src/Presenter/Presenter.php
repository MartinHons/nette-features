<?php

declare(strict_types=1);

namespace MartinHons\Features\Control;

use Nette\Application\UI\Presenter;
use Nette\DI\Attributes\Inject;
use Nette\Http\Request;
use Nette\Utils\Strings;

abstract class BasePresenter extends Presenter
{
    use TInitAssetTags;

    public function startup()
    {
        parent::startup();
        $this->onRender[] = function() {
            $this->template->assetTags = $this->initAssetTags();
        };
    }


    /** Returns name of current module */
    public function getCurrentModule(): string
    {
        return Strings::before($this->getName(),':').'Module';
    }
}
