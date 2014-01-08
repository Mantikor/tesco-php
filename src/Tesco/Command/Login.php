<?php namespace Tesco\Command;

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

        if (isset($session['SessionKey']))
        {
            $this->tesco->setSessionKey($session['SessionKey']);
        }

        return $session;
    }
}