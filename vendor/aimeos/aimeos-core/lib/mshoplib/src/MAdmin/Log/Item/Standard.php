<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2011
 * @copyright Aimeos (aimeos.org), 2015-2018
 * @package MAdmin
 * @subpackage Log
 */


namespace Aimeos\MAdmin\Log\Item;


/**
 * Default log item implementation.
 *
 * @package MAdmin
 * @subpackage Log
 */
class Standard
	extends \Aimeos\MShop\Common\Item\Base
	implements \Aimeos\MAdmin\Log\Item\Iface
{
	private $values;

	/**
	 * Initializes the log item.
	 *
	 * @param array $values Associative list of key/value pairs
	 */
	public function __construct( array $values = [] )
	{
		parent::__construct( 'log.', $values );

		$this->values = $values;
	}


	/**
	 * Returns the facility of the item.
	 *
	 * @return string Returns the facility
	 */
	public function getFacility()
	{
		if( isset( $this->values['log.facility'] ) ) {
			return (string) $this->values['log.facility'];
		}

		return '';
	}


	/**
	 * Sets the new facility of the of the item.
	 *
	 * @param string $facility Facility
	 * @return \Aimeos\MAdmin\Log\Item\Iface Log item for chaining method calls
	 */
	public function setFacility( $facility )
	{
		if( (string) $facility !== $this->getFacility() )
		{
			$this->values['log.facility'] = (string) $facility;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the timestamp of the item.
	 *
	 * @return string|null ISO date in YYYY-MM-DD hh:mm:ss format
	 */
	public function getTimestamp()
	{
		if( isset( $this->values['log.timestamp'] ) ) {
			return (string) $this->values['log.timestamp'];
		}
	}


	/**
	 * Returns the priority of the item.
	 *
	 * @return integer Returns the priority
	 */
	public function getPriority()
	{
		if( isset( $this->values['log.priority'] ) ) {
			return (int) $this->values['log.priority'];
		}

		return 0;
	}


	/**
	 * Sets the new priority of the item.
	 *
	 * @param integer $priority Priority
	 * @return \Aimeos\MAdmin\Log\Item\Iface Log item for chaining method calls
	 */
	public function setPriority( $priority )
	{
		if( (int) $priority !== $this->getPriority() )
		{
			$this->values['log.priority'] = (int) $priority;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the message of the item.
	 *
	 * @return string Returns the message
	 */
	public function getMessage()
	{
		if( isset( $this->values['log.message'] ) ) {
			return (string) $this->values['log.message'];
		}

		return '';
	}


	/**
	 * Sets the new message of the item.
	 *
	 * @param string $message Message
	 * @return \Aimeos\MAdmin\Log\Item\Iface Log item for chaining method calls
	 */
	public function setMessage( $message )
	{
		if( (string) $message !== $this->getMessage() )
		{
			$this->values['log.message'] = (string) $message;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the request of the item.
	 *
	 * @return string Returns the request
	 */
	public function getRequest()
	{
		if( isset( $this->values['log.request'] ) ) {
			return (string) $this->values['log.request'];
		}

		return '';
	}


	/**
	 * Sets the new request of the item.
	 *
	 * @param string $request Request
	 * @return \Aimeos\MAdmin\Log\Item\Iface Log item for chaining method calls
	 */
	public function setRequest( $request )
	{
		if( (string) $request !== $this->getRequest() )
		{
			$this->values['log.request'] = (string) $request;
			$this->setModified();
		}

		return $this;
	}


	/**
	 * Returns the item type
	 *
	 * @return string Item type, subtypes are separated by slashes
	 */
	public function getResourceType()
	{
		return 'log';
	}


	/**
	 * Sets the item values from the given array.
	 *
	 * @param array $list Associative list of item keys and their values
	 * @return array Associative list of keys and their values that are unknown
	 */
	public function fromArray( array $list )
	{
		$unknown = [];
		$list = parent::fromArray( $list );

		foreach( $list as $key => $value )
		{
			switch( $key )
			{
				case 'log.facility': $this->setFacility( $value ); break;
				case 'log.priority': $this->setPriority( $value ); break;
				case 'log.message': $this->setMessage( $value ); break;
				case 'log.request': $this->setRequest( $value ); break;
				default: $unknown[$key] = $value;
			}
		}

		return $unknown;
	}


	/**
	 * Returns the item values as array.
	 *
	 * @param boolean True to return private properties, false for public only
	 * @return array Associative list of item properties and their values
	 */
	public function toArray( $private = false )
	{
		$list = parent::toArray( $private );

		$list['log.facility'] = $this->getFacility();
		$list['log.timestamp'] = $this->getTimestamp();
		$list['log.priority'] = $this->getPriority();
		$list['log.message'] = $this->getMessage();
		$list['log.request'] = $this->getRequest();

		return $list;
	}
}
