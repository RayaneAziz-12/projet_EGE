<?php

/**
 * Created by PhpStorm.
 * User: Luc COLES
 * Date: 08/06/2021
 * Time: 11:22
 */
namespace App\Security;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\PasswordUpgradeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;

class Authenticator implements AuthenticatorInterface
{
    private $userRepo;

    public function __construct(UserRepository $ur)
    {
        $this->userRepo = $ur;
    }

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'app_login' && $request->isMethod('POST');
    }
    public function authenticate(Request $request): PassportInterface
    {
        $user = $this->userRepo->findOneByLogin($request->get('login'));
        if(!$user){
            throw new UsernameNotFoundException();
        }

        return new Passport($user, new PasswordCredentials($request->get('password')),
            [
                new CsrfTokenBadge('auth',$request->get('csrf_token')),
                new PasswordUpgradeBadge($request->get('password'),$this->userRepo)
            ]);
    }

    public function createAuthenticatedToken(PassportInterface $passport, string $firewallName): TokenInterface
    {

    }

    public function onAuthenticationSuccess(Request $request,  TokenInterface $token, string $firewallName): ?Response
    {
        return null;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        $data = [
            // you may want to customize or obfuscate the message first
            'message' => strtr($exception->getMessageKey(), $exception->getMessageData())

            // or to translate this message
            // $this->translator->trans($exception->getMessageKey(), $exception->getMessageData())
        ];

        return new Response($data, Response::HTTP_UNAUTHORIZED);
    }


}