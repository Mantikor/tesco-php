<?php namespace Tesco\Command;

use Tesco\Resource\Customer;

class Login extends Command
{
    public function get($email, $password)
    {
        $request = $this->getRequestWithKeys('login');

        $request->getQuery()
            ->set('email', $email)
            ->set('password', $password);

        $response = $request->send();

        $session = $response->json();

        if (0 !== $session['StatusCode'])
        {
            throw new LoginException("Invalid status returned for login request");
        }

        if (isset($session['SessionKey']))
        {
            $this->tesco->setSessionKey($session['SessionKey']);
        }

        return new Customer($session);
    }
}