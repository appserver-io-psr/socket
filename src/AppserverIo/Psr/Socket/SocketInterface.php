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
 * @author    Johann Zelger <jz@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/socket
 * @link      http://www.appserver.io
 */

namespace AppserverIo\Psr\Socket;

/**
 * Interface SocketInterface
 *
 * @author    Johann Zelger <jz@appserver.io>
 * @copyright 2015 TechDivision GmbH <info@appserver.io>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/appserver-io-psr/socket
 * @link      http://www.appserver.io
 */
interface SocketInterface
{

    /**
     * Creates a stream socket server and returns an instance of Stream implementation with server socket in it.
     *
     * @param string $address The address the server should be listening to. For example 0.0.0.0:8080
     *
     * @return \AppserverIo\Psr\Socket\SocketInterface The Stream instance with a server socket created.
     */
    public static function getServerInstance($address);

    /**
     * Returns an instance of Stream with preset resource in it.
     *
     * @param resource $connectionResource The resource to use
     *
     * @return \AppserverIo\Psr\Socket\SocketInterface
     */
    public static function getInstance($connectionResource);

    /**
     * Accepts connections from clients and build up an instance of Stream with connection resource in it.
     *
     * @param integer $acceptTimeout  The timeout in seconds to wait for accepting connections.
     * @param integer $receiveTimeout The timeout in seconds to wait for read a line.
     *
     * @return \AppserverIo\Psr\Socket\SocketInterface|bool The Stream instance with the connection socket
     *                                                           accepted or bool false if timeout or error occurred.
     */
    public function accept($acceptTimeout = 600, $receiveTimeout = 60);

    /**
     * Returns the line read from connection resource
     *
     * @param integer $readLength     The max length to read for a line.
     * @param integer $receiveTimeout The max time to wait for read the next line
     *
     * @return string
     * @throws \AppserverIo\Psr\Socket\SocketReadTimeoutException
     */
    public function readLine($readLength = 1024, $receiveTimeout = null);

    /**
     * Reads the given length from connection resource
     *
     * @param integer $readLength     The max length to read for a line.
     * @param integer $receiveTimeout The max time to wait for read the next line
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
     * @return integer
     */
    public function write($message);

    /**
     * Copies data from a stream
     *
     * @param resource $sourceResource The source stream
     *
     * @return integer The total count of bytes copied.
     */
    public function copyStream($sourceResource);

    /**
     * Closes the connection resource
     *
     * @return boolean
     */
    public function close();

    /**
     * Sets the connection resource
     *
     * @param resource $connectionResource The resource for socket file descriptor
     *
     * @return void
     */
    public function setConnectionResource($connectionResource);

    /**
     * Returns the connection resource
     *
     * @return mixed
     */
    public function getConnectionResource();

    /**
     * Returns the peer name in format ip:port (e.g. 10.20.30.40:57128)
     *
     * @return string
     */
    public function getPeername();

    /**
     * Returns the address of connection
     *
     * @return string
     */
    public function getAddress();

    /**
     * Returns the port of connection
     *
     * @return string
     */
    public function getPort();
}
