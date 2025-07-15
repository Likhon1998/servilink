<?php
namespace App\Service;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\Identifier\IdentifierInterface;
use Authentication\Authenticator\SessionAuthenticator;
use Authentication\Authenticator\FormAuthenticator;
use Psr\Http\Message\ServerRequestInterface;

class AuthenticationServiceFactory
{
    public function __invoke(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        // ইউজার ও পাসওয়ার্ড ফিল্ড ম্যাপ করা
        $fields = [
                'username' => 'email',
                'password' => 'password',
];

        // Password Identifier ব্যবহার করা
        $service->loadIdentifier('Authentication.Password', [
            'fields' => $fields,
        ]);

        // Session Authenticator - ব্যবহারকারী লগইন থাকলে session থেকে পড়বে
        $service->loadAuthenticator(SessionAuthenticator::class);

        // Form Authenticator - ফর্ম সাবমিট হলে চেক করবে
        $service->loadAuthenticator(FormAuthenticator::class, [
            'fields' => $fields,
            'loginUrl' => '/login', // যদি তুমি /login রাউট ইউজ করো
        ]);

        return $service;
    }
}
