<?php
/**
 * ArtGalerie_Grid Grid Interface.
 *
 * @category    ArtGalerie
 *
 * @author      ArtGalerie Software Private Limited
 */
namespace ArtGalerie\Grid\Api\Data;
 
interface KlassenInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const NAME = 'name';
    const PRICE = 'price';
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
     * Get Name.
     *
     * @return varchar
     */
    public function getName();
 
    /**
     * Set Name.
     */
    public function setName($name);

    /**
     * Get Price.
     *
     * @return varchar
     */
    public function getPrice();
 
    /**
     * Set Price.
     */
    public function setPrice($price);
  
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