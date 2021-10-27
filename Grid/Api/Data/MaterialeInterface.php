<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface MaterialeInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const MATERIALE_ID = 'materiale_id';
    const MATERIALE = 'materiale';
    const PUBLISH_DATE = 'publish_date';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';
 
    /**
     * Get Materiale Id.
     *
     * @return int
     */
    public function getMaterialeId();
 
    /**
     * Set Materiale Id.
     */
    public function setMaterialeId($materialeId);
 
    /**
     * Get Materiale.
     *
     * @return varchar
     */
    public function getMateriale();
 
    /**
     * Set Materiale.
     */
    public function setMateriale($materiale);
      
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