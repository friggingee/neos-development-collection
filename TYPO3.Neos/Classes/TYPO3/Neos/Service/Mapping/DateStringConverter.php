<?php
namespace TYPO3\Neos\Service\Mapping;

/*
 * This file is part of the TYPO3.Neos package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Property\PropertyMappingConfigurationInterface;
use TYPO3\Flow\Property\TypeConverter\AbstractTypeConverter;

/**
 * Converts a Date to a JavaScript compatible representation, meaning also to convert it to UTC timezone.
 *
 * @Flow\Scope("singleton")
 */
class DateStringConverter extends AbstractTypeConverter
{
    /**
     * The source types this converter can convert.
     *
     * @var array<string>
     * @api
     */
    protected $sourceTypes = array(\DateTime::class);

    /**
     * The target type this converter can convert to.
     *
     * @var string
     * @api
     */
    protected $targetType = 'string';

    /**
     * The priority for this converter.
     *
     * @var integer
     * @api
     */
    protected $priority = 0;

    /**
     * {@inheritdoc}
     *
     * @param \DateTime $source
     * @param string $targetType
     * @param array $convertedChildProperties
     * @param PropertyMappingConfigurationInterface $configuration
     * @return string the target type
     */
    public function convertFrom($source, $targetType, array $convertedChildProperties = array(), PropertyMappingConfigurationInterface $configuration = null)
    {
        if (!$source instanceof \DateTime) {
            return null;
        }
        $value = clone $source;
        return $value->setTimezone(new \DateTimeZone('UTC'))->format(\DateTime::W3C);
    }
}
