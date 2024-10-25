<?php

namespace Passionweb\CustomPermissionOptions\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Module\ModuleData;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Core\Authentication\BackendUserAuthentication;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class CustomPermissionController extends ActionController
{
    protected ?ModuleData $moduleData;
    protected ModuleTemplate $moduleTemplate;

    public function __construct(
        protected ModuleTemplateFactory $moduleTemplateFactory,
        protected UriBuilder            $backendUriBuilder,
        protected IconFactory           $iconFactory,
        protected PageRenderer          $pageRenderer
    ) {
    }

    public function initializeAction() : void
    {
        $this->moduleData = $this->request->getAttribute('moduleData');
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->moduleTemplate->setTitle('Permission Backend Module');
        $this->moduleTemplate->setFlashMessageQueue($this->getFlashMessageQueue());
        $this->moduleTemplate->setModuleId('permissionBackendModule');
    }

    public function printPermissionsAction(): ResponseInterface
    {
        $backendUser = $this->getBackendUser();

        $extendedFileAccess = $backendUser->check('custom_options', 'tx_custom_permission_options:extended_file_access');
        $extendedPagesAccess = $backendUser->check('custom_options', 'tx_custom_permission_options:extended_pages_access');

        $this->moduleTemplate->assignMultiple([
            'extendedFileAccess' => $extendedFileAccess,
            'extendedPagesAccess' => $extendedPagesAccess,
        ]);

        return $this->htmlResponse($this->moduleTemplate->render());
    }

    private function getBackendUser() : BackendUserAuthentication
    {
        return $GLOBALS['BE_USER'];
    }
}
