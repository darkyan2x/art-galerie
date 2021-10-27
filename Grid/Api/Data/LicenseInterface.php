<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface LicenseInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const LICENSE_ID = 'license_id';
    const LICENSE_COST = 'license_cost';
    const LABOR_COST = 'labor_cost';
    const PUBLISH_DATE = 'publish_date';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';
 
    /**
     * Get License Id.
     *
     * @return int
     */
    public function getLicenseId();
 
    /**
     * Set License Id.
     */
    public function setLicenseId($licenseId);
 
    /**
     * Get License Cost.
     *
     * @return varchar
     */
    public function getLicenseCost();
 
    /**
     * Set License Cost.
     */
    public function setLicenseCost($licenseCost);
 
    /**
     * Get Labor.
     *
     * @return varchar
     */
    public function getLaborCost();
 
    /**
     * Set Labor.
     */
    public function setLaborCost($laborCost);
     
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