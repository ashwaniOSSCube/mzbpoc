<?php

class Resource_Rating extends Pimcore_Model_Abstract
{

    /**
     * @var integer
     */
    public $id = 0;

    /**
     *
     * @var integer
     */
    public $value;

    /**
     *
     * @var string
     */
    public $user;

    /**
     * @var integer
     */
    public $userId;

    /**
     *
     * @var integer
     */
    public $date;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $classname;

    /**
     *
     * @var Pimcore_Model_WebResource_Interface $ratingTarget
     */
    public $ratingTarget;

    /**
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     *
     * @return string
     */
    public function getClassname()
    {
        return $this->classname;
    }

    /**
     *
     * @param string $type
     */
    public function setClassname($classname)
    {
        $this->classname = $classname;
    }


    public function getResource()
    {

        if (!$this->resource) {
            $this->initResource("Resource_Rating");
        }
        return $this->resource;
    }


    /**
     *
     * @var unknown_type
     */
    public $ratingTargetId;

    /**
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return integer $data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * return string $userId
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return integer $userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * return integer $date
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * @return Pimcore_Model_WebResource_Interface $ratingTarget
     */
    public function getRatingTarget()
    {
        return $this->ratingTarget;
    }

    /**
     * @return integer $ratingTargetId
     */
    public function getRatingTargetId()
    {
        return $this->ratingTargetId;
    }

    /**
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param Object_Abstract $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        $this->userId = $user->getO_Id();
    }

    /**
     *
     * @param Pimcore_Model_WebResource_Interface $target
     */
    public function setRatingTarget($target)
    {

        $this->ratingTarget = $target;
        $this->ratingTargetId = $target->getId();

    }

    /**
     *
     * @param integer $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     *
     * @param integer $data
     */
    public function setData($data)
    {
        $this->data = $data;

    }

    /**
     * @return void
     */
    public function save()
    {

        if ($this->getId()) {
            $this->update();
        }
        else {
            $this->getResource()->create();
            $this->update();

        }
    }

    public function delete()
    {
        $this->getResource()->delete();
    }


    /**
     * Deletes all comments for current target
     */
    public function deleteAllForTarget()
    {
        $this->getResource()->deleteAllForTarget();
    }


    /**
     * Get Amounts per Rating Value
     *
     * @param Element_Interface $ratingTarget
     * @param string $type
     * @return array $data
     */
    public static function getRatingsAmountPerValueForTarget($ratingTarget, $type)
    {
        return Resource_Rating_Resource_Mysql::getRatingsAmountPerValueForTarget($ratingTarget, $type);
    }

    /**
     * Get Average per Rating Value
     * @param Pimcore_Model_WebResource_Interface $resource
     * @param string $type
     * @return integer $average
     *
     */
    public static function getRatingAverageForTarget($ratingTarget, $type)
    {
        return Resource_Rating_Resource_Mysql::getRatingAverageForTarget($ratingTarget, $type);
    }

    /**
     *
     * @param Pimcore_Model_WebResource_Interface $ratingTarget
     * @param string $type
     * @param Object_Abstract $user
     * @return boolean
     */
    public static function hasRated($ratingTarget, $type, $user)
    {
        return Resource_Rating_Resource_Mysql::hasRated($ratingTarget, $type, $user);
    }

    /**
     *
     * @param Pimcore_Model_WebResource_Interface $resource
     * @param string $type
     * @return integer $amount
     *
     */
    public static function getRatingValueForTarget($ratingTarget, $type)
    {
        return Resource_Rating_Resource_Mysql::getRatingValueForTarget($ratingTarget, $type);
    }


    /**
     * @param Pimcore_Model_WebResource_Interface $target
     * @param string $type
     * @param User $user
     * @param integer $timestamp
     * @return integer amount
     *
     */
    public static function getRatingValueForTargetForUser($target, $type, $user, $timestamp = null)
    {
        return Resource_Rating_Resource_Mysql::getRatingValueForTargetForUser($target, $type, $user, $timestamp);
    }


    /**
     * @param Pimcore_Model_WebResource_Interface $resource
     * @param string $type
     * @return integer $amount
     */
    public static function getRatingAmountForTarget($ratingTarget, $type)
    {
        return Resource_Rating_Resource_Mysql::getRatingAmountForTarget($ratingTarget, $type);
    }


    /**
     * @param integer amount
     * @param string $type
     * @param string $classname
     * @return Array $toptargets an array that contains the targetid and the rating amount
     */
    public static function getTopTargets($amount, $type, $classname = null)
    {
        return Resource_Rating_Resource_Mysql::getTopTargets($amount, $type, $classname);
    }

    /**
     * @param string $classname
     * @param string $type
     * @return interger $amount
     */
    public static function getTotalRatingsForTargetType($type, $classname = null)
    {
        return Resource_Rating_Resource_Mysql::getTotalRatingsForTargetType($type, $classname);
    }

}
