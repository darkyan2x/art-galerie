<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface AcrylglasBilderInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const MIN_SIZE = 'min_size';
    const MAX_SIZE = 'max_size';
    const BACKPLATE_MATERIAL = 'm_backplate_material';
    const BACKPLATE_WORK = 'm_backplate_work';
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
     * Get BackplateMaterial.
     *
     * @return int
     */
    public function getBackplateMaterial();
 
    /**
     * Set BackplateMaterial.
     */
    public function setBackplateMaterial($backplateMaterial);

    /**
     * Get BackplateWork.
     *
     * @return int
     */
    public function getBackplateWork();
 
    /**
     * Set BackplateWork.
     */
    public function setBackplateWork($backplateWork);
       

}