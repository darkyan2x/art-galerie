<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface KunstdruckInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const MIN_SIZE = 'min_size';
    const MAX_SIZE = 'max_size';
    const PRINT_MATERIAL = 'm_print_material';
    const PRINT_WORK = 'm_print_work';
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
     * Get Print Material.
     *
     * @return varchar
     */
    public function getPrintMaterial();
 
    /**
     * Set Print Material.
     */
    public function setPrintMaterial($printMaterial);

    /**
     * Get Print Work.
     *
     * @return varchar
     */
    public function getPrintWork();
 
    /**
     * Set Print Work.
     */
    public function setPrintWork($printWork);
  
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