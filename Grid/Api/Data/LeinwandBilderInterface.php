<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface LeinwandBilderInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const MIN_SIZE = 'min_size';
    const MAX_SIZE = 'max_size';
    const FG_MATERIAL = 'm_fg_material';
 
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
     * Get FG Material.
     *
     * @return varchar
     */
    public function getFgMaterial();
 
    /**
     * Set FG Material.
     */
    public function setFgMaterial($fgMaterial);

}