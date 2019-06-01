<?php

/**
 *   ___       _
 *  / _ \  ___| |_ ___  _ __  _   _
 * | | | |/ __| __/ _ \| '_ \| | | |
 * | |_| | (__| || (_) | |_) | |_| |
 *  \___/ \___|\__\___/| .__/ \__, |
 *                     |_|    |___/.
 * @author  : Supian M <supianidz@gmail.com>
 * @link    : www.octopy.xyz
 * @license : MIT
 */

namespace Octopy\HTTP\Response;

class RedirectResponse extends Response
{
    /**
     * @param string $location
     * @param int    $status
     * @param array  $header
     */
    public function __construct(string $location = '/', int $status = 302, array $header = [])
    {
        parent::__construct('', $status, array_merge($header, [
            'Location' => $location,
        ]));
    }

    /**
     * @return $this
     */
    public function back()
    {
        return $this->header('Location', $_SERVER['HTTP_REFERER'] ?? '/');
    }

    /**
     * @param  string $name
     * @param  array  $parameter
     * @return $this
     */
    public function route(string $name, array $parameter = [])
    {
        return $this->header('Location', route($name, $parameter));
    }
}
