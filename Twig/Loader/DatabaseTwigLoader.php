<?php

namespace Elcweb\TwigDatabaseLoaderBundle\Twig\Loader;

use Elcweb\TwigDatabaseLoaderBundle\Entity\Template;
use Elcweb\TwigDatabaseLoaderBundle\Entity\TemplateRepository;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Twig_Error_Loader;

/**
 * Class DatabaseTwigLoader
 * @package Elcweb\TwigDatabaseLoaderBundle\Twig\Loader
 */
class DatabaseTwigLoader implements \Twig_LoaderInterface, LoggerAwareInterface
{
    use LoggerAwareTrait;

    /** @var TemplateRepository */
    protected $templateRepository;

    /**
     * DatabaseTwigLoader constructor.
     *
     * @param TemplateRepository $templateRepository
     */
    public function __construct(TemplateRepository $templateRepository)
    {
        $this->templateRepository = $templateRepository;
    }

    /**
     * @inheritDoc
     */
    public function getSource($name)
    {
        return $this->getTemplate($name)->getContent();
    }

    /**
     * @inheritDoc
     */
    public function exists($name)
    {
        return ($this->getTemplate($name));
    }

    /**
     * @param string $name
     *
     * @return Template
     * @throws Twig_Error_Loader
     */
    protected function getTemplate($name)
    {
        $template = $this->templateRepository->findOneByName($name);

        if ($template) {
            $this->logger->debug(sprintf('Template "%s" found in the database.', $name));

            return $template;
        }

        $msg = sprintf('Template "%s" does not exist in the database.', $name);
        $this->logger->debug($msg);
        throw new Twig_Error_Loader($msg);
    }

    /**
     * @inheritDoc
     */
    public function getCacheKey($name)
    {
        return 'db:' . $name;
    }

    /**
     * @inheritDoc
     */
    public function isFresh($name, $time)
    {
        if (false === $lastModified = $this->getTemplate($name)->getUpdatedAt()->getTimestamp()) {
            return false;
        }

        return $lastModified <= $time;
    }
}
