<?php

/**
 * \AppserverIo\Psr\Socket\SocketInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category   Appserver
 * @package    Psr
 * @subpackage Socket
 * @author     Johann Zelger <jz@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io-psr/socket
 */

namespace AppserverIo\Psr\Socket;

/**
 * Interface SocketInterface
 *
 * @category   Appserver
 * @package    Psr
 * @subpackage Socket
 * @author     Johann Zelger <jz@appserver.io>
 * @copyright  2014 TechDivision GmbH <info@appserver.io>
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link       https://github.com/appserver-io-psr/socket
 */
interface SocketInterface
{

    /**
     * Creates a stream socket server and returns a instance of Stream implementation with server socket in it.
     *
     * @param string $address The address the server should be listening to. For example 0.0.0.0:8080
     *
     * @return \AppserverIo\Psr\Socket\SocketInterface The Stream instance with a server socket created.
     */
    public static function getServerInstance($address);

    /**
     * Return's an instance of Stream with preset resource in it.
     *
     * @param resource $connectionResource The resource to use
     *
     * @return \AppserverIo\Psr\Socket\StreamSocket
     */
    public static function getInstance($connectionResource);

    /**
     * Accepts connections from clients and build up a instance of Stream with connection resource in it.
     *
     * @param int $acceptTimeout  The timeout in seconds to wait for accepting connections.
     * @param int $receiveTimeout The timeout in seconds to wait for read a line.
     *
     * @return \AppserverIo\Psr\Socket\StreamSocket|bool The Stream instance with the connection socket
     *                                                           accepted or bool false if timeout or error occurred.
     */
    public function accept($acceptTimeout = 600, $receiveTimeout = 60);

    /**
     * Return's the line read from connection resource
     *
     * @param int $readLength     The max length to read for a line.
     * @param int $receiveTimeout The max time to wait for read the next line
     *
     * @return string
     * @throws \AppserverIo\Psr\Socket\SocketReadTimeoutException
     */
    public function readLine($readLength = 1024, $receiveTimeout = null);

    /**
     * Read's the given length from connection resource
     *
     * @param int $readLength     The max length to read for a line.
     * @param int $receiveTimeout The max time to wait for read the next line
     *
     * @return string
     * @throws \AppserverIo\Psr\Socket\SocketReadTimeoutException
     */
    public function read($readLength = 1024, $receiveTimeout = null);

    /**
     * Writes the given message to the connection resource.
     *
     * @param string $message The message to write to the connection resource.
     *
     * @return int
     */
    public function write($message);

    /**
     * Copies data from a stream
     *
     * @param resource $sourceResource The source stream
     *
     * @return int The total count of bytes copied.
     */
    public function copyStream($sourceResource);

    /**
     * Closes the connection resource
     *
     * @return bool
     */
    public function close();

    /**
     * Set's the connection resource
     *
     * @param resource $connectionResource The resource for socket file descriptor
     *
     * @return void
     */
    public function setConnectionResource($connectionResource);

    /**
     * Return's the connection resource
     *
     * @return mixed
     */
    public function getConnectionResource();

    /**
     * Return's the peername in format ip:port (e.g. 10.20.30.40:57128)
     *
     * @return string
     */
    public function getPeername();

    /**
     * Return's the address of connection
     *
     * @return string
     */
    public function getAddress();

    /**
     * Return's the port of connection
     *
     * @return string
     */
    public function getPort();
}
