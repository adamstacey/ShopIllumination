<?php

namespace KAC\SiteBundle\Manager\Order;

use KAC\SiteBundle\Entity\Order;
use Knp\Snappy;
use Symfony\Component\Process\Process;
use Twig_Environment;

class DocumentGenerator {
    protected $twig;

    function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $type
     * @param Order $order
     * @param bool $wait
     * @throws \InvalidArgumentException
     * @return string
     */
    public function generateSingleDocument($type, Order $order, $wait=true)
    {
        if(!in_array($type, $this->getAllowedTypes()))
        {
            throw new \InvalidArgumentException(sprintf(
                'The document type \'%s\' is invalid.',
                $type
            ));
        }

        $outputFile = $this->getAbsoluteUploadDir().'/'.$type.'-'.$order->getId().'.pdf';

        // Build the html
        $html = $this->twig->render('KACSiteBundle:Order\Document:single.html.twig', array(
            'type' => $type,
            'order' => $order,
        ));
        $inputFile = $this->createTemporaryFile($html, 'html');

        // Generate the file
        $this->executeCommand(sprintf('%s %s %s', $this->getBinaryPath(), $inputFile, $outputFile), $wait);

        unlink($inputFile);

        // If we are waiting for output from the command check that the file was created
        if($wait)
        {
            $this->checkOutput($outputFile);
        }

        return '/'.$type.'-'.$order->getId().'.pdf';
    }

    /**
     * @param $type
     * @param $orders Order[]
     * @param bool $wait
     * @param bool $wait
     *
     * @throws \InvalidArgumentException
     * @return string
     */
    public function generateBulkDocument($type, $orders, $wait=true)
    {
        if(!in_array($type, $this->getAllowedTypes()))
        {
            throw new \InvalidArgumentException(sprintf(
                'The document type \'%s\' is invalid.',
                $type
            ));
        }

        $ids = array_map(function(Order $order) {
            return $order->getId();
        }, $orders);
        $outputFile = $this->getAbsoluteUploadDir().'/'.$type.'-'.implode('-', $ids).'.pdf';
        $this->prepareOutput($outputFile, true);

        // Build the html
        $html = $this->twig->render('KACSiteBundle:Order\Document:multiple.html.twig', array(
            'type' => $type,
            'orders' => $orders,
        ));
        $inputFile = $this->createTemporaryFile($html, 'html');

        // Generate the file
        $this->executeCommand(sprintf('%s %s %s', $this->getBinaryPath(), $inputFile, $outputFile), $wait);

        unlink($inputFile);

        // If we are waiting for output from the command check that the file was created
        if($wait)
        {
            $this->checkOutput($outputFile);
        }

        return '/'.$type.'-'.implode('-', $ids).'.pdf';
    }

    protected function getAllowedTypes()
    {
        return array('order', 'copyorder', 'deliverynote', 'invoice');
    }

    protected function executeCommand($command, $wait)
    {
        $process = new Process($command);
        $process->setTimeout(3600);

        if($wait)
        {
            $process->run();

            // If the command was not completed succesfully then return the error message
            if (!$process->isSuccessful()) {
                throw new \RuntimeException($process->getErrorOutput());
            }


            return true;
        // If we are not waiting for any output then execute the command and return immediately
        } else {
            $process->start();
            return true;
        }
    }

    protected function prepareOutput($filename, $overwrite)
    {
        $directory = dirname($filename);

        if (file_exists($filename)) {
            if (!is_file($filename)) {
                throw new \InvalidArgumentException(sprintf(
                    'The output file \'%s\' already exists and it is a %s.',
                    $filename, is_dir($filename) ? 'directory' : 'link'
                ));
            } elseif (false === $overwrite) {
                throw new \InvalidArgumentException(sprintf(
                    'The output file \'%s\' already exists.',
                    $filename
                ));
            } elseif (!unlink($filename)) {
                throw new \RuntimeException(sprintf(
                    'Could not delete already existing output file \'%s\'.',
                    $filename
                ));
            }
        } elseif (!is_dir($directory) && !mkdir($directory, 0777, true)) {
            throw new \RuntimeException(sprintf(
                'The output file\'s directory \'%s\' could not be created.',
                $directory
            ));
        }
    }

    protected function checkOutput($output)
    {
        // the output file must exist
        if (!file_exists($output)) {
            throw new \RuntimeException(sprintf(
                'The file \'%s\' was not created.',
                $output
            ));
        }

        // the output file must not be empty
        if (0 === filesize($output)) {
            throw new \RuntimeException(sprintf(
                'The file \'%s\' was created but is empty.',
                $output
            ));
        }
    }

    protected function createTemporaryFile($content = null, $extension = null)
    {
        $filename = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . uniqid('kac_site_document', true);

        if (null !== $extension) {
            $filename .= '.'.$extension;
        }

        if (null !== $content) {
            file_put_contents($filename, $content);
        }

        return $filename;
    }

    protected function getBinaryPath()
    {
//        return 'wkhtmltopdf';
//        return 'xvfb-run -a -s "-screen 0 640x480x16" /usr/bin/wkhtmltopdf-amd64';
//        return 'xvfb-run -a -s "-screen 0 640x480x16" wkhtmltopdf $*';
        return 'xvfb-run -a -s "-screen 0 640x480x16" wkhtmltopdf-amd64';
    }

    // Get the absolute path of the upload directory
    protected function getAbsoluteUploadDir()
    {
        return __DIR__.'/../../../../../web/'.$this->getUploadDir();
    }

    // Get the upload directory
    protected function getUploadDir()
    {
        return 'uploads/documents/order';
    }
}