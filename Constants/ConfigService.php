<?php

namespace Constants;

use Shopware\Components\Plugin\CachedConfigReader;
use Shopware_Components_Snippet_Manager;

class ConfigService
{
    // URLs
    const SNIPPET_NAMESPACE              = 'frontend/xyz/checkout/xyz_ajaxcart';
    const SNIPPETNAME_CARBON_OFFSET_NAME = 'xyzCart-title';

    // snippets used to read the offset name / translation
    const SNIPPETNAME_CARTITEM_NAME    = 'xyzCart-cartItemTitle';
    const KEY_CARBON_OFFSET_STAGING    = 'xyz_enable_staging';
    const KEY_CARBON_OFFSET_PRICE      = 'customer-paid_offset_price';

    // plugin config keys
    const KEY_CARBON_OFFSET_IMAGE      = 'image_for_carbon_offsets';
    const KEY_CARBON_OFFSET_SETTINGS   = 'carbon_offset_settings';
    const KEY_CARBON_OFFSET_IS_ENABLED = 'plugin_status';
    const KEY_CARBON_OFFSET_STORE_ID   = 'xyz_store_id';
    const KEY_CARBON_OFFSET_TOKEN      = 'xyz_api_token';
    const KEY_CARBON_OFFSET_VAT        = 'xyz_taxpercent';

    private $pluginConfig;
    private $snippetManager;

    public function __construct(
        CachedConfigReader $cachedConfigReader,
        Shopware_Components_Snippet_Manager $snippetManager
    ) {
        $this->snippetManager = $snippetManager;
        $this->pluginConfig   = $cachedConfigReader->getByPluginName(xyzCarbonOffset::PLUGIN_NAME);
    }

    /*
     * Plugin Config
     */
    public function getCarbonOffsetPrice()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_PRICE];
    }

    public function getCarbonOffsetImage()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_IMAGE];
    }

    public function getCarbonOffsetIsDisabled()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_IS_ENABLED] == 'disabled';
    }

    public function getCarbonOffsetToken()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_TOKEN];
    }

    public function getCarbonOffsetIsStaging()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_STAGING];
    }

    public function getCarbonOffSetVat()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_VAT];
    }

    public function getCarbonOffsetStoreId()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_STORE_ID];
    }

    public function getCarbonOffsetSettings()
    {
        return $this->pluginConfig[self::KEY_CARBON_OFFSET_SETTINGS];
    }
    /*
     * Snippets
     */
    public function getCartItemName()
    {
        return $this->getSnippetNamespace()->get(self::SNIPPETNAME_CARTITEM_NAME);
    }

    private function getSnippetNamespace()
    {
        return $this->snippetManager->getNamespace(self::SNIPPET_NAMESPACE);
    }

    public function getCarbonOffsetName()
    {
        return $this->getSnippetNamespace()->get(self::SNIPPETNAME_CARBON_OFFSET_NAME);
    }
}
