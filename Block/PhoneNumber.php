<?php

namespace Storetransform\Number\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Serialize\Serializer\Json;
use \Storetransform\Number\Helper\Data;
use \Magento\Directory\Api\CountryInformationAcquirerInterface;

class PhoneNumber extends Template
{

    /**
     * @var Json
     */
    protected $jsonHelper;

    /**
     * @var Data
     */
    protected $helper;

    /**
     * @var CountryInformationAcquirerInterface
     */
    protected $countryInformation;

    /**
     * PhoneNumber constructor.
     * @param Context $context
     * @param Json $jsonHelper
     */
    public function __construct(
        Context $context,
        Json $jsonHelper,
        CountryInformationAcquirerInterface $countryInformation,
        Data $helper
    )
    {
        $this->jsonHelper = $jsonHelper;
        $this->helper = $helper;
        $this->countryInformation = $countryInformation;
        parent::__construct($context);
    }

    /**
     * @return bool|string
     */
    public function phoneConfig()
    {
        $config  = [
            "nationalMode" => false,
            "utilsScript"  => $this->getViewFileUrl('Storetransform_Number::js/utils.js')/*,
            "preferredCountries" => [$this->helper->preferedCountry()]*/
        ];

        if ($this->helper->allowedCountries()) {
            $config["onlyCountries"] = explode(",", $this->helper->allowedCountries());
        }

        return $this->jsonHelper->serialize($config);
    }
}