<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface WidthInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const WIDTH_ID = 'width_id';
    const WIDTH = 'width';
    const PUBLISH_DATE = 'publish_date';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';
 
    /**
     * Get Width Id.
     *
     * @return int
     */
    public function getWidthId();
 
    /**
     * Set Width Id.
     */
    public function setWidthId($widthId);
 
    /**
     * Get Width.
     *
     * @return varchar
     */
    public function getWidth();
 
    /**
     * Set Width.
     */
    public function setWidth($width);
      
    /**
     * Get Publish Date.
     *
     * @return varchar
     */
    public function getPublishDate();
 
    /**
     * Set PublishDate.
     */
    public function setPublishDate($publishDate);
  
    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();
 
    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime);
 
    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();
 
    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}