<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface ColorInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const COLOR_ID = 'color_id';
    const COLOR = 'color';
    const PUBLISH_DATE = 'publish_date';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';
 
    /**
     * Get Color Id.
     *
     * @return int
     */
    public function getColorId();
 
    /**
     * Set Color Id.
     */
    public function setColorId($colorId);
 
    /**
     * Get Color.
     *
     * @return varchar
     */
    public function getColor();
 
    /**
     * Set Color.
     */
    public function setColor($color);
     
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