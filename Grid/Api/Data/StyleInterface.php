<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface StyleInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const STYLE_ID = 'style_id';
    const STYLE = 'style';
    const PUBLISH_DATE = 'publish_date';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';
 
    /**
     * Get Style Id.
     *
     * @return int
     */
    public function getStyleId();
 
    /**
     * Set Style Id.
     */
    public function setStyleId($styleId);
 
    /**
     * Get style.
     *
     * @return varchar
     */
    public function getStyle();
 
    /**
     * Set style.
     */
    public function setStyle($style);
      
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