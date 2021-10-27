<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface GerahmteBilderInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const MIN_SIZE = 'min_size';
    const MAX_SIZE = 'max_size';
    const M_BACKPLATE_MATERIAL = 'm_backplate_material';
    const M_BACKPLATE_WORK = 'm_backplate_work';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
 
    /**
     * Get Id.
     *
     * @return int
     */
    public function getId();
 
    /**
     * Set Id.
     */
    public function setId($Id);

    /**
     * Get Min Size.
     *
     * @return int
     */
    public function getMinSize();
 
    /**
     * Set Min Size.
     */
    public function setMinSize($minSize);

    /**
     * Get Max Size.
     *
     * @return int
     */
    public function getMaxSize();
 
    /**
     * Set Max Size.
     */
    public function setMaxSize($maxSize);

    /**
     * Get BackplateMaterial.
     *
     * @return int
     */
    public function getMBackplateMaterial();
 
    /**
     * Set BackplateMaterial.
     */
    public function setMBackplateMaterial($mBackplateMaterial);

    /**
     * Get BackplateWork.
     *
     * @return int
     */
    public function getBackplateWork();
 
    /**
     * Set BackplateWork.
     */
    public function setBackplateWork($mBackplateWork);
     
    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdatedAt();
 
    /**
     * Set UpdateTime.
     */
    public function setUpdatedAt($updatedAt);
 
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