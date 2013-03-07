<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KAC\UserBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use FOS\UserBundle\Model\User;

/**
 * CreateUserCommand
 */
class ResetAllPasswordsCommand extends ContainerAwareCommand
{
    /**
     * @see Command
     */
    protected function configure()
    {
        $this
            ->setName('kac:user:reset-all-passwords')
            ->setDescription('Reset all passwords to onefit.')
            ->setDefinition(array(
                new InputArgument('password', InputArgument::REQUIRED, 'The password'),
            ))
            ->setHelp(<<<EOT
The <info>fos:user:reset-all-passwords</info> command changes the password of all users:

  <info>php app/console fos:user:reset-all-passwords onefit</info>

This interactive shell will first ask you for a password.
EOT
            );
    }

    /**
     * @see Command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $password = $input->getArgument('password');

        $em = $this->getContainer()->get('doctrine')->getManager();

        $users = $em->getRepository('KAC\UserBundle\Entity\User')->findAll();

        foreach($users as $user)
        {
            $manipulator = $this->getContainer()->get('fos_user.util.user_manipulator');
            $manipulator->changePassword($user->getUsername(), $password);
        }

        $output->writeln(sprintf('Changed password for users'));
    }
}
