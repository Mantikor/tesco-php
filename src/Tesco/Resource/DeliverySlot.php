<?php namespace Tesco\Resource;

class DeliverySlot
{
	protected $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function getID()
	{
		return $this->data['DeliverySlotId'];
	}

	public function getStartTime()
	{
		return new Carbon($this->data['SlotDateTimeStart']);
	}

	public function getEndTime()
	{
		return new Carbon($this->data['SlotDateTimeEnd']);
	}

	public function getServiceCharge()
	{
		return $this->data['ServiceCharge'];
	}
}